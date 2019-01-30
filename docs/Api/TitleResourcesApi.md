# Swagger\Client\TitleResourcesApi

All URIs are relative to *https://sandbox.ebsco.io/rm/rmaccounts*

Method | HTTP request | Description
------------- | ------------- | -------------
[**custidTitlesGet**](TitleResourcesApi.md#custidTitlesGet) | **GET** /{custid}/titles | 
[**custidTitlesKbidGet**](TitleResourcesApi.md#custidTitlesKbidGet) | **GET** /{custid}/titles/{kbid} | 
[**custidVendorsVendoridPackagesPackageidTitlesPost**](TitleResourcesApi.md#custidVendorsVendoridPackagesPackageidTitlesPost) | **POST** /{custid}/vendors/{vendorid}/packages/{packageid}/titles | 

# **custidTitlesGet**
> \Swagger\Client\Model\Titles custidTitlesGet($custid, $search, $searchfield, $orderby, $count, $offset, $x_api_key, $selection, $resourcetype, $searchtype)



This operation allows you to search and retrieve a list of titles from EPKB regardless of the package(s) that the titles are a part of.  The response will reflect the context of the EBSCO customer ID included in the request.      **Please Note:**  Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\TitleResourcesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$custid = "custid_example"; // string | EBSCO Customer ID
$search = "search_example"; // string | Search Term.  Keyword search that is applied to limit the results to titles that have the search term in the search field.
$searchfield = "searchfield_example"; // string | Field to search.  Valid values are titlename, publisher, isxn, and subject.  It is also valid to use 0 for title name, 1 for publisher, 2 for isxn or 3 for subject.
$orderby = "orderby_example"; // string | Valid values are relevance or titlename.  Default is relevance.
$count = 56; // int | The maximum number of results to return in the response.
$offset = 56; // int | Page Offset
$x_api_key = "x_api_key_example"; // string | Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.
$selection = "selection_example"; // string | Limits the results.  Valid values are all, selected, notselected and orderedthroughebsco.  It is also valid to use 0 for all, 1 for selected, 2 for notselected, or 3 for ordered through EBSCO.  When you filter by all(0), the total results count takes selected and not selected into consideration.
$resourcetype = "resourcetype_example"; // string | Type of resource. Valid values are all, journal, newsletter, report, proceedings, website, newspaper, unspecified, book, bookseries, database, thesisdissertation, streamingaudio, streamingvideo, and audiobook.  It is also valid to use 0 for all, 1 for journal, 2 for newsletter, 3 for report, 4 for proceedings, 5 for website, 6 for newspaper, 7 for unspecified, 8 for book, 9 for book series, 10 for database, 11 for thesis dissertation, 12 for streaming audio, 13 for streaming video, or 14 for audio book.
$searchtype = "searchtype_example"; // string | Type of search. Search types are any, contains, exactmatch, beginswith, proximity, exactphrase and advanced. It is also valid to use 0 for any, 1 for contains, 2 for exactmatch, 3 for beginswith, 4 for proximity, 5 for exactphrase or 6 for advanced.  searchtype is an optional parameter and defaults to contains if not provided.  For more information on the search types, see [Using Search Types](https://developer.ebsco.com/guides/overviewsearch/)

try {
    $result = $apiInstance->custidTitlesGet($custid, $search, $searchfield, $orderby, $count, $offset, $x_api_key, $selection, $resourcetype, $searchtype);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TitleResourcesApi->custidTitlesGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **custid** | [**string**](../Model/.md)| EBSCO Customer ID |
 **search** | [**string**](../Model/.md)| Search Term.  Keyword search that is applied to limit the results to titles that have the search term in the search field. |
 **searchfield** | [**string**](../Model/.md)| Field to search.  Valid values are titlename, publisher, isxn, and subject.  It is also valid to use 0 for title name, 1 for publisher, 2 for isxn or 3 for subject. |
 **orderby** | [**string**](../Model/.md)| Valid values are relevance or titlename.  Default is relevance. |
 **count** | [**int**](../Model/.md)| The maximum number of results to return in the response. |
 **offset** | [**int**](../Model/.md)| Page Offset |
 **x_api_key** | [**string**](../Model/.md)| Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support. |
 **selection** | [**string**](../Model/.md)| Limits the results.  Valid values are all, selected, notselected and orderedthroughebsco.  It is also valid to use 0 for all, 1 for selected, 2 for notselected, or 3 for ordered through EBSCO.  When you filter by all(0), the total results count takes selected and not selected into consideration. | [optional]
 **resourcetype** | [**string**](../Model/.md)| Type of resource. Valid values are all, journal, newsletter, report, proceedings, website, newspaper, unspecified, book, bookseries, database, thesisdissertation, streamingaudio, streamingvideo, and audiobook.  It is also valid to use 0 for all, 1 for journal, 2 for newsletter, 3 for report, 4 for proceedings, 5 for website, 6 for newspaper, 7 for unspecified, 8 for book, 9 for book series, 10 for database, 11 for thesis dissertation, 12 for streaming audio, 13 for streaming video, or 14 for audio book. | [optional]
 **searchtype** | [**string**](../Model/.md)| Type of search. Search types are any, contains, exactmatch, beginswith, proximity, exactphrase and advanced. It is also valid to use 0 for any, 1 for contains, 2 for exactmatch, 3 for beginswith, 4 for proximity, 5 for exactphrase or 6 for advanced.  searchtype is an optional parameter and defaults to contains if not provided.  For more information on the search types, see [Using Search Types](https://developer.ebsco.com/guides/overviewsearch/) | [optional]

### Return type

[**\Swagger\Client\Model\Titles**](../Model/Titles.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **custidTitlesKbidGet**
> \Swagger\Client\Model\TitleManaged custidTitlesKbidGet($custid, $kbid, $x_api_key)



This operation allows you to retrieve details for a particular title from EPKB regardless of the package that it is a part of.      **Please Note:**  Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\TitleResourcesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$custid = "custid_example"; // string | EBSCO Customer ID
$kbid = 56; // int | Title ID
$x_api_key = "x_api_key_example"; // string | Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.

try {
    $result = $apiInstance->custidTitlesKbidGet($custid, $kbid, $x_api_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TitleResourcesApi->custidTitlesKbidGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **custid** | [**string**](../Model/.md)| EBSCO Customer ID |
 **kbid** | [**int**](../Model/.md)| Title ID |
 **x_api_key** | [**string**](../Model/.md)| Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support. |

### Return type

[**\Swagger\Client\Model\TitleManaged**](../Model/TitleManaged.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **custidVendorsVendoridPackagesPackageidTitlesPost**
> \Swagger\Client\Model\CustomTitleResponse custidVendorsVendoridPackagesPackageidTitlesPost($custid, $vendorid, $packageid, $x_api_key, $body)



This operation allows you to create custom titles.  The titleName and pubType elements are required in the custom title payload.      **Please Note:**  Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\TitleResourcesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$custid = "custid_example"; // string | EBSCO Customer ID
$vendorid = 56; // int | Vendor ID
$packageid = 56; // int | Package ID
$x_api_key = "x_api_key_example"; // string | Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.
$body = new \Swagger\Client\Model\CustomTitlePayload(); // \Swagger\Client\Model\CustomTitlePayload | JSON POST title details payload.  The titleName and pubType elements are required in the custom title payload.

try {
    $result = $apiInstance->custidVendorsVendoridPackagesPackageidTitlesPost($custid, $vendorid, $packageid, $x_api_key, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TitleResourcesApi->custidVendorsVendoridPackagesPackageidTitlesPost: ', $e->getMessage(), PHP_EOL;
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
 **body** | [**\Swagger\Client\Model\CustomTitlePayload**](../Model/CustomTitlePayload.md)| JSON POST title details payload.  The titleName and pubType elements are required in the custom title payload. | [optional]

### Return type

[**\Swagger\Client\Model\CustomTitleResponse**](../Model/CustomTitleResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

