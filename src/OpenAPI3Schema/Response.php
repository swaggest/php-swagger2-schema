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
 * Built from #/definitions/Response
 */
class Response extends ClassStructure
{
    const X_PROPERTY_PATTERN = '^x-';

    /** @var string */
    public $description;

    /** @var Header[]|mixed[]|string[][] */
    public $headers;

    /** @var MediaType[]|mixed[] */
    public $content;

    /** @var Link[]|string[][] */
    public $links;

    /**
     * @param Properties|static $properties
     * @param Schema $ownerSchema
     */
    public static function setUpProperties($properties, Schema $ownerSchema)
    {
        $properties->description = Schema::string();
        $properties->headers = Schema::object();
        $properties->headers->additionalProperties = new Schema();
        $properties->headers->additionalProperties->oneOf[0] = Header::schema();
        $properties->headers->additionalProperties->oneOf[1] = Reference::schema();
        $properties->content = Schema::object();
        $properties->content->additionalProperties = MediaType::schema();
        $properties->links = Schema::object();
        $properties->links->additionalProperties = new Schema();
        $properties->links->additionalProperties->oneOf[0] = Link::schema();
        $properties->links->additionalProperties->oneOf[1] = Reference::schema();
        $ownerSchema->type = 'object';
        $ownerSchema->additionalProperties = false;
        $patternProperty = new Schema();
        $ownerSchema->setPatternProperty('^x-', $patternProperty);
        $ownerSchema->required = array(
            self::names()->description,
        );
        $ownerSchema->setFromRef('#/definitions/Response');
    }

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
     * @param Header[]|mixed[]|string[][] $headers
     * @return $this
     * @codeCoverageIgnoreStart
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
        return $this;
    }
    /** @codeCoverageIgnoreEnd */

    /**
     * @param MediaType[]|mixed[] $content
     * @return $this
     * @codeCoverageIgnoreStart
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }
    /** @codeCoverageIgnoreEnd */

    /**
     * @param Link[]|string[][] $links
     * @return $this
     * @codeCoverageIgnoreStart
     */
    public function setLinks($links)
    {
        $this->links = $links;
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