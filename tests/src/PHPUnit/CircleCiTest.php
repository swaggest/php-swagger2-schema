<?php

namespace Swaggest\SwaggerSchema\Tests\PHPUnit;


use Swaggest\JsonSchema\Schema;
use Swaggest\SwaggerSchema\SwaggerSchema;

class CircleCiTest extends \PHPUnit_Framework_TestCase
{
    public function testReadSchema()
    {
        // Load schema
        $json = json_decode(file_get_contents(__DIR__ . '/../../circleci.json'));

        $swaggerSchema = Schema::import(__DIR__ . '/../../../spec/swagger-schema.json');
        $swaggerSchema->in($json);

        // Import and validate
        $schema = SwaggerSchema::import($json);

        // Access data through PHP classes
        $this->assertSame('Swagger Petstore', $schema->info->title);
    }


}