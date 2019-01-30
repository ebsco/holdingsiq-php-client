<?php
/**
 * SetProxyTwoPayload
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
 * SetProxyTwoPayload Class Doc Comment
 *
 * @category Class
 * @description This object represents data elements to update a proxy value for a title.
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class SetProxyTwoPayload implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'setProxyTwoPayload';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'is_selected' => 'bool',
'title_name' => 'string',
'pub_type' => 'string',
'publisher_name' => 'string',
'is_peer_reviewed' => 'bool',
'edition' => 'string',
'description' => 'string',
'url' => 'string',
'custom_coverage_list' => '\Swagger\Client\Model\CoverageDates[]',
'is_hidden' => 'bool',
'coverage_statement' => 'string',
'custom_embargo_period' => '\Swagger\Client\Model\EmbargoPeriod',
'user_defined_field1' => 'string',
'user_defined_field2' => 'string',
'user_defined_field3' => 'string',
'user_defined_field4' => 'string',
'user_defined_field5' => 'string',
'proxy' => '\Swagger\Client\Model\ProxyInfo'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'is_selected' => null,
'title_name' => null,
'pub_type' => null,
'publisher_name' => null,
'is_peer_reviewed' => null,
'edition' => null,
'description' => null,
'url' => null,
'custom_coverage_list' => null,
'is_hidden' => null,
'coverage_statement' => null,
'custom_embargo_period' => null,
'user_defined_field1' => null,
'user_defined_field2' => null,
'user_defined_field3' => null,
'user_defined_field4' => null,
'user_defined_field5' => null,
'proxy' => null    ];

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
        'is_selected' => 'isSelected',
'title_name' => 'titleName',
'pub_type' => 'pubType',
'publisher_name' => 'publisherName',
'is_peer_reviewed' => 'isPeerReviewed',
'edition' => 'edition',
'description' => 'description',
'url' => 'url',
'custom_coverage_list' => 'customCoverageList',
'is_hidden' => 'isHidden',
'coverage_statement' => 'coverageStatement',
'custom_embargo_period' => 'customEmbargoPeriod',
'user_defined_field1' => 'userDefinedField1',
'user_defined_field2' => 'userDefinedField2',
'user_defined_field3' => 'userDefinedField3',
'user_defined_field4' => 'userDefinedField4',
'user_defined_field5' => 'userDefinedField5',
'proxy' => 'proxy'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'is_selected' => 'setIsSelected',
'title_name' => 'setTitleName',
'pub_type' => 'setPubType',
'publisher_name' => 'setPublisherName',
'is_peer_reviewed' => 'setIsPeerReviewed',
'edition' => 'setEdition',
'description' => 'setDescription',
'url' => 'setUrl',
'custom_coverage_list' => 'setCustomCoverageList',
'is_hidden' => 'setIsHidden',
'coverage_statement' => 'setCoverageStatement',
'custom_embargo_period' => 'setCustomEmbargoPeriod',
'user_defined_field1' => 'setUserDefinedField1',
'user_defined_field2' => 'setUserDefinedField2',
'user_defined_field3' => 'setUserDefinedField3',
'user_defined_field4' => 'setUserDefinedField4',
'user_defined_field5' => 'setUserDefinedField5',
'proxy' => 'setProxy'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'is_selected' => 'getIsSelected',
'title_name' => 'getTitleName',
'pub_type' => 'getPubType',
'publisher_name' => 'getPublisherName',
'is_peer_reviewed' => 'getIsPeerReviewed',
'edition' => 'getEdition',
'description' => 'getDescription',
'url' => 'getUrl',
'custom_coverage_list' => 'getCustomCoverageList',
'is_hidden' => 'getIsHidden',
'coverage_statement' => 'getCoverageStatement',
'custom_embargo_period' => 'getCustomEmbargoPeriod',
'user_defined_field1' => 'getUserDefinedField1',
'user_defined_field2' => 'getUserDefinedField2',
'user_defined_field3' => 'getUserDefinedField3',
'user_defined_field4' => 'getUserDefinedField4',
'user_defined_field5' => 'getUserDefinedField5',
'proxy' => 'getProxy'    ];

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
        $this->container['is_selected'] = isset($data['is_selected']) ? $data['is_selected'] : null;
        $this->container['title_name'] = isset($data['title_name']) ? $data['title_name'] : null;
        $this->container['pub_type'] = isset($data['pub_type']) ? $data['pub_type'] : null;
        $this->container['publisher_name'] = isset($data['publisher_name']) ? $data['publisher_name'] : null;
        $this->container['is_peer_reviewed'] = isset($data['is_peer_reviewed']) ? $data['is_peer_reviewed'] : null;
        $this->container['edition'] = isset($data['edition']) ? $data['edition'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['url'] = isset($data['url']) ? $data['url'] : null;
        $this->container['custom_coverage_list'] = isset($data['custom_coverage_list']) ? $data['custom_coverage_list'] : null;
        $this->container['is_hidden'] = isset($data['is_hidden']) ? $data['is_hidden'] : null;
        $this->container['coverage_statement'] = isset($data['coverage_statement']) ? $data['coverage_statement'] : null;
        $this->container['custom_embargo_period'] = isset($data['custom_embargo_period']) ? $data['custom_embargo_period'] : null;
        $this->container['user_defined_field1'] = isset($data['user_defined_field1']) ? $data['user_defined_field1'] : null;
        $this->container['user_defined_field2'] = isset($data['user_defined_field2']) ? $data['user_defined_field2'] : null;
        $this->container['user_defined_field3'] = isset($data['user_defined_field3']) ? $data['user_defined_field3'] : null;
        $this->container['user_defined_field4'] = isset($data['user_defined_field4']) ? $data['user_defined_field4'] : null;
        $this->container['user_defined_field5'] = isset($data['user_defined_field5']) ? $data['user_defined_field5'] : null;
        $this->container['proxy'] = isset($data['proxy']) ? $data['proxy'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['is_selected'] === null) {
            $invalidProperties[] = "'is_selected' can't be null";
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

        if ($this->container['is_selected'] === null) {
            return false;
        }
        return true;
    }


    /**
     * Gets is_selected
     *
     * @return bool
     */
    public function getIsSelected()
    {
        return $this->container['is_selected'];
    }

    /**
     * Sets is_selected
     *
     * @param bool $is_selected Indicates if selected in a customer's account.
     *
     * @return $this
     */
    public function setIsSelected($is_selected)
    {
        $this->container['is_selected'] = $is_selected;

        return $this;
    }

    /**
     * Gets title_name
     *
     * @return string
     */
    public function getTitleName()
    {
        return $this->container['title_name'];
    }

    /**
     * Sets title_name
     *
     * @param string $title_name Title Name
     *
     * @return $this
     */
    public function setTitleName($title_name)
    {
        $this->container['title_name'] = $title_name;

        return $this;
    }

    /**
     * Gets pub_type
     *
     * @return string
     */
    public function getPubType()
    {
        return $this->container['pub_type'];
    }

    /**
     * Sets pub_type
     *
     * @param string $pub_type Type of publication. Valid values are journal, newsletter, report, proceedings, website, newspaper, unspecified, book, bookseries, database, thesisdissertation, streamingaudio, streamingvideo, and audiobook.
     *
     * @return $this
     */
    public function setPubType($pub_type)
    {
        $this->container['pub_type'] = $pub_type;

        return $this;
    }

    /**
     * Gets publisher_name
     *
     * @return string
     */
    public function getPublisherName()
    {
        return $this->container['publisher_name'];
    }

    /**
     * Sets publisher_name
     *
     * @param string $publisher_name Publisher Name
     *
     * @return $this
     */
    public function setPublisherName($publisher_name)
    {
        $this->container['publisher_name'] = $publisher_name;

        return $this;
    }

    /**
     * Gets is_peer_reviewed
     *
     * @return bool
     */
    public function getIsPeerReviewed()
    {
        return $this->container['is_peer_reviewed'];
    }

    /**
     * Sets is_peer_reviewed
     *
     * @param bool $is_peer_reviewed Field to indicate if title is peer reviewed.
     *
     * @return $this
     */
    public function setIsPeerReviewed($is_peer_reviewed)
    {
        $this->container['is_peer_reviewed'] = $is_peer_reviewed;

        return $this;
    }

    /**
     * Gets edition
     *
     * @return string
     */
    public function getEdition()
    {
        return $this->container['edition'];
    }

    /**
     * Sets edition
     *
     * @param string $edition Title Edition
     *
     * @return $this
     */
    public function setEdition($edition)
    {
        $this->container['edition'] = $edition;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string $description Description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->container['url'];
    }

    /**
     * Sets url
     *
     * @param string $url URL
     *
     * @return $this
     */
    public function setUrl($url)
    {
        $this->container['url'] = $url;

        return $this;
    }

    /**
     * Gets custom_coverage_list
     *
     * @return \Swagger\Client\Model\CoverageDates[]
     */
    public function getCustomCoverageList()
    {
        return $this->container['custom_coverage_list'];
    }

    /**
     * Sets custom_coverage_list
     *
     * @param \Swagger\Client\Model\CoverageDates[] $custom_coverage_list Custom Coverage List
     *
     * @return $this
     */
    public function setCustomCoverageList($custom_coverage_list)
    {
        $this->container['custom_coverage_list'] = $custom_coverage_list;

        return $this;
    }

    /**
     * Gets is_hidden
     *
     * @return bool
     */
    public function getIsHidden()
    {
        return $this->container['is_hidden'];
    }

    /**
     * Sets is_hidden
     *
     * @param bool $is_hidden Field to indicate if title is hidden.
     *
     * @return $this
     */
    public function setIsHidden($is_hidden)
    {
        $this->container['is_hidden'] = $is_hidden;

        return $this;
    }

    /**
     * Gets coverage_statement
     *
     * @return string
     */
    public function getCoverageStatement()
    {
        return $this->container['coverage_statement'];
    }

    /**
     * Sets coverage_statement
     *
     * @param string $coverage_statement Coverage Statement
     *
     * @return $this
     */
    public function setCoverageStatement($coverage_statement)
    {
        $this->container['coverage_statement'] = $coverage_statement;

        return $this;
    }

    /**
     * Gets custom_embargo_period
     *
     * @return \Swagger\Client\Model\EmbargoPeriod
     */
    public function getCustomEmbargoPeriod()
    {
        return $this->container['custom_embargo_period'];
    }

    /**
     * Sets custom_embargo_period
     *
     * @param \Swagger\Client\Model\EmbargoPeriod $custom_embargo_period custom_embargo_period
     *
     * @return $this
     */
    public function setCustomEmbargoPeriod($custom_embargo_period)
    {
        $this->container['custom_embargo_period'] = $custom_embargo_period;

        return $this;
    }

    /**
     * Gets user_defined_field1
     *
     * @return string
     */
    public function getUserDefinedField1()
    {
        return $this->container['user_defined_field1'];
    }

    /**
     * Sets user_defined_field1
     *
     * @param string $user_defined_field1 User Defined Field 1
     *
     * @return $this
     */
    public function setUserDefinedField1($user_defined_field1)
    {
        $this->container['user_defined_field1'] = $user_defined_field1;

        return $this;
    }

    /**
     * Gets user_defined_field2
     *
     * @return string
     */
    public function getUserDefinedField2()
    {
        return $this->container['user_defined_field2'];
    }

    /**
     * Sets user_defined_field2
     *
     * @param string $user_defined_field2 User Defined Field 2
     *
     * @return $this
     */
    public function setUserDefinedField2($user_defined_field2)
    {
        $this->container['user_defined_field2'] = $user_defined_field2;

        return $this;
    }

    /**
     * Gets user_defined_field3
     *
     * @return string
     */
    public function getUserDefinedField3()
    {
        return $this->container['user_defined_field3'];
    }

    /**
     * Sets user_defined_field3
     *
     * @param string $user_defined_field3 User Defined Field 3
     *
     * @return $this
     */
    public function setUserDefinedField3($user_defined_field3)
    {
        $this->container['user_defined_field3'] = $user_defined_field3;

        return $this;
    }

    /**
     * Gets user_defined_field4
     *
     * @return string
     */
    public function getUserDefinedField4()
    {
        return $this->container['user_defined_field4'];
    }

    /**
     * Sets user_defined_field4
     *
     * @param string $user_defined_field4 User Defined Field 4
     *
     * @return $this
     */
    public function setUserDefinedField4($user_defined_field4)
    {
        $this->container['user_defined_field4'] = $user_defined_field4;

        return $this;
    }

    /**
     * Gets user_defined_field5
     *
     * @return string
     */
    public function getUserDefinedField5()
    {
        return $this->container['user_defined_field5'];
    }

    /**
     * Sets user_defined_field5
     *
     * @param string $user_defined_field5 User Defined Field 5
     *
     * @return $this
     */
    public function setUserDefinedField5($user_defined_field5)
    {
        $this->container['user_defined_field5'] = $user_defined_field5;

        return $this;
    }

    /**
     * Gets proxy
     *
     * @return \Swagger\Client\Model\ProxyInfo
     */
    public function getProxy()
    {
        return $this->container['proxy'];
    }

    /**
     * Sets proxy
     *
     * @param \Swagger\Client\Model\ProxyInfo $proxy proxy
     *
     * @return $this
     */
    public function setProxy($proxy)
    {
        $this->container['proxy'] = $proxy;

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
