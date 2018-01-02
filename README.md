# Swagger 2.0 schema PHP mappings

[![Build Status](https://travis-ci.org/swaggest/php-swagger2-schema.svg?branch=master)](https://travis-ci.org/swaggest/php-swagger2-schema)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/swaggest/php-swagger2-schema/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/swaggest/php-swagger2-schema/?branch=master)
[![Code Climate](https://codeclimate.com/github/swaggest/php-swagger2-schema/badges/gpa.svg)](https://codeclimate.com/github/swaggest/php-swagger2-schema)
[![Test Coverage](https://codeclimate.com/github/swaggest/php-swagger2-schema/badges/coverage.svg)](https://codeclimate.com/github/swaggest/php-swagger2-schema/coverage)

Access and validate `swagger 2.0` schemas from PHP.

## Installation

```
composer require swaggest/swagger2-schema
```

## Usage

```php
// Load schema
$json = json_decode(file_get_contents(__DIR__ . '/../../spec/petstore-swagger.json'));

// Import and validate
$schema = SwaggerSchema::import($json);

// Access data through PHP classes
$this->assertSame('Swagger Petstore', $schema->info->title);
```
