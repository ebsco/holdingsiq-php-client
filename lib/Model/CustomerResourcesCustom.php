<?php
/**
 * CustomerResourcesCustom
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
 * CustomerResourcesCustom Class Doc Comment
 *
 * @category Class
 * @description This object represents data elements that describe customer resources information.
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class CustomerResourcesCustom implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'customerResourcesCustom';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'title_id' => 'int',
'package_id' => 'int',
'package_name' => 'string',
'package_type' => 'string',
'proxy' => '\Swagger\Client\Model\ProxyInfo',
'is_package_custom' => 'bool',
'vendor_id' => 'int',
'vendor_name' => 'string',
'location_id' => 'int',
'is_selected' => 'bool',
'is_token_needed' => 'bool',
'visibility_data' => '\Swagger\Client\Model\VisibilityInfo',
'managed_coverage_list' => '\Swagger\Client\Model\CoverageDates[]',
'custom_coverage_list' => '\Swagger\Client\Model\CoverageDates[]',
'coverage_statement' => 'string',
'managed_embargo_period' => 'object',
'custom_embargo_period' => '\Swagger\Client\Model\EmbargoPeriod',
'url' => 'string',
'user_defined_field1' => 'string',
'user_defined_field2' => 'string',
'user_defined_field3' => 'string',
'user_defined_field4' => 'string',
'user_defined_field5' => 'string'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'title_id' => null,
'package_id' => null,
'package_name' => null,
'package_type' => null,
'proxy' => null,
'is_package_custom' => null,
'vendor_id' => null,
'vendor_name' => null,
'location_id' => null,
'is_selected' => null,
'is_token_needed' => null,
'visibility_data' => null,
'managed_coverage_list' => null,
'custom_coverage_list' => null,
'coverage_statement' => null,
'managed_embargo_period' => null,
'custom_embargo_period' => null,
'url' => null,
'user_defined_field1' => null,
'user_defined_field2' => null,
'user_defined_field3' => null,
'user_defined_field4' => null,
'user_defined_field5' => null    ];

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
        'title_id' => 'titleId',
'package_id' => 'packageId',
'package_name' => 'packageName',
'package_type' => 'packageType',
'proxy' => 'proxy',
'is_package_custom' => 'isPackageCustom',
'vendor_id' => 'vendorId',
'vendor_name' => 'vendorName',
'location_id' => 'locationId',
'is_selected' => 'isSelected',
'is_token_needed' => 'isTokenNeeded',
'visibility_data' => 'visibilityData',
'managed_coverage_list' => 'managedCoverageList',
'custom_coverage_list' => 'customCoverageList',
'coverage_statement' => 'coverageStatement',
'managed_embargo_period' => 'managedEmbargoPeriod',
'custom_embargo_period' => 'customEmbargoPeriod',
'url' => 'url',
'user_defined_field1' => 'userDefinedField1',
'user_defined_field2' => 'userDefinedField2',
'user_defined_field3' => 'userDefinedField3',
'user_defined_field4' => 'userDefinedField4',
'user_defined_field5' => 'userDefinedField5'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'title_id' => 'setTitleId',
'package_id' => 'setPackageId',
'package_name' => 'setPackageName',
'package_type' => 'setPackageType',
'proxy' => 'setProxy',
'is_package_custom' => 'setIsPackageCustom',
'vendor_id' => 'setVendorId',
'vendor_name' => 'setVendorName',
'location_id' => 'setLocationId',
'is_selected' => 'setIsSelected',
'is_token_needed' => 'setIsTokenNeeded',
'visibility_data' => 'setVisibilityData',
'managed_coverage_list' => 'setManagedCoverageList',
'custom_coverage_list' => 'setCustomCoverageList',
'coverage_statement' => 'setCoverageStatement',
'managed_embargo_period' => 'setManagedEmbargoPeriod',
'custom_embargo_period' => 'setCustomEmbargoPeriod',
'url' => 'setUrl',
'user_defined_field1' => 'setUserDefinedField1',
'user_defined_field2' => 'setUserDefinedField2',
'user_defined_field3' => 'setUserDefinedField3',
'user_defined_field4' => 'setUserDefinedField4',
'user_defined_field5' => 'setUserDefinedField5'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'title_id' => 'getTitleId',
'package_id' => 'getPackageId',
'package_name' => 'getPackageName',
'package_type' => 'getPackageType',
'proxy' => 'getProxy',
'is_package_custom' => 'getIsPackageCustom',
'vendor_id' => 'getVendorId',
'vendor_name' => 'getVendorName',
'location_id' => 'getLocationId',
'is_selected' => 'getIsSelected',
'is_token_needed' => 'getIsTokenNeeded',
'visibility_data' => 'getVisibilityData',
'managed_coverage_list' => 'getManagedCoverageList',
'custom_coverage_list' => 'getCustomCoverageList',
'coverage_statement' => 'getCoverageStatement',
'managed_embargo_period' => 'getManagedEmbargoPeriod',
'custom_embargo_period' => 'getCustomEmbargoPeriod',
'url' => 'getUrl',
'user_defined_field1' => 'getUserDefinedField1',
'user_defined_field2' => 'getUserDefinedField2',
'user_defined_field3' => 'getUserDefinedField3',
'user_defined_field4' => 'getUserDefinedField4',
'user_defined_field5' => 'getUserDefinedField5'    ];

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
        $this->container['title_id'] = isset($data['title_id']) ? $data['title_id'] : null;
        $this->container['package_id'] = isset($data['package_id']) ? $data['package_id'] : null;
        $this->container['package_name'] = isset($data['package_name']) ? $data['package_name'] : null;
        $this->container['package_type'] = isset($data['package_type']) ? $data['package_type'] : null;
        $this->container['proxy'] = isset($data['proxy']) ? $data['proxy'] : null;
        $this->container['is_package_custom'] = isset($data['is_package_custom']) ? $data['is_package_custom'] : null;
        $this->container['vendor_id'] = isset($data['vendor_id']) ? $data['vendor_id'] : null;
        $this->container['vendor_name'] = isset($data['vendor_name']) ? $data['vendor_name'] : null;
        $this->container['location_id'] = isset($data['location_id']) ? $data['location_id'] : null;
        $this->container['is_selected'] = isset($data['is_selected']) ? $data['is_selected'] : null;
        $this->container['is_token_needed'] = isset($data['is_token_needed']) ? $data['is_token_needed'] : null;
        $this->container['visibility_data'] = isset($data['visibility_data']) ? $data['visibility_data'] : null;
        $this->container['managed_coverage_list'] = isset($data['managed_coverage_list']) ? $data['managed_coverage_list'] : null;
        $this->container['custom_coverage_list'] = isset($data['custom_coverage_list']) ? $data['custom_coverage_list'] : null;
        $this->container['coverage_statement'] = isset($data['coverage_statement']) ? $data['coverage_statement'] : null;
        $this->container['managed_embargo_period'] = isset($data['managed_embargo_period']) ? $data['managed_embargo_period'] : null;
        $this->container['custom_embargo_period'] = isset($data['custom_embargo_period']) ? $data['custom_embargo_period'] : null;
        $this->container['url'] = isset($data['url']) ? $data['url'] : null;
        $this->container['user_defined_field1'] = isset($data['user_defined_field1']) ? $data['user_defined_field1'] : null;
        $this->container['user_defined_field2'] = isset($data['user_defined_field2']) ? $data['user_defined_field2'] : null;
        $this->container['user_defined_field3'] = isset($data['user_defined_field3']) ? $data['user_defined_field3'] : null;
        $this->container['user_defined_field4'] = isset($data['user_defined_field4']) ? $data['user_defined_field4'] : null;
        $this->container['user_defined_field5'] = isset($data['user_defined_field5']) ? $data['user_defined_field5'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['package_id'] === null) {
            $invalidProperties[] = "'package_id' can't be null";
        }
        if ($this->container['package_name'] === null) {
            $invalidProperties[] = "'package_name' can't be null";
        }
        if ($this->container['package_type'] === null) {
            $invalidProperties[] = "'package_type' can't be null";
        }
        if ($this->container['proxy'] === null) {
            $invalidProperties[] = "'proxy' can't be null";
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

        if ($this->container['package_id'] === null) {
            return false;
        }
        if ($this->container['package_name'] === null) {
            return false;
        }
        if ($this->container['package_type'] === null) {
            return false;
        }
        if ($this->container['proxy'] === null) {
            return false;
        }
        return true;
    }


    /**
     * Gets title_id
     *
     * @return int
     */
    public function getTitleId()
    {
        return $this->container['title_id'];
    }

    /**
     * Sets title_id
     *
     * @param int $title_id Title ID
     *
     * @return $this
     */
    public function setTitleId($title_id)
    {
        $this->container['title_id'] = $title_id;

        return $this;
    }

    /**
     * Gets package_id
     *
     * @return int
     */
    public function getPackageId()
    {
        return $this->container['package_id'];
    }

    /**
     * Sets package_id
     *
     * @param int $package_id EBSCO KB's unique identifier for the package.  In EPKB, this is 'PkgID'.
     *
     * @return $this
     */
    public function setPackageId($package_id)
    {
        $this->container['package_id'] = $package_id;

        return $this;
    }

    /**
     * Gets package_name
     *
     * @return string
     */
    public function getPackageName()
    {
        return $this->container['package_name'];
    }

    /**
     * Sets package_name
     *
     * @param string $package_name Name of the Package. In EPKB, this is 'PkgName'.
     *
     * @return $this
     */
    public function setPackageName($package_name)
    {
        $this->container['package_name'] = $package_name;

        return $this;
    }

    /**
     * Gets package_type
     *
     * @return string
     */
    public function getPackageType()
    {
        return $this->container['package_type'];
    }

    /**
     * Sets package_type
     *
     * @param string $package_type Package Type. Valid values are Selectable, Complete, Variable and Custom.
     *
     * @return $this
     */
    public function setPackageType($package_type)
    {
        $this->container['package_type'] = $package_type;

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
     * Gets is_package_custom
     *
     * @return bool
     */
    public function getIsPackageCustom()
    {
        return $this->container['is_package_custom'];
    }

    /**
     * Sets is_package_custom
     *
     * @param bool $is_package_custom Is the Package Custom.
     *
     * @return $this
     */
    public function setIsPackageCustom($is_package_custom)
    {
        $this->container['is_package_custom'] = $is_package_custom;

        return $this;
    }

    /**
     * Gets vendor_id
     *
     * @return int
     */
    public function getVendorId()
    {
        return $this->container['vendor_id'];
    }

    /**
     * Sets vendor_id
     *
     * @param int $vendor_id EBSCO KB's unique identifier for the provider.  In EPKB, this is 'VendorID'.
     *
     * @return $this
     */
    public function setVendorId($vendor_id)
    {
        $this->container['vendor_id'] = $vendor_id;

        return $this;
    }

    /**
     * Gets vendor_name
     *
     * @return string
     */
    public function getVendorName()
    {
        return $this->container['vendor_name'];
    }

    /**
     * Sets vendor_name
     *
     * @param string $vendor_name Provider name.  In EPKB, this is the 'VendorName'.
     *
     * @return $this
     */
    public function setVendorName($vendor_name)
    {
        $this->container['vendor_name'] = $vendor_name;

        return $this;
    }

    /**
     * Gets location_id
     *
     * @return int
     */
    public function getLocationId()
    {
        return $this->container['location_id'];
    }

    /**
     * Sets location_id
     *
     * @param int $location_id Location ID
     *
     * @return $this
     */
    public function setLocationId($location_id)
    {
        $this->container['location_id'] = $location_id;

        return $this;
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
     * Gets is_token_needed
     *
     * @return bool
     */
    public function getIsTokenNeeded()
    {
        return $this->container['is_token_needed'];
    }

    /**
     * Sets is_token_needed
     *
     * @param bool $is_token_needed Field to indicate if a token is needed
     *
     * @return $this
     */
    public function setIsTokenNeeded($is_token_needed)
    {
        $this->container['is_token_needed'] = $is_token_needed;

        return $this;
    }

    /**
     * Gets visibility_data
     *
     * @return \Swagger\Client\Model\VisibilityInfo
     */
    public function getVisibilityData()
    {
        return $this->container['visibility_data'];
    }

    /**
     * Sets visibility_data
     *
     * @param \Swagger\Client\Model\VisibilityInfo $visibility_data visibility_data
     *
     * @return $this
     */
    public function setVisibilityData($visibility_data)
    {
        $this->container['visibility_data'] = $visibility_data;

        return $this;
    }

    /**
     * Gets managed_coverage_list
     *
     * @return \Swagger\Client\Model\CoverageDates[]
     */
    public function getManagedCoverageList()
    {
        return $this->container['managed_coverage_list'];
    }

    /**
     * Sets managed_coverage_list
     *
     * @param \Swagger\Client\Model\CoverageDates[] $managed_coverage_list Custom Coverage List
     *
     * @return $this
     */
    public function setManagedCoverageList($managed_coverage_list)
    {
        $this->container['managed_coverage_list'] = $managed_coverage_list;

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
     * Gets managed_embargo_period
     *
     * @return object
     */
    public function getManagedEmbargoPeriod()
    {
        return $this->container['managed_embargo_period'];
    }

    /**
     * Sets managed_embargo_period
     *
     * @param object $managed_embargo_period Null Managed Embargo Period
     *
     * @return $this
     */
    public function setManagedEmbargoPeriod($managed_embargo_period)
    {
        $this->container['managed_embargo_period'] = $managed_embargo_period;

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
     * @param string $url Package URL
     *
     * @return $this
     */
    public function setUrl($url)
    {
        $this->container['url'] = $url;

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
