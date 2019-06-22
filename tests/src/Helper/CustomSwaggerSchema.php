<?php

namespace Swaggest\SwaggerSchema\Tests\Helper;

use Swaggest\JsonSchema\Context;
use Swaggest\SwaggerSchema\DefinitionsSchema;
use Swaggest\SwaggerSchema\SwaggerSchema;

class CustomSwaggerSchema extends SwaggerSchema
{
    public static function import($data, Context $options = null)
    {
        if ($options === null) {
            $options = new Context();
        }
        $options->applyDefaults = false;
        $options->objectItemClassMapping[DefinitionsSchema::className()] = CustomSchema::className();
        return parent::import($data, $options);
    }
}