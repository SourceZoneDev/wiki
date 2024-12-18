<?php

declare( strict_types = 1 );

namespace MediaWiki\Composer\PhpUnitSplitter;

use Composer\Script\Event;
use MediaWiki\Composer\ComposerLaunchParallel;
use PHPUnit\Framework\ErrorTestCase;
use Shellbox\Shellbox;

/**
 * @license GPL-2.0-or-later
 */
class PhpUnitXmlManager {

	private string $rootDir;

	private string $testsListFile;

	/**
	 * The `SkippedTestCase` is generated dynamically by PHPUnit for tests
	 * that are marked as skipped. We don't need to find a matching filesystem
	 * file for these.
	 *
	 * The `ParserIntegrationTest` is a special case - it's a single test class
	 * that generates very many tests. To balance out the test suites, we exclude
	 * the class from the scan, and add it back in PhpUnitXml::addSpecialCaseTests
	 */
	private const EXPECTED_MISSING_CLASSES = [
		"PHPUnit\\Framework\\SkippedTestCase",
		"MediaWiki\\Extension\\Scribunto\\Tests\\Engines\\LuaCommon\\LuaEngineTestSkip",
		"\\ParserIntegrationTest",
	];

	public function __construct( string $rootDir, string $testsListFile ) {
		$this->rootDir = $rootDir;
		$this->testsListFile = $testsListFile;
	}

	private function getPhpUnitXmlTarget(): string {
		return $this->rootDir . DIRECTORY_SEPARATOR . PhpUnitXml::PHP_UNIT_XML_FILE;
	}

	private function getPhpUnitXmlDist(): string {
		return $this->rootDir . DIRECTORY_SEPARATOR . "phpunit.xml.dist";
	}

	private function getTestsList(): string {
		return $this->rootDir . DIRECTORY_SEPARATOR . $this->testsListFile;
	}

	private function loadPhpUnitXmlDist(): PhpUnitXml {
		return $this->loadPhpUnitXml( $this->getPhpUnitXmlDist() );
	}

	private function loadPhpUnitXml( string $targetFile ): PhpUnitXml {
		return new PhpUnitXml( $targetFile );
	}

	private function loadTestClasses(): array {
		if ( !file_exists( $this->getTestsList() ) ) {
			throw new TestListMissingException( $this->getTestsList() );
		}
		return ( new PhpUnitTestListProcessor( $this->getTestsList() ) )->getTestClasses();
	}

	private function scanForTestFiles(): array {
		return ( new PhpUnitTestFileScanner( $this->rootDir ) )->scanForFiles();
	}

	private static function extractNamespaceFromFile( $filename ): array {
		$contents = file_get_contents( $filename );
		$matches = [];
		if ( preg_match( '/^namespace\s+([^\s;]+)/m', $contents, $matches ) ) {
			return explode( '\\', $matches[1] );
		}
		return [];
	}

	/**
	 * @param TestDescriptor $testDescriptor
	 * @param array $phpFiles
	 * @return ?string
	 * @throws MissingNamespaceMatchForTestException
	 * @throws UnlocatedTestException
	 * @throws PhpUnitErrorTestCaseFoundException
	 */
	private function resolveFileForTest( TestDescriptor $testDescriptor, array $phpFiles ): ?string {
		$filename = $testDescriptor->getClassName() . ".php";
		if ( !array_key_exists( $filename, $phpFiles ) ) {
			if ( !in_array( $testDescriptor->getFullClassname(), self::EXPECTED_MISSING_CLASSES ) ) {
				if ( $testDescriptor->getFullClassname() === ErrorTestCase::class ) {
					throw new PhpUnitErrorTestCaseFoundException();
				}
				throw new UnlocatedTestException( $testDescriptor );
			} else {
				return null;
			}
		}
		if ( count( $phpFiles[$filename] ) === 1 ) {
			return $phpFiles[$filename][0];
		}
		$possibleNamespaces = [];
		foreach ( $phpFiles[$filename] as $file ) {
			$namespace = self::extractNamespaceFromFile( $file );
			if ( $namespace === $testDescriptor->getNamespace() ) {
				return $file;
			}
			$possibleNamespaces[] = $namespace;
		}
		throw new MissingNamespaceMatchForTestException( $testDescriptor );
	}

	private function buildSuites( array $testClasses, int $groups ): array {
		return ( new TestSuiteBuilder() )->buildSuites( $testClasses, $groups );
	}

