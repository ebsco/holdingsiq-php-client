# VendorDetails

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**vendor_id** | **int** | EBSCO KB&#x27;s unique identifier for the provider.  In EPKB, this is &#x27;VendorID&#x27;. | 
**vendor_name** | **string** | Provider name.  In EPKB, this is the &#x27;VendorName&#x27;. | 
**packages_total** | **int** | Package total for this vendor. | [optional] 
**packages_selected** | **int** | Total number of packages from the vendor that are selected in the customer&#x27;s account. | [optional] 
**is_customer** | **bool** | IsCustomer is true if a customer is a vendor.  The customer vendor is used for custom packages. | [optional] 
**proxy** | [**\Swagger\Client\Model\ProxyInfo**](ProxyInfo.md) |  | [optional] 
**vendor_token** | [**\Swagger\Client\Model\TokenInfo**](TokenInfo.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)

