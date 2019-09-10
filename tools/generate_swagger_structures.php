<?php

namespace Swaggest\SwaggerSchema;

use Swaggest\JsonSchema\Context;
use Swaggest\JsonSchema\RemoteRef\Preloaded;
use Swaggest\JsonSchema\Schema;
use Swaggest\PhpCodeBuilder\App\PhpApp;
use Swaggest\PhpCodeBuilder\JsonSchema\ClassHookCallback;
use Swaggest\PhpCodeBuilder\JsonSchema\PhpBuilder;
use Swaggest\PhpCodeBuilder\JsonSchema\SchemaExporterInterface;
use Swaggest\PhpCodeBuilder\PhpClass;
use Swaggest\PhpCodeBuilder\PhpCode;

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

$appPath = realpath(__DIR__ . '/../src') . '/SwaggerSchema/';
$appNs = 'Swaggest\SwaggerSchema';

$app = new PhpApp();
$app->setNamespaceRoot($appNs, '.');

$builder = new PhpBuilder();
$builder->buildSetters = true;
$builder->makeEnumConstants = true;
$builder->minimizeRefs = true;

$builder->classCreatedHook = new ClassHookCallback(function (PhpClass $class, $path, $schema) use ($app, $appNs) {
    $desc = '';
    if ($schema->title) {
        $desc = $schema->title;
    }
    if ($schema->description) {
        $desc .= "\n" . $schema->description;
    }
    if ($fromRefs = $schema->getFromRefs()) {
        $desc .= "\nBuilt from " . implode("\n" . ' <- ', $fromRefs);
    }

    $class->setDescription(trim($desc));

    $class->setNamespace($appNs);
    if ('#' === $path) {
        $class->setName('SwaggerSchema');
    } elseif ('#/definitions/' === substr($path, 0, strlen('#/definitions/'))) {
        $className = PhpCode::makePhpClassName(substr($path, strlen('#/definitions/')));
        if ($className === 'Schema') {
            $className = 'DefinitionsSchema';
        }
        $class->setName($className);
    }
    $app->addClass($class);
});

$builder->classPreparedHook = new SchemaExporterInterface();

$builder->getType($swaggerSchema);
$app->clearOldFiles($appPath);
$app->store($appPath);
