<?php

namespace Swaggest\SwaggerSchema;

use Swaggest\JsonSchema\Context;
use Swaggest\JsonSchema\Exception;
use Swaggest\JsonSchema\InvalidValue;
use Swaggest\JsonSchema\RemoteRef\Preloaded;
use Swaggest\JsonSchema\Schema;
use Swaggest\PhpCodeBuilder\JsonSchema\PhpBuilder;
use Swaggest\PhpCodeBuilder\JsonSchema\SchemaExporterInterface;
use Swaggest\PhpCodeBuilder\PhpClass;
use Swaggest\PhpCodeBuilder\PhpCode;
use Swaggest\PhpCodeBuilder\PhpFile;
use Swaggest\PhpCodeBuilder\PhpFlags;
use Swaggest\PhpCodeBuilder\PhpFunction;
use Swaggest\PhpCodeBuilder\PhpNamedVar;
use Swaggest\PhpCodeBuilder\PhpStdType;

if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    require_once __DIR__ . '/../vendor/autoload.php';
} else {
    require_once __DIR__ . '/../../../../vendor/autoload.php';
}


$schemaData = json_decode(file_get_contents(__DIR__ . '/../spec/swagger-schema.json'));

$refProvider = new Preloaded();
$refProvider->setSchemaData('http://swagger.io/v2/schema.json', $schemaData);

$options = new Context();
$options->setRemoteRefProvider($refProvider);


$swaggerSchema = Schema::import($schemaData, $options);

$builder = new PhpBuilder();
$builder->buildSetters = true;
$builder->makeEnumConstants = true;

$builder->getType($swaggerSchema);

$classes = array();
$files = array();
foreach ($builder->getGeneratedClasses() as $class) {
    $phpFile = new PhpFile();
    $phpCode = $phpFile->getCode();

    $namespace = 'Swaggest\\SwaggerSchema';
    $phpFile->setNamespace($namespace);

    $desc = '';
    if ($class->schema->title) {
        $desc = $class->schema->title;
    }
    if ($class->schema->description) {
        $desc .= "\n" . $class->schema->description;
    }
    if ($class->schema->getFromRef()) {
        $desc .= "\nBuilt from " . $class->schema->getFromRef();
    }

    $class->class->setDescription(trim($desc));
    SchemaExporterInterface::process($class->class, $class->schema);


    if ($class->path === '#') {
        $className = 'SwaggerSchema';
        $class->class->getPhpDoc()->removeById(PhpBuilder::IMPORT_METHOD_PHPDOC_ID);
        $importFunc = new PhpFunction('import', PhpFlags::VIS_PUBLIC, true);
        $importFunc->setResult(PhpStdType::tStatic());
        $importFunc->addArgument(new PhpNamedVar('data', PhpStdType::mixed()));
        $importFunc->addArgument(new PhpNamedVar('options', PhpClass::byFQN(Context::class), true, null));
        $importFunc->addThrows(PhpClass::byFQN(Exception::class));
        $importFunc->addThrows(PhpClass::byFQN(InvalidValue::class));
        $importFunc->setBody(<<<'PHP'
if ($options === null) {
    $options = new Context();
}
$options->applyDefaults = false;
return parent::import($data, $options);
PHP
        );
        $class->class->addMethod($importFunc);
    } else {
        $schema = $class->schema;
        $path = $class->path;
        if ($schema->getFromRef()) {
            $path = $schema->getFromRef();
        }
        $path = str_replace('#/definitions/', '', $path);
        $className = PhpCode::makePhpName($path, false);
    }
    if (!isset($classes[$className])) {
        $classes[$className] = 1;
        $class->class->setName($className);
        $class->class->setNamespace($namespace);
        $phpCode->addSnippet($class->class);
        $phpCode->addSnippet("\n\n");

        $files[$className] = $phpFile;
    }
}

$dir = __DIR__ . '/../src';
if (!file_exists($dir)) {
    mkdir($dir, 0777, true);
}
foreach ($files as $className => $phpFile) {
    file_put_contents($dir . '/' . $className . '.php', (string)$phpFile);
}
