<?php

namespace Swaggest\SwaggerSchema\Tests\PHPUnit;

use Swaggest\JsonSchema\Context;
use Swaggest\SwaggerSchema\SwaggerSchema;

class CircleCITest extends \PHPUnit_Framework_TestCase
{
    public function testReadSchema()
    {
        // Load schema
        $json = json_decode(file_get_contents(__DIR__ . '/../../../spec/circleci.json'));

        $options = new Context();
        $options->dereference = true;

        // Import and validate
        $schema = SwaggerSchema::import($json, $options);

        // Access data through PHP classes
        $this->assertSame('CircleCI', $schema->info->title);

        $op = $schema->paths['/project/{username}/{project}']->get;
        $this->assertNotNull($op);

        $parameter = $op->parameters[0];

        $this->assertSame('integer', $parameter->type);
        $this->assertSame('limit', $parameter->name);

        $response = $op->responses[200];
        $this->assertSame('Build summary for each of the last 30 builds', $response->description);
        $this->assertSame('array', $response->schema->type);
    }

}