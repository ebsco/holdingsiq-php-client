<?php
/**
 * Label
 *
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
* EBSCO HoldingsIQ
 *
* The EBSCO HoldingsIQ service retrieves vendor, package and title related information in JSON format.  The information includes customer selected resources as reflected in the EBSCO Knowledge Base for both EBSCO managed and customer managed resources.
 *
* OpenAPI spec version: 1.0.0
 * Contact: support@ebsco.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.4
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Model;

use \ArrayAccess;
use \Swagger\Client\ObjectSerializer;

/**
 * Label Class Doc Comment
 *
 * @category Class
 * @description Custom Label
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Label implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'label';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'id' => 'int',
'display_label' => 'string',
'display_on_full_text_finder' => 'bool',
'display_on_publication_finder' => 'bool'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'id' => null,
'display_label' => null,
'display_on_full_text_finder' => null,
'display_on_publication_finder' => null    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'id' => 'id',
'display_label' => 'displayLabel',
'display_on_full_text_finder' => 'displayOnFullTextFinder',
'display_on_publication_finder' => 'displayOnPublicationFinder'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
'display_label' => 'setDisplayLabel',
'display_on_full_text_finder' => 'setDisplayOnFullTextFinder',
'display_on_publication_finder' => 'setDisplayOnPublicationFinder'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
'display_label' => 'getDisplayLabel',
'display_on_full_text_finder' => 'getDisplayOnFullTextFinder',
'display_on_publication_finder' => 'getDisplayOnPublicationFinder'    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['display_label'] = isset($data['display_label']) ? $data['display_label'] : null;
        $this->container['display_on_full_text_finder'] = isset($data['display_on_full_text_finder']) ? $data['display_on_full_text_finder'] : null;
        $this->container['display_on_publication_finder'] = isset($data['display_on_publication_finder']) ? $data['display_on_publication_finder'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['id'] === null) {
            $invalidProperties[] = "'id' can't be null";
        }
        if ($this->container['display_label'] === null) {
            $invalidProperties[] = "'display_label' can't be null";
        }
        if ($this->container['display_on_full_text_finder'] === null) {
            $invalidProperties[] = "'display_on_full_text_finder' can't be null";
        }
        if ($this->container['display_on_publication_finder'] === null) {
            $invalidProperties[] = "'display_on_publication_finder' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {

        if ($this->container['id'] === null) {
            return false;
        }
        if ($this->container['display_label'] === null) {
            return false;
        }
        if ($this->container['display_on_full_text_finder'] === null) {
            return false;
        }
        if ($this->container['display_on_publication_finder'] === null) {
            return false;
        }
        return true;
    }


    /**
     * Gets id
     *
     * @return int
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param int $id Display Label ID
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets display_label
     *
     * @return string
     */
    public function getDisplayLabel()
    {
        return $this->container['display_label'];
    }

    /**
     * Sets display_label
     *
     * @param string $display_label Custom field display Label Name
     *
     * @return $this
     */
    public function setDisplayLabel($display_label)
    {
        $this->container['display_label'] = $display_label;

        return $this;
    }

    /**
     * Gets display_on_full_text_finder
     *
     * @return bool
     */
    public function getDisplayOnFullTextFinder()
    {
        return $this->container['display_on_full_text_finder'];
    }

    /**
     * Sets display_on_full_text_finder
     *
     * @param bool $display_on_full_text_finder Indicates if displayed on Full Text Finder.
     *
     * @return $this
     */
    public function setDisplayOnFullTextFinder($display_on_full_text_finder)
    {
        $this->container['display_on_full_text_finder'] = $display_on_full_text_finder;

        return $this;
    }

    /**
     * Gets display_on_publication_finder
     *
     * @return bool
     */
    public function getDisplayOnPublicationFinder()
    {
        return $this->container['display_on_publication_finder'];
    }

    /**
     * Sets display_on_publication_finder
     *
     * @param bool $display_on_publication_finder Indicates if displayed on Publication Finder.
     *
     * @return $this
     */
    public function setDisplayOnPublicationFinder($display_on_publication_finder)
    {
        $this->container['display_on_publication_finder'] = $display_on_publication_finder;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
