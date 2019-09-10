<?php
/**
 * @file ATTENTION!!! The code below was carefully crafted by a mean machine.
 * Please consider to NOT put any emotional human-generated modifications as the splendid AI will throw them away with no mercy.
 */

namespace Swaggest\OpenAPI3Schema;

use Swaggest\JsonSchema\Constraint\Properties;
use Swaggest\JsonSchema\Context;
use Swaggest\JsonSchema\Exception\StringException;
use Swaggest\JsonSchema\Helper;
use Swaggest\JsonSchema\InvalidValue;
use Swaggest\JsonSchema\Schema;
use Swaggest\JsonSchema\Structure\ClassStructure;


/**
 * Built from #/definitions/Reference
 * @method static string[] import($data, Context $options = null)
 */
class Reference extends ClassStructure
{
    const REF_PROPERTY_PATTERN = '^\\$ref$';

    /**
     * @param Properties|static $properties
     * @param Schema $ownerSchema
     */
    public static function setUpProperties($properties, Schema $ownerSchema)
    {
        $ownerSchema->type = 'object';
        $patternProperty = Schema::string();
        $patternProperty->format = "uri-reference";
        $ownerSchema->setPatternProperty('^\\$ref$', $patternProperty);
        $ownerSchema->required = array(
            '$ref',
        );
        $ownerSchema->setFromRef('#/definitions/Reference');
    }

    /**
     * @return string[]
     * @codeCoverageIgnoreStart
     */
    public function getRefValues()
    {
        $result = array();
        if (!$names = $this->getPatternPropertyNames(self::REF_PROPERTY_PATTERN)) {
            return $result;
        }
        foreach ($names as $name) {
            $result[$name] = $this->$name;
        }
        return $result;
    }
    /** @codeCoverageIgnoreEnd */

    /**
     * @param string $name
     * @param string $value
     * @return self
     * @throws InvalidValue
     * @codeCoverageIgnoreStart
     */
    public function setRefValue($name, $value)
    {
        if (preg_match(Helper::toPregPattern(self::REF_PROPERTY_PATTERN), $name)) {
            throw new StringException('Pattern mismatch', StringException::PATTERN_MISMATCH);
        }
        $this->addPatternPropertyName(self::REF_PROPERTY_PATTERN, $name);
        $this->{$name} = $value;
        return $this;
    }
    /** @codeCoverageIgnoreEnd */
}