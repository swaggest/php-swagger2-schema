<?php

namespace Swaggest\SwaggerSchema\Tests\PHPUnit;

use Swaggest\OpenAPI3Schema\OpenAPI3Schema;
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

    public function testReadOpenAPI3Schema()
    {
        // Load schema
        $json = json_decode(file_get_contents(__DIR__ . '/../../../spec/petstore-openapi3.json'));

        // Import and validate
        $schema = OpenAPI3Schema::import($json);

        // Access data through PHP classes
        $this->assertSame('Swagger Petstore', $schema->info->title);
        $ops = $schema->paths['/pets']->getGetPutPostDeleteOptionsHeadPatchTraceValues();
        $this->assertSame('List all pets', $ops['get']->summary);
    }

}