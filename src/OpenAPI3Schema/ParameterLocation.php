<?php
/**
 * @file ATTENTION!!! The code below was carefully crafted by a mean machine.
 * Please consider to NOT put any emotional human-generated modifications as the splendid AI will throw them away with no mercy.
 */

namespace Swaggest\OpenAPI3Schema;

use Swaggest\JsonSchema\Constraint\Properties;
use Swaggest\JsonSchema\Context;
use Swaggest\JsonSchema\Schema;
use Swaggest\JsonSchema\Structure\ClassStructure;


/**
 * Parameter location
 * Built from #/definitions/ParameterLocation
 * @method static ParameterLocationOneOf0|ParameterLocationOneOf1|ParameterLocationOneOf2|ParameterLocationOneOf3 import($data, Context $options = null)
 */
class ParameterLocation extends ClassStructure
{
    /**
     * @param Properties|static $properties
     * @param Schema $ownerSchema
     */
    public static function setUpProperties($properties, Schema $ownerSchema)
    {
        $ownerSchema->oneOf[0] = ParameterLocationOneOf0::schema();
        $ownerSchema->oneOf[1] = ParameterLocationOneOf1::schema();
        $ownerSchema->oneOf[2] = ParameterLocationOneOf2::schema();
        $ownerSchema->oneOf[3] = ParameterLocationOneOf3::schema();
        $ownerSchema->description = "Parameter location";
        $ownerSchema->setFromRef('#/definitions/ParameterLocation');
    }
}