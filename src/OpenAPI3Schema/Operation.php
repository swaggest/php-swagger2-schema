<?php
/**
 * @file ATTENTION!!! The code below was carefully crafted by a mean machine.
 * Please consider to NOT put any emotional human-generated modifications as the splendid AI will throw them away with no mercy.
 */

namespace Swaggest\OpenAPI3Schema;

use Swaggest\JsonSchema\Constraint\Properties;
use Swaggest\JsonSchema\Exception\StringException;
use Swaggest\JsonSchema\Helper;
use Swaggest\JsonSchema\InvalidValue;
use Swaggest\JsonSchema\Schema;
use Swaggest\JsonSchema\Structure\ClassStructure;


/**
 * Built from #/definitions/Operation
 */
class Operation extends ClassStructure
{
    const X_PROPERTY_PATTERN = '^x-';

    /** @var string[]|array */
    public $tags;

    /** @var string */
    public $summary;

    /** @var string */
    public $description;

    /** @var ExternalDocumentation */
    public $externalDocs;

    /** @var string */
    public $operationId;

    /** @var Parameter[]|mixed[]|ParameterLocationOneOf0[]|ParameterLocationOneOf1[]|ParameterLocationOneOf2[]|ParameterLocationOneOf3[]|string[][]|array */
    public $parameters;

    /** @var RequestBody|string[] */
    public $requestBody;

    /** @var Responses|Response[]|string[][] */
    public $responses;

    /** @var PathItem[]|Operation[][][]|string[][] */
    public $callbacks;

    /** @var bool */
    public $deprecated;

    /** @var string[][]|array[][]|array */
    public $security;

    /** @var Server[]|array */
    public $servers;

    /**
     * @param Properties|static $properties
     * @param Schema $ownerSchema
     */
    public static function setUpProperties($properties, Schema $ownerSchema)
    {
        $properties->tags = Schema::arr();
        $properties->tags->items = Schema::string();
        $properties->summary = Schema::string();
        $properties->description = Schema::string();
        $properties->externalDocs = ExternalDocumentation::schema();
        $properties->operationId = Schema::string();
        $properties->parameters = Schema::arr();
        $properties->parameters->items = new Schema();
        $properties->parameters->items->oneOf[0] = Parameter::schema();
        $properties->parameters->items->oneOf[1] = Reference::schema();
        $properties->parameters->uniqueItems = true;
        $properties->requestBody = new Schema();
        $properties->requestBody->oneOf[0] = RequestBody::schema();
        $properties->requestBody->oneOf[1] = Reference::schema();
        $properties->responses = Responses::schema();
        $properties->callbacks = Schema::object();
        $properties->callbacks->additionalProperties = new Schema();
        $properties->callbacks->additionalProperties->oneOf[0] = Callback::schema();
        $properties->callbacks->additionalProperties->oneOf[1] = Reference::schema();
        $properties->deprecated = Schema::boolean();
        $properties->deprecated->default = false;
        $properties->security = Schema::arr();
        $properties->security->items = SecurityRequirement::schema();
        $properties->servers = Schema::arr();
        $properties->servers->items = Server::schema();
        $ownerSchema->type = 'object';
        $ownerSchema->additionalProperties = false;
        $patternProperty = new Schema();
        $ownerSchema->setPatternProperty('^x-', $patternProperty);
        $ownerSchema->required = array(
            self::names()->responses,
        );
        $ownerSchema->setFromRef('#/definitions/Operation');
    }

    /**
     * @param string[]|array $tags
     * @return $this
     * @codeCoverageIgnoreStart
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }
    /** @codeCoverageIgnoreEnd */

    /**
     * @param string $summary
     * @return $this
     * @codeCoverageIgnoreStart
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
        return $this;
    }
    /** @codeCoverageIgnoreEnd */

    /**
     * @param string $description
     * @return $this
     * @codeCoverageIgnoreStart
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
    /** @codeCoverageIgnoreEnd */

    /**
     * @param ExternalDocumentation $externalDocs
     * @return $this
     * @codeCoverageIgnoreStart
     */
    public function setExternalDocs(ExternalDocumentation $externalDocs)
    {
        $this->externalDocs = $externalDocs;
        return $this;
    }
    /** @codeCoverageIgnoreEnd */

    /**
     * @param string $operationId
     * @return $this
     * @codeCoverageIgnoreStart
     */
    public function setOperationId($operationId)
    {
        $this->operationId = $operationId;
        return $this;
    }
    /** @codeCoverageIgnoreEnd */

    /**
     * @param Parameter[]|mixed[]|ParameterLocationOneOf0[]|ParameterLocationOneOf1[]|ParameterLocationOneOf2[]|ParameterLocationOneOf3[]|string[][]|array $parameters
     * @return $this
     * @codeCoverageIgnoreStart
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
        return $this;
    }
    /** @codeCoverageIgnoreEnd */

    /**
     * @param RequestBody|string[] $requestBody
     * @return $this
     * @codeCoverageIgnoreStart
     */
    public function setRequestBody($requestBody)
    {
        $this->requestBody = $requestBody;
        return $this;
    }
    /** @codeCoverageIgnoreEnd */

    /**
     * @param Responses|Response[]|string[][] $responses
     * @return $this
     * @codeCoverageIgnoreStart
     */
    public function setResponses($responses)
    {
        $this->responses = $responses;
        return $this;
    }
    /** @codeCoverageIgnoreEnd */

    /**
     * @param PathItem[]|Operation[][][]|string[][] $callbacks
     * @return $this
     * @codeCoverageIgnoreStart
     */
    public function setCallbacks($callbacks)
    {
        $this->callbacks = $callbacks;
        return $this;
    }
    /** @codeCoverageIgnoreEnd */

    /**
     * @param bool $deprecated
     * @return $this
     * @codeCoverageIgnoreStart
     */
    public function setDeprecated($deprecated)
    {
        $this->deprecated = $deprecated;
        return $this;
    }
    /** @codeCoverageIgnoreEnd */

    /**
     * @param string[][]|array[][]|array $security
     * @return $this
     * @codeCoverageIgnoreStart
     */
    public function setSecurity($security)
    {
        $this->security = $security;
        return $this;
    }
    /** @codeCoverageIgnoreEnd */

    /**
     * @param Server[]|array $servers
     * @return $this
     * @codeCoverageIgnoreStart
     */
    public function setServers($servers)
    {
        $this->servers = $servers;
        return $this;
    }
    /** @codeCoverageIgnoreEnd */

    /**
     * @codeCoverageIgnoreStart
     */
    public function getXValues()
    {
        $result = array();
        if (!$names = $this->getPatternPropertyNames(self::X_PROPERTY_PATTERN)) {
            return $result;
        }
        foreach ($names as $name) {
            $result[$name] = $this->$name;
        }
        return $result;
    }
    /** @codeCoverageIgnoreEnd */

    /**
     * @param string $name
     * @param mixed $value
     * @return self
     * @throws InvalidValue
     * @codeCoverageIgnoreStart
     */
    public function setXValue($name, $value)
    {
        if (preg_match(Helper::toPregPattern(self::X_PROPERTY_PATTERN), $name)) {
            throw new StringException('Pattern mismatch', StringException::PATTERN_MISMATCH);
        }
        $this->addPatternPropertyName(self::X_PROPERTY_PATTERN, $name);
        $this->{$name} = $value;
        return $this;
    }
    /** @codeCoverageIgnoreEnd */
}