<?php
/**
 * @file ATTENTION!!! The code below was carefully crafted by a mean machine.
 * Please consider to NOT put any emotional human-generated modifications as the splendid AI will throw them away with no mercy.
 */

namespace Swaggest\SwaggerSchema;

use Swaggest\JsonSchema\Constraint\Properties;
use Swaggest\JsonSchema\Schema as JsonBasicSchema;
use Swaggest\JsonSchema\Structure\ClassStructure;


/**
 * Built from #/definitions/license
 */
class License extends ClassStructure {
	/** @var string The name of the license type. It's encouraged to use an OSI compatible license. */
	public $name;

	/** @var string The URL pointing to the license. */
	public $url;

	/**
	 * @param Properties|static $properties
	 * @param JsonBasicSchema $ownerSchema
	 */
	public static function setUpProperties($properties, JsonBasicSchema $ownerSchema)
	{
		$properties->name = JsonBasicSchema::string();
		$properties->name->description = 'The name of the license type. It\'s encouraged to use an OSI compatible license.';
		$properties->url = JsonBasicSchema::string();
		$properties->url->description = 'The URL pointing to the license.';
		$properties->url->format = 'uri';
		$ownerSchema->type = 'object';
		$ownerSchema->additionalProperties = false;
		$ownerSchema->patternProperties['^x-'] = new JsonBasicSchema();
		$ownerSchema->patternProperties['^x-']->description = 'Any property starting with x- is valid.';
		$ownerSchema->required = array (
		  0 => 'name',
		);
	}

	/**
	 * @param string $name The name of the license type. It's encouraged to use an OSI compatible license.
	 * @return $this
	 * @codeCoverageIgnoreStart
	 */
	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}
	/** @codeCoverageIgnoreEnd */

	/**
	 * @param string $url The URL pointing to the license.
	 * @return $this
	 * @codeCoverageIgnoreStart
	 */
	public function setUrl($url)
	{
		$this->url = $url;
		return $this;
	}
	/** @codeCoverageIgnoreEnd */
}

