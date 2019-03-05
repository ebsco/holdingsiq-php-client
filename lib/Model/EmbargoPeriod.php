<?php
/**
 * EmbargoPeriod
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
 * EmbargoPeriod Class Doc Comment
 *
 * @category Class
 * @description Embargo Period
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class EmbargoPeriod implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'embargoPeriod';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'embargo_unit' => 'string',
'embargo_value' => 'int'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'embargo_unit' => null,
'embargo_value' => null    ];

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
        'embargo_unit' => 'embargoUnit',
'embargo_value' => 'embargoValue'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'embargo_unit' => 'setEmbargoUnit',
'embargo_value' => 'setEmbargoValue'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'embargo_unit' => 'getEmbargoUnit',
'embargo_value' => 'getEmbargoValue'    ];

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

    const EMBARGO_UNIT_DAYS = 'days';
const EMBARGO_UNIT_WEEKS = 'weeks';
const EMBARGO_UNIT_MONTHS = 'months';
const EMBARGO_UNIT_YEARS = 'years';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getEmbargoUnitAllowableValues()
    {
        return [
            self::EMBARGO_UNIT_DAYS,
self::EMBARGO_UNIT_WEEKS,
self::EMBARGO_UNIT_MONTHS,
self::EMBARGO_UNIT_YEARS,        ];
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
        $this->container['embargo_unit'] = isset($data['embargo_unit']) ? $data['embargo_unit'] : null;
        $this->container['embargo_value'] = isset($data['embargo_value']) ? $data['embargo_value'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['embargo_unit'] === null) {
            $invalidProperties[] = "'embargo_unit' can't be null";
        }
        $allowedValues = $this->getEmbargoUnitAllowableValues();
        if (!in_array($this->container['embargo_unit'], $allowedValues)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'embargo_unit', must be one of '%s' (%s)",
                implode("', '", $allowedValues, $this->container['embargo_unit'])
            );
        }

        if ($this->container['embargo_value'] === null) {
            $invalidProperties[] = "'embargo_value' can't be null";
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

        if ($this->container['embargo_unit'] === null) {
            return false;
        }
        $allowedValues = $this->getEmbargoUnitAllowableValues();
        if (!in_array($this->container['embargo_unit'], $allowedValues)) {
            return false;
        }
        if ($this->container['embargo_value'] === null) {
            return false;
        }
        return true;
    }


    /**
     * Gets embargo_unit
     *
     * @return string
     */
    public function getEmbargoUnit()
    {
        return $this->container['embargo_unit'];
    }

    /**
     * Sets embargo_unit
     *
     * @param string $embargo_unit The unit of time to use for the embargo - Days, Weeks, Months or Years.
     *
     * @return $this
     */
    public function setEmbargoUnit($embargo_unit)
    {
        $allowedValues = $this->getEmbargoUnitAllowableValues();
        if (!in_array($embargo_unit, $allowedValues)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'embargo_unit', must be one of '%s' (%s)",
                    implode("', '", $allowedValues), $embargo_unit
                )
            );
        }
        $this->container['embargo_unit'] = $embargo_unit;

        return $this;
    }

    /**
     * Gets embargo_value
     *
     * @return int
     */
    public function getEmbargoValue()
    {
        return $this->container['embargo_value'];
    }

    /**
     * Sets embargo_value
     *
     * @param int $embargo_value The embargo value (number of embargoUnits).  A Null value means there is no embargo.
     *
     * @return $this
     */
    public function setEmbargoValue($embargo_value)
    {
        $this->container['embargo_value'] = $embargo_value;

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
