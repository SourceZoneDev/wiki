<?php
/**
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @file
 */

namespace MediaWiki\JobQueue;

/**
 * Interface for generic jobs only uses the parameters field and are JSON serializable.
 * Jobs using this interface require `needsPage: false` to be set
 * in the JobClasses configuration of their extension.json declaration.
 *
 * @stable to implement
 * @since 1.33
 * @ingroup JobQueue
 */
interface GenericParameterJob extends IJobSpecification {
	/**
	 * @param array $params JSON-serializable map of parameters
	 */
	public function __construct( array $params );
}

/** @deprecated class alias since 1.44 */
class_alias( GenericParameterJob::class, 'GenericParameterJob' );
