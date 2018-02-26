<?php

namespace Swaggest\SwaggerSchema\Tests\PHPUnit;

use Swaggest\JsonSchema\Context;
use Swaggest\SwaggerSchema\Schema;
use Swaggest\SwaggerSchema\SwaggerSchema;
use Swaggest\SwaggerSchema\Tests\Helper\CustomSchema;
use Swaggest\SwaggerSchema\Tests\Helper\CustomSwaggerSchema;

class CustomMappingTest extends \PHPUnit_Framework_TestCase
{
    public function testMapping() {
        $schema = CustomSwaggerSchema::import(json_decode(
            file_get_contents(__DIR__ . '/../../../spec/petstore-swagger.json')
        ));

        $this->assertInstanceOf(CustomSchema::className(), $schema->definitions['User']);
    }

    public function testMappingWithContext() {
        $context = new Context();
        $context->objectItemClassMapping[Schema::className()] = CustomSchema::className();
        $context->applyDefaults = false;
        $schema = SwaggerSchema::schema()->in(json_decode(
            file_get_contents(__DIR__ . '/../../../spec/petstore-swagger.json')
        ), $context);
        $this->assertInstanceOf(CustomSchema::className(), $schema->definitions['User']);

    }
}