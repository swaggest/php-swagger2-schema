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
 * Schema and content are mutually exclusive, at least one is required
 * Built from #/definitions/SchemaXORContent
 * @method static mixed import($data, Context $options = null)
 */
class SchemaXORContent extends ClassStructure
{
    /**
     * @param Properties|static $properties
     * @param Schema $ownerSchema
     */
    public static function setUpProperties($properties, Schema $ownerSchema)
    {
        $ownerSchema->not = new Schema();
        $ownerSchema->not->required = array(
            self::names()->schema,
            self::names()->content,
        );
        $ownerSchemaOneOf0 = new Schema();
        $ownerSchemaOneOf0->required = array(
            self::names()->schema,
        );
        $ownerSchema->oneOf[0] = $ownerSchemaOneOf0;
        $ownerSchemaOneOf1 = new Schema();
        $ownerSchemaOneOf1AllOf0 = new Schema();
        $ownerSchemaOneOf1AllOf0->not = new Schema();
        $ownerSchemaOneOf1AllOf0->not->required = array(
            self::names()->style,
        );
        $ownerSchemaOneOf1->allOf[0] = $ownerSchemaOneOf1AllOf0;
        $ownerSchemaOneOf1AllOf1 = new Schema();
        $ownerSchemaOneOf1AllOf1->not = new Schema();
        $ownerSchemaOneOf1AllOf1->not->required = array(
            self::names()->explode,
        );
        $ownerSchemaOneOf1->allOf[1] = $ownerSchemaOneOf1AllOf1;
        $ownerSchemaOneOf1AllOf2 = new Schema();
        $ownerSchemaOneOf1AllOf2->not = new Schema();
        $ownerSchemaOneOf1AllOf2->not->required = array(
            self::names()->allowReserved,
        );
        $ownerSchemaOneOf1->allOf[2] = $ownerSchemaOneOf1AllOf2;
        $ownerSchemaOneOf1AllOf3 = new Schema();
        $ownerSchemaOneOf1AllOf3->not = new Schema();
        $ownerSchemaOneOf1AllOf3->not->required = array(
            self::names()->example,
        );
        $ownerSchemaOneOf1->allOf[3] = $ownerSchemaOneOf1AllOf3;
        $ownerSchemaOneOf1AllOf4 = new Schema();
        $ownerSchemaOneOf1AllOf4->not = new Schema();
        $ownerSchemaOneOf1AllOf4->not->required = array(
            self::names()->examples,
        );
        $ownerSchemaOneOf1->allOf[4] = $ownerSchemaOneOf1AllOf4;
        $ownerSchemaOneOf1->description = "Some properties are not allowed if content is present";
        $ownerSchemaOneOf1->required = array(
            self::names()->content,
        );
        $ownerSchema->oneOf[1] = $ownerSchemaOneOf1;
        $ownerSchema->description = "Schema and content are mutually exclusive, at least one is required";
        $ownerSchema->setFromRef('#/definitions/SchemaXORContent');
    }
}