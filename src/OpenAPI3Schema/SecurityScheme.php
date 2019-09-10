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
 * Built from #/definitions/SecurityScheme
 * @method static APIKeySecurityScheme|HTTPSecurityScheme|HTTPSecuritySchemeOneOf0|HTTPSecuritySchemeOneOf1|OAuth2SecurityScheme|OpenIdConnectSecurityScheme import($data, Context $options = null)
 */
class SecurityScheme extends ClassStructure
{
    /**
     * @param Properties|static $properties
     * @param Schema $ownerSchema
     */
    public static function setUpProperties($properties, Schema $ownerSchema)
    {
        $ownerSchema->oneOf[0] = APIKeySecurityScheme::schema();
        $ownerSchema->oneOf[1] = HTTPSecurityScheme::schema();
        $ownerSchema->oneOf[2] = OAuth2SecurityScheme::schema();
        $ownerSchema->oneOf[3] = OpenIdConnectSecurityScheme::schema();
        $ownerSchema->setFromRef('#/definitions/SecurityScheme');
    }
}