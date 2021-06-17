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
        } catch (InvalidValue $exception) {
            $failed = true;

            $this->assertEquals('No valid results for oneOf {
 0: No valid results for oneOf {
  0: No valid results for anyOf {
    0: Could not resolve #/definitions/Foo@: Foo at #->$ref[#/definitions/Swaggest\SwaggerSchema\SwaggerSchema]->properties:paths->$ref[#/definitions/paths]->patternProperties[^/]:/pets->$ref[#/definitions/pathItem]->properties:get->$ref[#/definitions/operation]->properties:responses->$ref[#/definitions/responses]->patternProperties[^([0-9]{3})$|^(default)$]:200->$ref[#/definitions/responseValue]->oneOf[0]->$ref[#/definitions/response]->properties:schema->oneOf[0]->$ref[#/definitions/schema]->properties:items->anyOf[0]->$ref[#/definitions/schema]
    1: Array expected, {"$ref":"#\/definitions\/Foo"} received at #->$ref[#/definitions/Swaggest\SwaggerSchema\SwaggerSchema]->properties:paths->$ref[#/definitions/paths]->patternProperties[^/]:/pets->$ref[#/definitions/pathItem]->properties:get->$ref[#/definitions/operation]->properties:responses->$ref[#/definitions/responses]->patternProperties[^([0-9]{3})$|^(default)$]:200->$ref[#/definitions/responseValue]->oneOf[0]->$ref[#/definitions/response]->properties:schema->oneOf[0]->$ref[#/definitions/schema]->properties:items->anyOf[1]
  } at #->$ref[#/definitions/Swaggest\SwaggerSchema\SwaggerSchema]->properties:paths->$ref[#/definitions/paths]->patternProperties[^/]:/pets->$ref[#/definitions/pathItem]->properties:get->$ref[#/definitions/operation]->properties:responses->$ref[#/definitions/responses]->patternProperties[^([0-9]{3})$|^(default)$]:200->$ref[#/definitions/responseValue]->oneOf[0]->$ref[#/definitions/response]->properties:schema->oneOf[0]->$ref[#/definitions/schema]->properties:items
  1: Enum failed, enum: ["file"], data: "array" at #->$ref[#/definitions/Swaggest\SwaggerSchema\SwaggerSchema]->properties:paths->$ref[#/definitions/paths]->patternProperties[^/]:/pets->$ref[#/definitions/pathItem]->properties:get->$ref[#/definitions/operation]->properties:responses->$ref[#/definitions/responses]->patternProperties[^([0-9]{3})$|^(default)$]:200->$ref[#/definitions/responseValue]->oneOf[0]->$ref[#/definitions/response]->properties:schema->oneOf[1]->$ref[#/definitions/fileSchema]->properties:type
 } at #->$ref[#/definitions/Swaggest\SwaggerSchema\SwaggerSchema]->properties:paths->$ref[#/definitions/paths]->patternProperties[^/]:/pets->$ref[#/definitions/pathItem]->properties:get->$ref[#/definitions/operation]->properties:responses->$ref[#/definitions/responses]->patternProperties[^([0-9]{3})$|^(default)$]:200->$ref[#/definitions/responseValue]->oneOf[0]->$ref[#/definitions/response]->properties:schema
 1: Required property missing: $ref, data: {"description":"pet response","schema":{"type":"array","items":{"$ref":"#/definitions/Foo"}}} at #->$ref[#/definitions/Swaggest\SwaggerSchema\SwaggerSchema]->properties:paths->$ref[#/definitions/paths]->patternProperties[^/]:/pets->$ref[#/definitions/pathItem]->properties:get->$ref[#/definitions/operation]->properties:responses->$ref[#/definitions/responses]->patternProperties[^([0-9]{3})$|^(default)$]:200->$ref[#/definitions/responseValue]->oneOf[1]->$ref[#/definitions/jsonReference]
} at #->$ref[#/definitions/Swaggest\SwaggerSchema\SwaggerSchema]->properties:paths->$ref[#/definitions/paths]->patternProperties[^/]:/pets->$ref[#/definitions/pathItem]->properties:get->$ref[#/definitions/operation]->properties:responses->$ref[#/definitions/responses]->patternProperties[^([0-9]{3})$|^(default)$]:200->$ref[#/definitions/responseValue]',
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