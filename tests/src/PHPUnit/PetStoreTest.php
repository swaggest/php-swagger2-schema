<?php

namespace Swaggest\SwaggerSchema\Tests\PHPUnit;

use Swaggest\JsonSchema\InvalidRef;
use Swaggest\JsonSchema\InvalidValue;
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
        $responseSchema = $schema->paths['/pet/findByStatus']->get->responses[200]->schema;
        $this->assertSame('array', $responseSchema->type);
        $this->assertSame('object', $responseSchema->items->type);
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

        $responseSchema = $ops['get']->responses[200]->content['application/json']->schema;
        $this->assertSame('array', $responseSchema->type);
    }

    public function testReadSchemaSwagger2()
    {
        // Load schema
        $json = json_decode(file_get_contents(__DIR__ . '/../../../spec/petstore-simple.json'));

        // Import and validate
        $schema = SwaggerSchema::import($json);

        // Access data through PHP classes
        $this->assertSame('Swagger Petstore', $schema->info->title);
    }

    public function testReadSchemaSwagger2InvalidRef()
    {
        $petstore = file_get_contents(__DIR__ . '/../../../spec/petstore-simple.json');
        $petstore = str_replace('#/definitions/Pet', '#/definitions/Foo', $petstore);

        // Load schema
        $json = json_decode($petstore);

        $failed = false;
        try {
            // Import and validate
            $schema = SwaggerSchema::import($json);
        } catch (InvalidRef $exception) {
            $failed = true;

            $this->assertEquals('Could not resolve #/definitions/Foo@: Foo',
                $exception->getMessage());
        }

        $this->assertTrue($failed);
    }

    public function testInvalid2()
    {
        $json = <<<'JSON'
{
    "swagger": "2.0",
    "info": {
        "title": "test",
        "version": "1.0.0"
    },
    "paths": {
        "/test": {
            "get": {
                "summary": "test",
                "responses": {
                    "200": {
                        "description": "successful response",
                        "schema": {
                            "$ref": "#/definitions/response"
                        }
                    }
                }
            }
        }
    },
    "definitions": {
        "response": {
            "properties": {
                "foo": {
                    "type": "array",
                    "items": {
                        "$ref": "#/definitions/good"
                    }
                },
                "bar": {
                    "type": "array",
                    "items": {
                        "$ref": "#/definitions/missing1"
                    }
                }
            }
        },
        "good": {
            "properties": {
                "foo": {
                    "$ref": "#/definitions/missing2"
                }
            }
        }
    }
}

JSON;


        $failed = false;
        try {
            $schema = SwaggerSchema::import(json_decode($json));
        } catch (InvalidRef $exception) {
            $failed = true;
            $this->assertEquals('Could not resolve #/definitions/missing2@: missing2',
                $exception->getMessage());
        }

        $this->assertTrue($failed);
    }
}