# Swagger\Client\PackageResourcesApi

All URIs are relative to *https://sandbox.ebsco.io/rm/rmaccounts*

Method | HTTP request | Description
------------- | ------------- | -------------
[**custidPackagesGet**](PackageResourcesApi.md#custidPackagesGet) | **GET** /{custid}/packages | 
[**custidVendorsVendoridPackagesPackageidGet**](PackageResourcesApi.md#custidVendorsVendoridPackagesPackageidGet) | **GET** /{custid}/vendors/{vendorid}/packages/{packageid} | 
[**custidVendorsVendoridPackagesPackageidPut**](PackageResourcesApi.md#custidVendorsVendoridPackagesPackageidPut) | **PUT** /{custid}/vendors/{vendorid}/packages/{packageid} | 
[**custidVendorsVendoridPackagesPackageidTitlesGet**](PackageResourcesApi.md#custidVendorsVendoridPackagesPackageidTitlesGet) | **GET** /{custid}/vendors/{vendorid}/packages/{packageid}/titles | 
[**custidVendorsVendoridPackagesPackageidTitlesKbidGet**](PackageResourcesApi.md#custidVendorsVendoridPackagesPackageidTitlesKbidGet) | **GET** /{custid}/vendors/{vendorid}/packages/{packageid}/titles/{kbid} | 
[**custidVendorsVendoridPackagesPackageidTitlesKbidPut**](PackageResourcesApi.md#custidVendorsVendoridPackagesPackageidTitlesKbidPut) | **PUT** /{custid}/vendors/{vendorid}/packages/{packageid}/titles/{kbid} | 
[**custidVendorsVendoridPackagesPost**](PackageResourcesApi.md#custidVendorsVendoridPackagesPost) | **POST** /{custid}/vendors/{vendorid}/packages | 

# **custidPackagesGet**
> \Swagger\Client\Model\Packages custidPackagesGet($custid, $search, $orderby, $count, $offset, $x_api_key, $selection, $contenttype)



This operation allows you to search for packages and returns a list of packages from EPKB.  The list is not limited to a single vendor ID.  The response will reflect the context of the EBSCO customer ID included in the request.  When searching for packages without a search parameter, the sort options will be by package name.  When the search parameter is not null, then the default sort is by relevance.      **Please Note:**  Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\PackageResourcesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$custid = "custid_example"; // string | EBSCO Customer ID
$search = "search_example"; // string | Keyword search that is applied to limit the results to packages from the vendor that have the search term in the package name.
$orderby = "orderby_example"; // string | Valid values are packagename and relevance. Default is relevance.
$count = 56; // int | The maximum number of results to return in the response.
$offset = 56; // int | Page Offset
$x_api_key = "x_api_key_example"; // string | Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.
$selection = "selection_example"; // string | Limits the results.  Valid values are all, selected, notselected, and orderedthroughebsco.  It is also valid to use 0 for all, 1 for selected, 2 for not selected or 3 for ordered through EBSCO.  When you filter by all(0), the total results count takes selected and not selected into consideration.
$contenttype = "contenttype_example"; // string | Limits the results by type of package content.  Valid values are all, aggregatedfulltext, abstractandindex, ebook, ejournal, print, unknown and onlinereference.  It is also valid to use 0 for all, 1 for aggregated full text, 2 for abstract and index, 3 for ebook, 4 for ejournal, 5 for print, 6 for unknown or 7 for online reference.

try {
    $result = $apiInstance->custidPackagesGet($custid, $search, $orderby, $count, $offset, $x_api_key, $selection, $contenttype);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PackageResourcesApi->custidPackagesGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **custid** | [**string**](../Model/.md)| EBSCO Customer ID |
 **search** | [**string**](../Model/.md)| Keyword search that is applied to limit the results to packages from the vendor that have the search term in the package name. |
 **orderby** | [**string**](../Model/.md)| Valid values are packagename and relevance. Default is relevance. |
 **count** | [**int**](../Model/.md)| The maximum number of results to return in the response. |
 **offset** | [**int**](../Model/.md)| Page Offset |
 **x_api_key** | [**string**](../Model/.md)| Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support. |
 **selection** | [**string**](../Model/.md)| Limits the results.  Valid values are all, selected, notselected, and orderedthroughebsco.  It is also valid to use 0 for all, 1 for selected, 2 for not selected or 3 for ordered through EBSCO.  When you filter by all(0), the total results count takes selected and not selected into consideration. | [optional]
 **contenttype** | [**string**](../Model/.md)| Limits the results by type of package content.  Valid values are all, aggregatedfulltext, abstractandindex, ebook, ejournal, print, unknown and onlinereference.  It is also valid to use 0 for all, 1 for aggregated full text, 2 for abstract and index, 3 for ebook, 4 for ejournal, 5 for print, 6 for unknown or 7 for online reference. | [optional]

### Return type

[**\Swagger\Client\Model\Packages**](../Model/Packages.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **custidVendorsVendoridPackagesPackageidGet**
> \Swagger\Client\Model\PackageIdDetails custidVendorsVendoridPackagesPackageidGet($vendorid, $packageid, $custid, $x_api_key)



This operation allows you to retrieve EPKB information for a specific package.  It returns details in the context of a customer.      **Please Note:**  Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\PackageResourcesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$vendorid = 56; // int | Vendor ID
$packageid = 56; // int | Package ID
$custid = "custid_example"; // string | EBSCO Customer ID
$x_api_key = "x_api_key_example"; // string | Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.

try {
    $result = $apiInstance->custidVendorsVendoridPackagesPackageidGet($vendorid, $packageid, $custid, $x_api_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PackageResourcesApi->custidVendorsVendoridPackagesPackageidGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **vendorid** | [**int**](../Model/.md)| Vendor ID |
 **packageid** | [**int**](../Model/.md)| Package ID |
 **custid** | [**string**](../Model/.md)| EBSCO Customer ID |
 **x_api_key** | [**string**](../Model/.md)| Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support. |

### Return type

[**\Swagger\Client\Model\PackageIdDetails**](../Model/PackageIdDetails.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **custidVendorsVendoridPackagesPackageidPut**
> custidVendorsVendoridPackagesPackageidPut($custid, $vendorid, $packageid, $x_api_key, $body)



This operation allows you to update selection and customizations to a package in a customer EPKB account.  A package with inherited set to true inherits its proxy from the root proxy. So, a JSON payload with inherited set to true updates the package proxy with the root proxy if the root proxy is set.  The isSelected payload element is mandatory for managed and custom packages. isSelected, packageName and contentType payload elements are mandatory for the custom package update payload. For both managed and custom packages, removing a package with isSelected set to false in the payload will result in a loss of customization made previously at the package level. Removing a custom package with isSelected set to false in the payload will result in the deletion (hard delete) of the custom package and all associated titles from this custom package.  If the payload contains ONLY isSelected set to true with no other customization fields, the system will remove all previously set customization.     **Please Note:**  Only use one bodyoption below when trying this operation.  If more than one bodyoption is used, the Swagger UI will use the last one in the list for the PUT.  Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\PackageResourcesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$custid = "custid_example"; // string | EBSCO Customer ID
$vendorid = 56; // int | Vendor ID
$packageid = 56; // int | Package ID
$x_api_key = "x_api_key_example"; // string | Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.
$body = new \Swagger\Client\Model\UpdatePackageNonInheritedProxyPayload(); // \Swagger\Client\Model\UpdatePackageNonInheritedProxyPayload | JSON payload to update a package with a proxy.

try {
    $apiInstance->custidVendorsVendoridPackagesPackageidPut($custid, $vendorid, $packageid, $x_api_key, $body);
} catch (Exception $e) {
    echo 'Exception when calling PackageResourcesApi->custidVendorsVendoridPackagesPackageidPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **custid** | [**string**](../Model/.md)| EBSCO Customer ID |
 **vendorid** | [**int**](../Model/.md)| Vendor ID |
 **packageid** | [**int**](../Model/.md)| Package ID |
 **x_api_key** | [**string**](../Model/.md)| Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support. |
 **body** | [**\Swagger\Client\Model\UpdatePackageNonInheritedProxyPayload**](../Model/UpdatePackageNonInheritedProxyPayload.md)| JSON payload to update a package with a proxy. | [optional]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **custidVendorsVendoridPackagesPackageidTitlesGet**
> \Swagger\Client\Model\TitlesPackageId custidVendorsVendoridPackagesPackageidTitlesGet($vendorid, $packageid, $custid, $searchfield, $orderby, $count, $offset, $x_api_key, $search, $selection, $resourcetype)



This operation allows you to search and retrieve a list of titles from EPKB that are part of a specified package.  The response will reflect the context of the EBSCO customer ID included in the request.  When searching for titles without a search parameter, the sort options will be by title name.  When the search parameter is not null, the default sort is by relevance.      **Please Note:**  Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\PackageResourcesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$vendorid = 56; // int | Vendor ID
$packageid = 56; // int | Package ID
$custid = "custid_example"; // string | EBSCO Customer ID
$searchfield = "searchfield_example"; // string | Field to search.  Valid values are titlename, publisher, isxn, and subject.  It is also valid to use 0 for title name, 1 for publisher, 2 for isxn or 3 for subject.
$orderby = "orderby_example"; // string | Valid values are relevance and titlename.  Default is relevance.
$count = 56; // int | The maximum number of results to return in the response.
$offset = 56; // int | Page Offset
$x_api_key = "x_api_key_example"; // string | Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.
$search = "search_example"; // string | Keyword search that is applied to limit the results to titles from the package that have the search term in the search field.  When searching for titles without a search parameter, the sort options will be by titlename. When the search parameter is not null, then the default sort is by relevance.
$selection = "selection_example"; // string | Limits the results.  Valid values are all, selected, notselected and orderedthroughebsco.  It is also valid to use 0 for all, 1 for selected, 2 for notselected, or 3 for ordered through EBSCO.  When you filter by all(0), the total results count takes selected and not selected into consideration.
$resourcetype = "resourcetype_example"; // string | Type of resource. Valid values are all, journal, newsletter, report, proceedings, website, newspaper, unspecified, book, bookseries, database, thesisdissertation, streamingaudio, streamingvideo, and audiobook.  It is also valid to use 0 for all, 1 for journal, 2 for newsletter, 3 for report, 4 for proceedings, 5 for website, 6 for newspaper, 7 for unspecified, 8 for book, 9 for book series, 10 for database, 11 for thesis dissertation, 12 for streaming audio, 13 for streaming video, or 14 for audio book.

try {
    $result = $apiInstance->custidVendorsVendoridPackagesPackageidTitlesGet($vendorid, $packageid, $custid, $searchfield, $orderby, $count, $offset, $x_api_key, $search, $selection, $resourcetype);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PackageResourcesApi->custidVendorsVendoridPackagesPackageidTitlesGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **vendorid** | [**int**](../Model/.md)| Vendor ID |
 **packageid** | [**int**](../Model/.md)| Package ID |
 **custid** | [**string**](../Model/.md)| EBSCO Customer ID |
 **searchfield** | [**string**](../Model/.md)| Field to search.  Valid values are titlename, publisher, isxn, and subject.  It is also valid to use 0 for title name, 1 for publisher, 2 for isxn or 3 for subject. |
 **orderby** | [**string**](../Model/.md)| Valid values are relevance and titlename.  Default is relevance. |
 **count** | [**int**](../Model/.md)| The maximum number of results to return in the response. |
 **offset** | [**int**](../Model/.md)| Page Offset |
 **x_api_key** | [**string**](../Model/.md)| Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support. |
 **search** | [**string**](../Model/.md)| Keyword search that is applied to limit the results to titles from the package that have the search term in the search field.  When searching for titles without a search parameter, the sort options will be by titlename. When the search parameter is not null, then the default sort is by relevance. | [optional]
 **selection** | [**string**](../Model/.md)| Limits the results.  Valid values are all, selected, notselected and orderedthroughebsco.  It is also valid to use 0 for all, 1 for selected, 2 for notselected, or 3 for ordered through EBSCO.  When you filter by all(0), the total results count takes selected and not selected into consideration. | [optional]
 **resourcetype** | [**string**](../Model/.md)| Type of resource. Valid values are all, journal, newsletter, report, proceedings, website, newspaper, unspecified, book, bookseries, database, thesisdissertation, streamingaudio, streamingvideo, and audiobook.  It is also valid to use 0 for all, 1 for journal, 2 for newsletter, 3 for report, 4 for proceedings, 5 for website, 6 for newspaper, 7 for unspecified, 8 for book, 9 for book series, 10 for database, 11 for thesis dissertation, 12 for streaming audio, 13 for streaming video, or 14 for audio book. | [optional]

### Return type

[**\Swagger\Client\Model\TitlesPackageId**](../Model/TitlesPackageId.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **custidVendorsVendoridPackagesPackageidTitlesKbidGet**
> \Swagger\Client\Model\TitleManaged custidVendorsVendoridPackagesPackageidTitlesKbidGet($vendorid, $packageid, $kbid, $custid, $x_api_key)



This operation allows you to retrieve details for a particular package-title from EPKB.      **Please Note:**  Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\PackageResourcesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$vendorid = 56; // int | Vendor ID
$packageid = 56; // int | Package ID
$kbid = 56; // int | Title ID
$custid = "custid_example"; // string | EBSCO Customer ID
$x_api_key = "x_api_key_example"; // string | Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.

try {
    $result = $apiInstance->custidVendorsVendoridPackagesPackageidTitlesKbidGet($vendorid, $packageid, $kbid, $custid, $x_api_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PackageResourcesApi->custidVendorsVendoridPackagesPackageidTitlesKbidGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **vendorid** | [**int**](../Model/.md)| Vendor ID |
 **packageid** | [**int**](../Model/.md)| Package ID |
 **kbid** | [**int**](../Model/.md)| Title ID |
 **custid** | [**string**](../Model/.md)| EBSCO Customer ID |
 **x_api_key** | [**string**](../Model/.md)| Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support. |

### Return type

[**\Swagger\Client\Model\TitleManaged**](../Model/TitleManaged.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **custidVendorsVendoridPackagesPackageidTitlesKbidPut**
> custidVendorsVendoridPackagesPackageidTitlesKbidPut($vendorid, $packageid, $kbid, $custid, $x_api_key, $body)



This operation allows you to update selection status, proxy value or coverage customizations for a title within a package in a customer EPKB account.  A title with **inherited** set to true inherits its proxy from the root proxy.  So, a JSON payload with **inherited** set to true updates the title proxy with the root proxy if the root proxy is set.  The isSelected payload element is mandatory for managed and custom titles.  The titleName and pubType payload elements are mandatory for the custom title update payload.  For both managed and custom titles, removing a title with isSelected set to false in the payload will result in a loss of customization made previously at the title level.  Removing a custom title with isSelected set to false in the payload will result in the deletion (hard delete) of the custom title from the custom package.  If the payload contains ONLY isSelected set to true with no other customization fields, the system will remove all previously set customization.     **Please Note:**  Only use one bodyoption below when trying this operation.  If more than one bodyoption is used, the Swagger UI will use the last one in the list for the PUT.  Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\PackageResourcesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$vendorid = 56; // int | Vendor ID
$packageid = 56; // int | Package ID
$kbid = 56; // int | Title ID
$custid = "custid_example"; // string | EBSCO Customer ID
$x_api_key = "x_api_key_example"; // string | Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.
$body = new \Swagger\Client\Model\SetProxyInPayload(); // \Swagger\Client\Model\SetProxyInPayload | JSON payload to update the inherited proxy value for a custom title.

try {
    $apiInstance->custidVendorsVendoridPackagesPackageidTitlesKbidPut($vendorid, $packageid, $kbid, $custid, $x_api_key, $body);
} catch (Exception $e) {
    echo 'Exception when calling PackageResourcesApi->custidVendorsVendoridPackagesPackageidTitlesKbidPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **vendorid** | [**int**](../Model/.md)| Vendor ID |
 **packageid** | [**int**](../Model/.md)| Package ID |
 **kbid** | [**int**](../Model/.md)| Title ID |
 **custid** | [**string**](../Model/.md)| EBSCO Customer ID |
 **x_api_key** | [**string**](../Model/.md)| Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support. |
 **body** | [**\Swagger\Client\Model\SetProxyInPayload**](../Model/SetProxyInPayload.md)| JSON payload to update the inherited proxy value for a custom title. | [optional]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **custidVendorsVendoridPackagesPost**
> \Swagger\Client\Model\CustomPackageResponse custidVendorsVendoridPackagesPost($custid, $vendorid, $x_api_key, $body)



This operation allows you to create custom packages.      **Please Note:**  Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\PackageResourcesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$custid = "custid_example"; // string | EBSCO Customer ID
$vendorid = 56; // int | Vendor ID
$x_api_key = "x_api_key_example"; // string | Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.
$body = new \Swagger\Client\Model\CustomPackagePayload(); // \Swagger\Client\Model\CustomPackagePayload | JSON POST payload.  Specify the packageName in the payload.  Set contentType in the payload to 1 for Agregated Full Text, 2 for Abstract and Index, 3 for Ebook, 4 for E-Journal, 5 for Print, 6 for Unknown or 7 for Online Reference.  Set the custom coverage dates.

try {
    $result = $apiInstance->custidVendorsVendoridPackagesPost($custid, $vendorid, $x_api_key, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PackageResourcesApi->custidVendorsVendoridPackagesPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **custid** | [**string**](../Model/.md)| EBSCO Customer ID |
 **vendorid** | [**int**](../Model/.md)| Vendor ID |
 **x_api_key** | [**string**](../Model/.md)| Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support. |
 **body** | [**\Swagger\Client\Model\CustomPackagePayload**](../Model/CustomPackagePayload.md)| JSON POST payload.  Specify the packageName in the payload.  Set contentType in the payload to 1 for Agregated Full Text, 2 for Abstract and Index, 3 for Ebook, 4 for E-Journal, 5 for Print, 6 for Unknown or 7 for Online Reference.  Set the custom coverage dates. | [optional]

### Return type

[**\Swagger\Client\Model\CustomPackageResponse**](../Model/CustomPackageResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

