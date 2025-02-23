<?php

/**
 * Basic infrastructure of the field definition.
 *
 * Specific engines should extend this class and at least,
 * override the getMapping method, but can reuse other parts.
 *
 * @stable to extend
 * @since 1.28
 */
abstract class SearchIndexFieldDefinition implements SearchIndexField {

	/**
	 * Name of the field
	 *
	 * @var string
	 */
	protected $name;

	/**
	 * Type of the field, one of the constants above
	 *
	 * @var string
	 */
	protected $type;

	/**
	 * Bit flags for the field.
	 *
	 * @var int
	 */
	protected $flags = 0;

	/**
	 * Subfields
	 * @var SearchIndexFieldDefinition[]
	 */
	protected $subfields = [];

	/**
	 * @var callable
	 */
	private $mergeCallback;

	/**
	 * @param string $name Field name
	 * @param string $type Index type
	 */
	public function __construct( $name, $type ) {
		$this->name = $name;
		$this->type = $type;
	}

	/**
	 * Get field name
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @return string
	 */
	public function getIndexType() {
		return $this->type;
	}

	/**
	 * Set global flag for this field.
	 * @stable to override
	 *
	 * @param int $flag Bit flag to set/unset
	 * @param bool $unset True if flag should be unset, false by default
	 * @return $this
	 */
	public function setFlag( $flag, $unset = false ) {
		if ( $unset ) {
			$this->flags &= ~$flag;
		} else {
			$this->flags |= $flag;
		}
		return $this;
	}

	/**
	 * Check if flag is set.
	 * @stable to override
	 *
	 * @param int $flag
	 * @return int 0 if unset, !=0 if set
	 */
	public function checkFlag( $flag ) {
		return $this->flags & $flag;
	}

	/**
	 * Merge two field definitions if possible.
	 * @stable to override
	 *
	 * @param SearchIndexField $that
	 * @return SearchIndexField|false New definition or false if not mergeable.
	 */
	public function merge( SearchIndexField $that ) {
		if ( $this->mergeCallback ) {
			return ( $this->mergeCallback )( $this, $that );
		}
		// TODO: which definitions may be compatible?
		if ( ( $that instanceof self ) && $this->type === $that->type &&
			$this->flags === $that->flags && $this->type !== self::INDEX_TYPE_NESTED
		) {
			return $that;
		}
		return false;
	}

	/**
	 * @return SearchIndexFieldDefinition[]
	 */
	public function getSubfields() {
		return $this->subfields;
	}

	/**
	 * @param SearchIndexFieldDefinition[] $subfields
	 * @return $this
	 */
	public function setSubfields( array $subfields ) {
		$this->subfields = $subfields;
		return $this;
	}

	/**
	 * @param SearchEngine $engine
	 *
	 * @return array
	 */
	abstract public function getMapping( SearchEngine $engine );

	/**
	 * Set field-specific merge strategy.
	 * @param callable $callback
	 */
	public function setMergeCallback( $callback ) {
		$this->mergeCallback = $callback;
	}

	/**
	 * @inheritDoc
	 */
	public function getEngineHints( SearchEngine $engine ) {
		return [];
	}
}
