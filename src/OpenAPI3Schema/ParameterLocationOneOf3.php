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
 * Parameter in cookie
 */
class ParameterLocationOneOf3 extends ClassStructure
{
    const COOKIE = 'cookie';

    const FORM = 'form';

    /** @var mixed */
    public $in;

    /** @var mixed */
    public $style;

    /**
     * @param Properties|static $properties
     * @param Schema $ownerSchema
     */
    public static function setUpProperties($properties, Schema $ownerSchema)
    {
        $properties->in = new Schema();
        $properties->in->enum = array(
            self::COOKIE,
        );
        $properties->style = new Schema();
        $properties->style->enum = array(
            self::FORM,
        );
        $properties->style->default = "form";
        $ownerSchema->description = "Parameter in cookie";
    }

    /**
     * @param mixed $in
     * @return $this
     * @codeCoverageIgnoreStart
     */
    public function setIn($in)
    {
        $this->in = $in;
        return $this;
    }
    /** @codeCoverageIgnoreEnd */

    /**
     * @param mixed $style
     * @return $this
     * @codeCoverageIgnoreStart
     */
    public function setStyle($style)
    {
        $this->style = $style;
        return $this;
    }
    /** @codeCoverageIgnoreEnd */
}