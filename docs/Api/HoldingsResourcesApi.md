# Swagger\Client\HoldingsResourcesApi

All URIs are relative to *https://sandbox.ebsco.io/rm/rmaccounts*

Method | HTTP request | Description
------------- | ------------- | -------------
[**custidHoldingsGet**](HoldingsResourcesApi.md#custidHoldingsGet) | **GET** /{custid}/holdings | 
[**custidHoldingsPost**](HoldingsResourcesApi.md#custidHoldingsPost) | **POST** /{custid}/holdings | 
[**custidHoldingsStatusGet**](HoldingsResourcesApi.md#custidHoldingsStatusGet) | **GET** /{custid}/holdings/status | 

# **custidHoldingsGet**
> \Swagger\Client\Model\HoldingsDetails custidHoldingsGet($custid, $format, $count, $offset, $x_api_key)



This operation allows you to download customer holdings in KBART2 (JSON) format.  Before using this resource, you need to perform a Holdings Resource POST to populate holdings data to a staging area.      **Please Note:**  Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\HoldingsResourcesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$custid = "custid_example"; // string | EBSCO Customer ID
$format = "format_example"; // string | Download format.
$count = 56; // int | The maximum number of results to return in the response. Count can not exceed 5000.
$offset = 56; // int | Page Offset
$x_api_key = "x_api_key_example"; // string | Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.

try {
    $result = $apiInstance->custidHoldingsGet($custid, $format, $count, $offset, $x_api_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HoldingsResourcesApi->custidHoldingsGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **custid** | [**string**](../Model/.md)| EBSCO Customer ID |
 **format** | [**string**](../Model/.md)| Download format. |
 **count** | [**int**](../Model/.md)| The maximum number of results to return in the response. Count can not exceed 5000. |
 **offset** | [**int**](../Model/.md)| Page Offset |
 **x_api_key** | [**string**](../Model/.md)| Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support. |

### Return type

[**\Swagger\Client\Model\HoldingsDetails**](../Model/HoldingsDetails.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../temp/SwaggerClient-php/README.md)

# **custidHoldingsPost**
> custidHoldingsPost($custid, $x_api_key, $force)



This operation populates holdings data to a staging area.  You must perform this operation before using the GET holdings resources.  Customer holdings will be refreshed each time a POST is complete.  Hidden titles and packages are excluded from the holdings download.  If the customer has made changes since the last POST, another POST needs to be performed before using a GET holdings resource in order to download all of the changes.  If any metadata has changed since the last POST, you do not need to perform another POST in order to see the metadata changes in the GET holdings.      **Please Note:**  Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\HoldingsResourcesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$custid = "custid_example"; // string | EBSCO Customer ID
$x_api_key = "x_api_key_example"; // string | Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API.  Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.
$force = True; // bool | force is used to force a new request.  force is an optional parameter and defaults to false if not provided.  Set force to true to recreate the holdings snapshot by overwriting the existing snapshot.  force parameter should not be used on a regular basis.  force is only to be used for resolving a stuck POST holdings request.

try {
    $apiInstance->custidHoldingsPost($custid, $x_api_key, $force);
} catch (Exception $e) {
    echo 'Exception when calling HoldingsResourcesApi->custidHoldingsPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **custid** | [**string**](../Model/.md)| EBSCO Customer ID |
 **x_api_key** | [**string**](../Model/.md)| Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API.  Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support. |
 **force** | [**bool**](../Model/.md)| force is used to force a new request.  force is an optional parameter and defaults to false if not provided.  Set force to true to recreate the holdings snapshot by overwriting the existing snapshot.  force parameter should not be used on a regular basis.  force is only to be used for resolving a stuck POST holdings request. | [optional]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../temp/SwaggerClient-php/README.md)

# **custidHoldingsStatusGet**
> \Swagger\Client\Model\HoldingsStatus custidHoldingsStatusGet($custid, $x_api_key)



This operation allows you to retrieve the status of a holdings snapshot.  The response reveals if the holdings snapshot is in progress, completed or has failed.  The status enables you to decide when to download customer holdings (upon completion).      **Please Note:**  Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\HoldingsResourcesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$custid = "custid_example"; // string | EBSCO Customer ID
$x_api_key = "x_api_key_example"; // string | Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.

try {
    $result = $apiInstance->custidHoldingsStatusGet($custid, $x_api_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HoldingsResourcesApi->custidHoldingsStatusGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **custid** | [**string**](../Model/.md)| EBSCO Customer ID |
 **x_api_key** | [**string**](../Model/.md)| Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support. |

### Return type

[**\Swagger\Client\Model\HoldingsStatus**](../Model/HoldingsStatus.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../temp/SwaggerClient-php/README.md)

