<?php
/**
 * @file ATTENTION!!! The code below was carefully crafted by a mean machine.
 * Please consider to NOT put any emotional human-generated modifications as the splendid AI will throw them away with no mercy.
 */

namespace Swaggest\OpenAPI3Schema;

use Swaggest\JsonSchema\Constraint\Properties;
use Swaggest\JsonSchema\Schema;
use Swaggest\JsonSchema\Structure\ClassStructure;


/**
 * Bearer
 */
class HTTPSecuritySchemeOneOf0 extends ClassStructure
{
    const BEARER = 'bearer';

    /** @var mixed */
    public $scheme;

    /**
     * @param Properties|static $properties
     * @param Schema $ownerSchema
     */
    public static function setUpProperties($properties, Schema $ownerSchema)
    {
        $properties->scheme = new Schema();
        $properties->scheme->enum = array(
            self::BEARER,
        );
        $ownerSchema->description = "Bearer";
    }

    /**
     * @param mixed $scheme
     * @return $this
     * @codeCoverageIgnoreStart
     */
    public function setScheme($scheme)
    {
        $this->scheme = $scheme;
        return $this;
    }
    /** @codeCoverageIgnoreEnd */
}