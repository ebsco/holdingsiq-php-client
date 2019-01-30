# Swagger\Client\LabelAndProxyResourcesApi

All URIs are relative to *https://sandbox.ebsco.io/rm/rmaccounts*

Method | HTTP request | Description
------------- | ------------- | -------------
[**custidGet**](LabelAndProxyResourcesApi.md#custidGet) | **GET** /{custid}/ | 
[**custidProxiesGet**](LabelAndProxyResourcesApi.md#custidProxiesGet) | **GET** /{custid}/proxies | 
[**custidPut**](LabelAndProxyResourcesApi.md#custidPut) | **PUT** /{custid}/ | 

# **custidGet**
> \Swagger\Client\Model\CustomLabelsProxy custidGet($custid, $x_api_key)



This operation allows you to retrieve the list of all custom field labels and the root proxy.    **Please Note:**  The last forward slash in the url for this resource is only needed when using the sandbox.  Do not use the last forward slash in the url for the live api.  Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\LabelAndProxyResourcesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$custid = "custid_example"; // string | EBSCO Customer ID
$x_api_key = "x_api_key_example"; // string | Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.

try {
    $result = $apiInstance->custidGet($custid, $x_api_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LabelAndProxyResourcesApi->custidGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **custid** | [**string**](../Model/.md)| EBSCO Customer ID |
 **x_api_key** | [**string**](../Model/.md)| Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support. |

### Return type

[**\Swagger\Client\Model\CustomLabelsProxy**](../Model/CustomLabelsProxy.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **custidProxiesGet**
> \Swagger\Client\Model\ProxyList custidProxiesGet($custid, $x_api_key)



This operation allows you to retrieve the list of all available customer proxies.    **Please Note:**  Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\LabelAndProxyResourcesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$custid = "custid_example"; // string | EBSCO Customer ID
$x_api_key = "x_api_key_example"; // string | Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.

try {
    $result = $apiInstance->custidProxiesGet($custid, $x_api_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LabelAndProxyResourcesApi->custidProxiesGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **custid** | [**string**](../Model/.md)| EBSCO Customer ID |
 **x_api_key** | [**string**](../Model/.md)| Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support. |

### Return type

[**\Swagger\Client\Model\ProxyList**](../Model/ProxyList.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **custidPut**
> custidPut($custid, $x_api_key, $body)



This operation allows you to create and label up to five custom fields for your Title Details. Specify the field label ID, Display Label Name and indicate whether you’d like the information to display on Publication Finder and/or Full Text Finder. Once the Custom Label field(s) have been created, one can verify it in  Title Details REST end point. Setting the displayLabel to empty string, automatically sets displayOnFullTextFinder and/or displayOnPublicationFinder to false. Not specifying the Custom labels details  for a given custom label ID in the payload will result in setting displayLabel to empty string.    **Please Note:** The last forward slash in the url for this resource is only needed when using the sandbox.  Do not use the last forward slash in the url for the live api.  Only use one bodyoption below when trying this operation.  If more than one bodyoption is used, the Swagger UI will use the last one in the list for the PUT.  Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\LabelAndProxyResourcesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$custid = "custid_example"; // string | EBSCO Customer ID
$x_api_key = "x_api_key_example"; // string | Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support.
$body = new \Swagger\Client\Model\CustomLabels(); // \Swagger\Client\Model\CustomLabels | JSON payload to update custom labels and proxy.

try {
    $apiInstance->custidPut($custid, $x_api_key, $body);
} catch (Exception $e) {
    echo 'Exception when calling LabelAndProxyResourcesApi->custidPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **custid** | [**string**](../Model/.md)| EBSCO Customer ID |
 **x_api_key** | [**string**](../Model/.md)| Unique code assigned by EBSCO to grant you access to this API.  The API key needs to be a header parameter for every operation in order to access this API. Your production API key will not grant you access to the API through the interactive documentation. You will need a sandbox API key to use the interactive documentation.  If you require a sandbox API key, please contact EBSCO customer support. |
 **body** | [**\Swagger\Client\Model\CustomLabels**](../Model/CustomLabels.md)| JSON payload to update custom labels and proxy. | [optional]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

