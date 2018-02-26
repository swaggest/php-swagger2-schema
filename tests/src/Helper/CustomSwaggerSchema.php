<?php

namespace Swaggest\SwaggerSchema\Tests\Helper;

use Swaggest\JsonSchema\Context;
use Swaggest\SwaggerSchema\Schema;
use Swaggest\SwaggerSchema\SwaggerSchema;

class CustomSwaggerSchema extends SwaggerSchema
{
    public static function import($data, Context $options = null)
    {
        if ($options === null) {
            $options = new Context();
        }
        $options->applyDefaults = false;
        $options->objectItemClassMapping[Schema::className()] = CustomSchema::className();
        return parent::import($data, $options);
    }
}