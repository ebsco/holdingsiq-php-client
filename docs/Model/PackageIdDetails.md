# PackageIdDetails

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**package_id** | **int** | EBSCO KB&#x27;s unique identifier for the package.  In EPKB, this is &#x27;PkgID&#x27;. | 
**package_name** | **string** | Name of the Package. In EPKB, this is &#x27;PkgName&#x27;. | 
**vendor_id** | **int** | EBSCO KB&#x27;s unique identifier for the provider.  In EPKB, this is &#x27;VendorID&#x27;. | [optional] 
**vendor_name** | **string** | Provider name.  In EPKB, this is the &#x27;VendorName&#x27;. | [optional] 
**is_custom** | **bool** | IsCustom is true if a customer is the vendor.  The customer vendor is used for custom packages. | [optional] 
**title_count** | **int** | Numeric value indicating the title count of the package. | [optional] 
**is_selected** | **bool** | Indicates if the packages is selected in a customer&#x27;s account. | [optional] 
**selected_count** | **int** | Numeric value indicating the number of titles in packages selected in the customer account. | [optional] 
**content_type** | **string** | Indicates the content type of the package. | [optional] 
**visibility_data** | [**\Swagger\Client\Model\VisibilityInfo**](VisibilityInfo.md) |  | [optional] 
**custom_coverage** | [**\Swagger\Client\Model\CoverageDates**](CoverageDates.md) |  | [optional] 
**is_token_needed** | **bool** | Field to indicate if a token is needed | [optional] 
**allow_ebsco_to_add_titles** | **bool** | Indicates if EBSCO is allowed to add titles.  If the package type is custom, then allowEbscoToAddTitles will always be set to false. | [optional] 
**package_type** | **string** | Package Type. Valid values are Selectable, Complete, Variable and Custom. | [optional] 
**proxy** | [**\Swagger\Client\Model\ProxyInfoIn**](ProxyInfoIn.md) |  | [optional] 
**package_token** | [**\Swagger\Client\Model\TokenInfo**](TokenInfo.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)

