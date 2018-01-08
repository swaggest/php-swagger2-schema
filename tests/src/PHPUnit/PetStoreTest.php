<?php

namespace Swaggest\SwaggerSchema\Tests\PHPUnit;

use Swaggest\SwaggerSchema\SwaggerSchema;

class PetStoreTest extends \PHPUnit_Framework_TestCase
{
    public function testReadSchema()
    {
        // Load schema
        $json = json_decode(file_get_contents(__DIR__ . '/../../../spec/petstore-swagger.json'));

        // Import and validate
        $schema = SwaggerSchema::import($json);

        // Access data through PHP classes
        $this->assertSame('Swagger Petstore', $schema->info->title);
    }

}