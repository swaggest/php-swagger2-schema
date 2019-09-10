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
 * Example and examples are mutually exclusive
 * Built from #/definitions/ExampleXORExamples
 * @method static mixed import($data, Context $options = null)
 */
class ExampleXORExamples extends ClassStructure
{
    /**
     * @param Properties|static $properties
     * @param Schema $ownerSchema
     */
    public static function setUpProperties($properties, Schema $ownerSchema)
    {
        $ownerSchema->not = new Schema();
        $ownerSchema->not->required = array(
            self::names()->example,
            self::names()->examples,
        );
        $ownerSchema->description = "Example and examples are mutually exclusive";
        $ownerSchema->setFromRef('#/definitions/ExampleXORExamples');
    }
}