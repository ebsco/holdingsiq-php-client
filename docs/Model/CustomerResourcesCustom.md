# CustomerResourcesCustom

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**title_id** | **int** | Title ID | [optional] 
**package_id** | **int** | EBSCO KB&#x27;s unique identifier for the package.  In EPKB, this is &#x27;PkgID&#x27;. | 
**package_name** | **string** | Name of the Package. In EPKB, this is &#x27;PkgName&#x27;. | 
**package_type** | **string** | Package Type. Valid values are Selectable, Complete, Variable and Custom. | 
**proxy** | [**\Swagger\Client\Model\ProxyInfo**](ProxyInfo.md) |  | 
**is_package_custom** | **bool** | Is the Package Custom. | [optional] 
**vendor_id** | **int** | EBSCO KB&#x27;s unique identifier for the provider.  In EPKB, this is &#x27;VendorID&#x27;. | [optional] 
**vendor_name** | **string** | Provider name.  In EPKB, this is the &#x27;VendorName&#x27;. | [optional] 
**location_id** | **int** | Location ID | [optional] 
**is_selected** | **bool** | Indicates if selected in a customer&#x27;s account. | [optional] 
**is_token_needed** | **bool** | Field to indicate if a token is needed | [optional] 
**visibility_data** | [**\Swagger\Client\Model\VisibilityInfo**](VisibilityInfo.md) |  | [optional] 
**managed_coverage_list** | [**\Swagger\Client\Model\NItem[]**](NItem.md) | Custom Coverage List | [optional] 
**custom_coverage_list** | [**\Swagger\Client\Model\CoverageDates[]**](CoverageDates.md) | Custom Coverage List | [optional] 
**coverage_statement** | **string** | Coverage Statement | [optional] 
**managed_embargo_period** | **object** | Null Managed Embargo Period | [optional] 
**custom_embargo_period** | [**\Swagger\Client\Model\EmbargoPeriod**](EmbargoPeriod.md) |  | [optional] 
**url** | **string** | Package URL | [optional] 
**user_defined_field1** | **string** | User Defined Field 1 | [optional] 
**user_defined_field2** | **string** | User Defined Field 2 | [optional] 
**user_defined_field3** | **string** | User Defined Field 3 | [optional] 
**user_defined_field4** | **string** | User Defined Field 4 | [optional] 
**user_defined_field5** | **string** | User Defined Field 5 | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)

