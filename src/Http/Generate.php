<?php

namespace Swaggest\SwaggerSchema\Http;

use Swaggest\JsonSchema\Schema;
use Swaggest\PhpCodeBuilder\PhpClass;
use Swaggest\PhpCodeBuilder\PhpCode;
use Swaggest\PhpCodeBuilder\PhpConstant;
use Swaggest\PhpCodeBuilder\PhpDoc;
use Swaggest\PhpCodeBuilder\PhpFile;
use Swaggest\PhpCodeBuilder\PhpNamedVar;
use Swaggest\PhpCodeBuilder\PhpStdType;

class Generate
{
    public function build()
    {
        $statusCodesSchema = Schema::arr()->setItems(StatusCode::schema());
        $statusCodesData = $statusCodesSchema->in(json_decode(file_get_contents(__DIR__ . '/../../spec/http/json/status-codes.json')));

        $namespace = 'Swaggest\\SwaggerSchema\\Http';

        $statusCodesClass = new PhpClass();
        $statusCodesClass->setNamespace($namespace);
        $statusCodesClass->setName('StatusCodes');


        $getInfoByCodeFunc = new \Swaggest\PhpCodeBuilder\PhpFunction('getInfoByCode', \Swaggest\PhpCodeBuilder\PhpFlags::VIS_PUBLIC, true);
        $getInfoByCodeFunc->addArgument(new PhpNamedVar('code', PhpStdType::int()));
        $getInfoByCodeFunc->setThrows(PhpClass::byFQN('\Exception'));
        $getInfoByCodeFunc->setResult(PhpClass::byFQN(StatusCode::className()));
        $statusCodesClass->addMethod($getInfoByCodeFunc);
        $getInfoByCodeBody = new PhpCode(<<<PHP
switch (\$code) {

PHP
);
        $getInfoByCodeFunc->setBody($getInfoByCodeBody);

        /** @var StatusCode $item */
        foreach ($statusCodesData as $item) {
            if (strpos($item->code, 'x') !== false) {
                continue;
            }

            try {
                $item->description = trim($item->description, '"');
                $c = new PhpConstant(PhpCode::makePhpConstantName($item->phrase), (int)$item->code);
                $c->setDescription($item->description);
                $c->getPhpDoc()->add(PhpDoc::TAG_SEE, '[' . $item->specTitle . '](' . $item->specHref . ')');
                $statusCodesClass->addConstant($c);

                $json = str_replace("'", "\\'", json_encode($item));
                $getInfoByCodeBody->addSnippet(<<<PHP
    case $item->code: return(StatusCode::import(json_decode('$json')));

PHP
);

            } catch (\Exception $e) {
                echo $e->getMessage(), "\n";
            }
        }

        $getInfoByCodeBody->addSnippet(<<<PHP
    default: throw new \Exception("Unknown code: " . \$code);
}

PHP
);

        $phpFile = new PhpFile();
        $phpFile->setNamespace($namespace);
        $phpFile->getCode()->addSnippet($statusCodesClass);

        file_put_contents(__DIR__ . '/' . $statusCodesClass->getName() . '.php', $phpFile);

    }
}