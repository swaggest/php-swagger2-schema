<?php

namespace Swaggest\SwaggerSchema;

use Swaggest\JsonSchema\Context;
use Swaggest\JsonSchema\Exception;
use Swaggest\JsonSchema\InvalidValue;
use Swaggest\JsonSchema\RemoteRef\Preloaded;
use Swaggest\JsonSchema\Schema;
use Swaggest\PhpCodeBuilder\App\PhpApp;
use Swaggest\PhpCodeBuilder\JsonSchema\ClassHookCallback;
use Swaggest\PhpCodeBuilder\JsonSchema\PhpBuilder;
use Swaggest\PhpCodeBuilder\JsonSchema\SchemaExporterInterface;
use Swaggest\PhpCodeBuilder\PhpClass;
use Swaggest\PhpCodeBuilder\PhpCode;
use Swaggest\PhpCodeBuilder\PhpFlags;
use Swaggest\PhpCodeBuilder\PhpFunction;
use Swaggest\PhpCodeBuilder\PhpNamedVar;
use Swaggest\PhpCodeBuilder\PhpStdType;

if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    require_once __DIR__ . '/../vendor/autoload.php';
} else {
    require_once __DIR__ . '/../../../../vendor/autoload.php';
}

class OpenAPISchemaExporterInterface extends SchemaExporterInterface {
    protected function buildDefault($name)
    {
        if ($name === Schema::names()->type) {
            return <<<'PHP'
if ($this->nullable && $this->type) {
    $schema->type = [Schema::NULL, $this->type];
} else {
    $schema->type = $this->type;
}

PHP;
        }
        return parent::buildDefault($name);
    }
}

$schemaData = json_decode(file_get_contents(__DIR__ . '/../spec/openapi3-schema.json'));

$refProvider = new Preloaded();
$refProvider->setSchemaData('https://spec.openapis.org/oas/3.0/schema/2019-04-02', $schemaData);

$options = new Context();
$options->setRemoteRefProvider($refProvider);


$openapi3Schema = Schema::import($schemaData, $options);

$appPath = realpath(__DIR__ . '/../src') . '/OpenAPI3Schema/';
$appNs = 'Swaggest\OpenAPI3Schema';

$app = new PhpApp();
$app->setNamespaceRoot($appNs, '.');

$builder = new PhpBuilder();
$builder->buildSetters = true;
$builder->makeEnumConstants = true;
$builder->minimizeRefs = true;
$builder->namesFromDescriptions = true;

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
        $class->setName('OpenAPI3Schema');
        $import = new PhpFunction('import', PhpFlags::VIS_PUBLIC, true);
        $import->addArgument(new PhpNamedVar('data'));
        $import->addArgument(new PhpNamedVar('options', PhpClass::byFQN(Context::class), true, null));
        $import->setResult(PhpStdType::tStatic());
        $import->addThrows(PhpClass::byFQN(InvalidValue::class));
        $import->addThrows(PhpClass::byFQN(Exception::class));
        $import->setBody(<<<'PHP'
if ($options == null) {
    $options = new Context();
}
$options->dereference = true;
return static::schema()->in($data, $options);
PHP
        );
        $class->addMethod($import);
    } elseif ('#/definitions/' === substr($path, 0, strlen('#/definitions/'))) {
        $className = PhpCode::makePhpClassName(substr($path, strlen('#/definitions/')));
        if ($className === 'Schema') {
            $className = 'DefinitionsSchema';
        }
        $class->setName($className);
    }
    $app->addClass($class);
});

$builder->classPreparedHook = new OpenAPISchemaExporterInterface();

$builder->getType($openapi3Schema);
$app->clearOldFiles($appPath);
$app->store($appPath);
