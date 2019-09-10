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
 * Built from #/definitions/Responses
 * @method static Responses|Response[]|string[][] import($data, Context $options = null)
 */
class Responses extends ClassStructure
{
    const CONST_1_5_D_2_XX_PROPERTY_PATTERN = '^[1-5](?:\\d{2}|XX)$';

    const X_PROPERTY_PATTERN = '^x-';

    /** @var Response|string[] */
    public $default;

    /**
     * @param Properties|static $properties
     * @param Schema $ownerSchema
     */
    public static function setUpProperties($properties, Schema $ownerSchema)
    {
        $properties->default = new Schema();
        $properties->default->oneOf[0] = Response::schema();
        $properties->default->oneOf[1] = Reference::schema();
        $ownerSchema->type = 'object';
        $ownerSchema->additionalProperties = false;
        $patternProperty = new Schema();
        $patternProperty->oneOf[0] = Response::schema();
        $patternProperty->oneOf[1] = Reference::schema();
        $ownerSchema->setPatternProperty('^[1-5](?:\\d{2}|XX)$', $patternProperty);
        $patternProperty = new Schema();
        $ownerSchema->setPatternProperty('^x-', $patternProperty);
        $ownerSchema->minProperties = 1;
        $ownerSchema->setFromRef('#/definitions/Responses');
    }

    /**
     * @param Response|string[] $default
     * @return $this
     * @codeCoverageIgnoreStart
     */
    public function setDefault($default)
    {
        $this->default = $default;
        return $this;
    }
    /** @codeCoverageIgnoreEnd */

    /**
     * @return Response[]|string[][]
     * @codeCoverageIgnoreStart
     */
    public function getproperty15D2XXValues()
    {
        $result = array();
        if (!$names = $this->getPatternPropertyNames(self::CONST_1_5_D_2_XX_PROPERTY_PATTERN)) {
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
     * @param Response|string[] $value
     * @return self
     * @throws InvalidValue
     * @codeCoverageIgnoreStart
     */
    public function setproperty15D2XXValue($name, $value)
    {
        if (preg_match(Helper::toPregPattern(self::CONST_1_5_D_2_XX_PROPERTY_PATTERN), $name)) {
            throw new StringException('Pattern mismatch', StringException::PATTERN_MISMATCH);
        }
        $this->addPatternPropertyName(self::CONST_1_5_D_2_XX_PROPERTY_PATTERN, $name);
        $this->{$name} = $value;
        return $this;
    }
    /** @codeCoverageIgnoreEnd */

    /**
     * @codeCoverageIgnoreStart
     */
    public function getXValues()
    {
        $result = array();
        if (!$names = $this->getPatternPropertyNames(self::X_PROPERTY_PATTERN)) {
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
     * @param mixed $value
     * @return self
     * @throws InvalidValue
     * @codeCoverageIgnoreStart
     */
    public function setXValue($name, $value)
    {
        if (preg_match(Helper::toPregPattern(self::X_PROPERTY_PATTERN), $name)) {
            throw new StringException('Pattern mismatch', StringException::PATTERN_MISMATCH);
        }
        $this->addPatternPropertyName(self::X_PROPERTY_PATTERN, $name);
        $this->{$name} = $value;
        return $this;
    }
    /** @codeCoverageIgnoreEnd */
}