	public function isPhpUnitXmlPrepared(): bool {
		return PhpUnitXml::isPhpUnitXmlPrepared( $this->rootDir . DIRECTORY_SEPARATOR . "phpunit.xml" );
	}

	/**
	 * @return void
	 * @throws MissingNamespaceMatchForTestException
	 * @throws TestListMissingException
	 * @throws UnlocatedTestException
	 * @throws SuiteGenerationException
	 * @throws PhpUnitErrorTestCaseFoundException
	 */
	public function createPhpUnitXml( int $groups ) {
		$unitFile = $this->loadPhpUnitXmlDist();
		$testFiles = $this->scanForTestFiles();
		$testClasses = $this->loadTestClasses();
		$seenFiles = [];
		foreach ( $testClasses as $testDescriptor ) {
			$file = $this->resolveFileForTest( $testDescriptor, $testFiles );
			if ( is_string( $file ) && !array_key_exists( $file, $seenFiles ) ) {
				$testDescriptor->setFilename( $file );
				$seenFiles[$file] = 1;
			}
		}
		$suites = $this->buildSuites( $testClasses, $groups - 1 );
		$unitFile->addSplitGroups( $suites );
		$unitFile->addSpecialCaseTests( $groups );
		$unitFile->saveToDisk( $this->getPhpUnitXmlTarget() );
	}

	public static function listTestsNotice( Event $event ) {
		$event->getIO()->write( '' );
		$event->getIO()->write( 'Running `phpunit --list-tests-xml` to get a list of expected tests ... ' );
		$event->getIO()->write( '' );
	}

	/**
	 * @throws TestListMissingException
	 * @throws UnlocatedTestException
	 * @throws MissingNamespaceMatchForTestException
	 * @throws SuiteGenerationException
	 */
	public static function splitTestsList( string $testListFile, ?string $testSuite, Event $event ) {
		/**
		 * We split into 8 groups here, because experimentally that generates 100% CPU load
		 * on developer machines and results in groups that are similar in size to the
		 * Parser tests (which we have to run in a group on their own - see T345481)
		 */
		try {
			( new PhpUnitXmlManager( getcwd(), $testListFile ) )->createPhpUnitXml( 8 );
		} catch ( PhpUnitErrorTestCaseFoundException $tce ) {
			$event->getIO()->error( $tce->getMessage() );
			if ( $testSuite !== null ) {
				/* Parallel test suite run failed. Run the tests in linear order to work out
				 * which test actually has an error (see T379764 for some discussion of why this
				 * is necessary)
				 */
				$executor = new SplitGroupExecutor( Shellbox::createUnboxedExecutor(), $event );
				$executor->runLinearFallback( $testSuite );
				$event->getIO()->error( "Test suite splitting failed" );
				exit( ComposerLaunchParallel::EXIT_STATUS_PHPUNIT_LIST_TESTS_ERROR );
			}
			exit( ComposerLaunchParallel::EXIT_STATUS_PHPUNIT_LIST_TESTS_ERROR );
		}
		$event->getIO()->write( '' );
		$event->getIO()->info( 'Created modified `phpunit.xml` with test suite groups' );
	}

	/**
	 * @throws TestListMissingException
	 * @throws UnlocatedTestException
	 * @throws MissingNamespaceMatchForTestException
	 * @throws SuiteGenerationException
	 */
	public static function splitTestsListExtensions( Event $event ) {
		self::splitTestsList( 'tests-list-extensions.xml', "extensions", $event );
	}

	/**
	 * @throws TestListMissingException
	 * @throws UnlocatedTestException
	 * @throws MissingNamespaceMatchForTestException
	 * @throws SuiteGenerationException
	 */
	public static function splitTestsListDefault( Event $event ) {
		self::splitTestsList( 'tests-list-default.xml', "default", $event );
	}

	/**
	 * @throws TestListMissingException
	 * @throws UnlocatedTestException
	 * @throws MissingNamespaceMatchForTestException
	 * @throws SuiteGenerationException
	 */
	public static function splitTestsCustom( Event $event ) {
		if ( $_SERVER["argc"] < 3 ) {
			$event->getIO()->error( 'Specify a filename to split' );
			exit( 1 );
		}
		$filename = $_SERVER["argv"][2];
		self::splitTestsList( $filename, null, $event );
	}
}
