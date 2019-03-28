# Swagger\Client\VendorResourcesApi

All URIs are relative to *https://sandbox.ebsco.io/rm/rmaccounts*

Method | HTTP request | Description
------------- | ------------- | -------------
[**custidVendorsGet**](VendorResourcesApi.md#custidVendorsGet) | **GET** /{custid}/vendors | 
[**custidVendorsVendoridGet**](VendorResourcesApi.md#custidVendorsVendoridGet) | **GET** /{custid}/vendors/{vendorid} | 
[**custidVendorsVendoridPackagesGet**](VendorResourcesApi.md#custidVendorsVendoridPackagesGet) | **GET** /{custid}/vendors/{vendorid}/packages | 
[**custidVendorsVendoridPut**](VendorResourcesApi.md#custidVendorsVendoridPut) | **PUT** /{custid}/vendors/{vendorid} | 

# **custidVendorsGet**
> \Swagger\Client\Model\Vendors custidVendorsGet($custid, $orderby, $count, $offset, $x_api_key, $search)



This operation allows you to search EPKB by vendor.  It returns a list of vendors that includes customer context and the total number of results.  When searching for vendors without a search parameter, sort options will be by vendor name.  When the search parameter is not null, the default sort is by relevance.      **Please Note:**  Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\VendorResourcesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$custid = "custid_example"; // string | EBSCO Customer ID
$orderby = "orderby_example"; // string | Valid values are relevance and vendorname.  Default is relevance.
$count = 56; // int | The maximum number of results to return in the response.
$offset = 56; // int | Page Offset
$x_api_key = "x_api_key_example"; // string | Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.
$search = "search_example"; // string | Search Term - When searching for vendors without a search parameter, sort options will be by vendorname.  When the search parameter is not null, the default sort is by relevance.

try {
    $result = $apiInstance->custidVendorsGet($custid, $orderby, $count, $offset, $x_api_key, $search);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VendorResourcesApi->custidVendorsGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **custid** | [**string**](../Model/.md)| EBSCO Customer ID |
 **orderby** | [**string**](../Model/.md)| Valid values are relevance and vendorname.  Default is relevance. |
 **count** | [**int**](../Model/.md)| The maximum number of results to return in the response. |
 **offset** | [**int**](../Model/.md)| Page Offset |
 **x_api_key** | [**string**](../Model/.md)| Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support. |
 **search** | [**string**](../Model/.md)| Search Term - When searching for vendors without a search parameter, sort options will be by vendorname.  When the search parameter is not null, the default sort is by relevance. | [optional]

### Return type

[**\Swagger\Client\Model\Vendors**](../Model/Vendors.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../temp/SwaggerClient-php/README.md)

# **custidVendorsVendoridGet**
> \Swagger\Client\Model\VendorDetails custidVendorsVendoridGet($vendorid, $custid, $x_api_key)



This operation allows you to retrieve vendor details from EPKB for a specific vendor ID.      **Please Note:**  Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\VendorResourcesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$vendorid = 56; // int | Vendor ID
$custid = "custid_example"; // string | EBSCO Customer ID
$x_api_key = "x_api_key_example"; // string | Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.

try {
    $result = $apiInstance->custidVendorsVendoridGet($vendorid, $custid, $x_api_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VendorResourcesApi->custidVendorsVendoridGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **vendorid** | [**int**](../Model/.md)| Vendor ID |
 **custid** | [**string**](../Model/.md)| EBSCO Customer ID |
 **x_api_key** | [**string**](../Model/.md)| Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support. |

### Return type

[**\Swagger\Client\Model\VendorDetails**](../Model/VendorDetails.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../temp/SwaggerClient-php/README.md)

# **custidVendorsVendoridPackagesGet**
> \Swagger\Client\Model\Packages custidVendorsVendoridPackagesGet($vendorid, $custid, $orderby, $count, $offset, $x_api_key, $search, $selection, $contenttype)



This operation allows you to retrieve a list of packages from EPKB for a vendor including customer context.      **Please Note:**  Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\VendorResourcesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$vendorid = 56; // int | Vendor ID
$custid = "custid_example"; // string | EBSCO Customer ID
$orderby = "orderby_example"; // string | Valid values are relevance or packagename.  Default is relevance.
$count = 56; // int | The maximum number of results to return in the response.
$offset = 56; // int | Page Offset
$x_api_key = "x_api_key_example"; // string | Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API.  Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.
$search = "search_example"; // string | Keyword search applied to limit the package list results.  The search term is contained in the package name.  When searching for packages without a search parameter, the sort options will be by packagename.  When the search parameter is not null, then the default sort is by relevance.
$selection = "selection_example"; // string | Limits the result set.  Valid values are all, selected, notselected and orderedthroughebsco.  It is also valid to use 0 for all, 1 for selected, 2 for notselected, or 3 for ordered through EBSCO.  When you filter by all(0), the total results count takes selected and not selected into consideration.
$contenttype = "contenttype_example"; // string | Limit by type of package content.  Valid values are all, aggregatedfulltext, abstractandindex, ebook, ejournal, print, unknown and onlinereference.  It is also valid to use 0 for all, 1 for aggregated full text, 2 for abstract and index, 3 for ebook, 4 for ejournal, 5 for print, 6 for unknown or 7 for online reference.

try {
    $result = $apiInstance->custidVendorsVendoridPackagesGet($vendorid, $custid, $orderby, $count, $offset, $x_api_key, $search, $selection, $contenttype);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VendorResourcesApi->custidVendorsVendoridPackagesGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **vendorid** | [**int**](../Model/.md)| Vendor ID |
 **custid** | [**string**](../Model/.md)| EBSCO Customer ID |
 **orderby** | [**string**](../Model/.md)| Valid values are relevance or packagename.  Default is relevance. |
 **count** | [**int**](../Model/.md)| The maximum number of results to return in the response. |
 **offset** | [**int**](../Model/.md)| Page Offset |
 **x_api_key** | [**string**](../Model/.md)| Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API.  Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support. |
 **search** | [**string**](../Model/.md)| Keyword search applied to limit the package list results.  The search term is contained in the package name.  When searching for packages without a search parameter, the sort options will be by packagename.  When the search parameter is not null, then the default sort is by relevance. | [optional]
 **selection** | [**string**](../Model/.md)| Limits the result set.  Valid values are all, selected, notselected and orderedthroughebsco.  It is also valid to use 0 for all, 1 for selected, 2 for notselected, or 3 for ordered through EBSCO.  When you filter by all(0), the total results count takes selected and not selected into consideration. | [optional]
 **contenttype** | [**string**](../Model/.md)| Limit by type of package content.  Valid values are all, aggregatedfulltext, abstractandindex, ebook, ejournal, print, unknown and onlinereference.  It is also valid to use 0 for all, 1 for aggregated full text, 2 for abstract and index, 3 for ebook, 4 for ejournal, 5 for print, 6 for unknown or 7 for online reference. | [optional]

### Return type

[**\Swagger\Client\Model\Packages**](../Model/Packages.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../temp/SwaggerClient-php/README.md)

# **custidVendorsVendoridPut**
> custidVendorsVendoridPut($vendorid, $custid, $x_api_key, $body)



This operation allows you to update vendor proxy and token values for a specific vendor ID.  If a vendor does not have a token set up, the JSON payload should have an empty token with a proxy value.  A vendor with **inherited** set to true inherits its proxy from the root proxy.  So, a JSON payload with **inherited** set to true updates the vendor proxy with the root proxy if the root proxy is set.       **Please Note:** Only use one bodyoption below when trying this operation.  If more than one bodyoption is used, the Swagger UI will use the last one in the list for the PUT.  Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\VendorResourcesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$vendorid = 56; // int | Vendor ID
$custid = "custid_example"; // string | EBSCO Customer ID
$x_api_key = "x_api_key_example"; // string | Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.
$body = new \Swagger\Client\Model\UpdateVendorNonInheritedProxyPayload(); // \Swagger\Client\Model\UpdateVendorNonInheritedProxyPayload | JSON payload to update a vendor with a non-inherited proxy.

try {
    $apiInstance->custidVendorsVendoridPut($vendorid, $custid, $x_api_key, $body);
} catch (Exception $e) {
    echo 'Exception when calling VendorResourcesApi->custidVendorsVendoridPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **vendorid** | [**int**](../Model/.md)| Vendor ID |
 **custid** | [**string**](../Model/.md)| EBSCO Customer ID |
 **x_api_key** | [**string**](../Model/.md)| Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support. |
 **body** | [**\Swagger\Client\Model\UpdateVendorNonInheritedProxyPayload**](../Model/UpdateVendorNonInheritedProxyPayload.md)| JSON payload to update a vendor with a non-inherited proxy. | [optional]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../temp/SwaggerClient-php/README.md)

