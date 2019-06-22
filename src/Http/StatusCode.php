<?php

namespace Swaggest\SwaggerHttp;


use Swaggest\JsonSchema\Constraint\Properties;
use Swaggest\JsonSchema\Schema;
use Swaggest\JsonSchema\Structure\ClassStructure;

class StatusCode extends ClassStructure
{
    /*
        "code": "100",
        "phrase": "Continue",
        "description": "\"indicates that the initial part of a request has been received and has not yet been rejected by the server.\"",
        "spec_title": "RFC7231#6.2.1",
        "spec_href": "https://tools.ietf.org/html/rfc7231#section-6.2.1"
     */

    public $code;
    public $phrase;
    public $description;
    public $specTitle;
    /**
     * @see [RFC7231#6.2.1](https://tools.ietf.org/html/rfc7231#section-6.2.1)
     */
    public $specHref;

    /**
     * @param Properties|static $properties
     * @param Schema $ownerSchema
     */
    public static function setUpProperties($properties, Schema $ownerSchema)
    {
        $properties->code = Schema::string();
        $properties->phrase = Schema::string();
        $properties->description = Schema::string();
        $properties->specTitle = Schema::string();
        $ownerSchema->addPropertyMapping('spec_title', self::names()->specTitle);
        $properties->specHref = Schema::string();
        $ownerSchema->addPropertyMapping('spec_href', self::names()->specHref);
    }
}