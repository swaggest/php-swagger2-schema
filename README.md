# OpenAPI 3.0 and Swagger 2.0 schema PHP mappings

[![Build Status](https://travis-ci.org/swaggest/php-swagger2-schema.svg?branch=master)](https://travis-ci.org/swaggest/php-swagger2-schema)
[![codecov](https://codecov.io/gh/swaggest/php-swagger2-schema/branch/master/graph/badge.svg)](https://codecov.io/gh/swaggest/php-swagger2-schema)

Access and validate `OpenAPI 3.0` and `Swagger 2.0` schemas from PHP.

## Installation

```
composer require swaggest/swagger2-schema
```

## Usage

### OpenAPI 3.0

```php
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
```

### Swagger 2.0

```php
// Load schema
$json = json_decode(file_get_contents(__DIR__ . '/../../spec/petstore-swagger.json'));

// Import and validate
$schema = SwaggerSchema::import($json);

// Access data through PHP classes
$this->assertSame('Swagger Petstore', $schema->info->title);
```
