# EBSCO PHP wrapper for HoldingsIQ v4 API
The EBSCO HoldingsIQ service retrieves vendor, package and title related information in JSON format.  The information includes customer selected resources as reflected in the EBSCO Knowledge Base for both EBSCO managed and customer managed resources.

You can find the Service Reference at [https://developer.ebsco.com/reference/rmapi](https://developer.ebsco.com/reference/rmapi)

You can find interactive Swagger documentation at [https://developer.ebsco.com/interactive/holdingsiq](https://developer.ebsco.com/interactive/holdingsiq)

## Requirements

PHP 5.5 and later

## Installation & Usage

### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
{
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com/ebsco/holdingsiq-php-client.git"
    }
  ],
  "require": {
    "ebsco/holdingsiq-php-client": "*@dev"
  }
}
```

Then run `composer install`


## Tests

To run the unit tests:

```
composer install
./vendor/bin/phpunit
```

## Getting Started

Please follow the installation procedure and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\HoldingsResourcesApi( new GuzzleHttp\Client() );
$custid = "demo";
$format = "kbart2";
$count = 5;
$offset = 1;
$x_api_key = "your_key_goes_here";

try {
    $result = $apiInstance->custidHoldingsGet($custid, $format, $count, $offset, $x_api_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HoldingsResourcesApi->custidHoldingsGet: ', $e->getMessage(), PHP_EOL;
}
```

## Documentation for API Endpoints

All URIs are relative to *https://sandbox.ebsco.io/rm/rmaccounts*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*HoldingsResourcesApi* | [**custidHoldingsGet**](docs/Api/HoldingsResourcesApi.md#custidholdingsget) | **GET** /{custid}/holdings | 
*HoldingsResourcesApi* | [**custidHoldingsPost**](docs/Api/HoldingsResourcesApi.md#custidholdingspost) | **POST** /{custid}/holdings | 
*HoldingsResourcesApi* | [**custidHoldingsStatusGet**](docs/Api/HoldingsResourcesApi.md#custidholdingsstatusget) | **GET** /{custid}/holdings/status | 
*LabelAndProxyResourcesApi* | [**custidGet**](docs/Api/LabelAndProxyResourcesApi.md#custidget) | **GET** /{custid}/ | 
*LabelAndProxyResourcesApi* | [**custidProxiesGet**](docs/Api/LabelAndProxyResourcesApi.md#custidproxiesget) | **GET** /{custid}/proxies | 
*LabelAndProxyResourcesApi* | [**custidPut**](docs/Api/LabelAndProxyResourcesApi.md#custidput) | **PUT** /{custid}/ | 
*PackageResourcesApi* | [**custidPackagesGet**](docs/Api/PackageResourcesApi.md#custidpackagesget) | **GET** /{custid}/packages | 
*PackageResourcesApi* | [**custidVendorsVendoridPackagesPackageidGet**](docs/Api/PackageResourcesApi.md#custidvendorsvendoridpackagespackageidget) | **GET** /{custid}/vendors/{vendorid}/packages/{packageid} | 
*PackageResourcesApi* | [**custidVendorsVendoridPackagesPackageidPut**](docs/Api/PackageResourcesApi.md#custidvendorsvendoridpackagespackageidput) | **PUT** /{custid}/vendors/{vendorid}/packages/{packageid} | 
*PackageResourcesApi* | [**custidVendorsVendoridPackagesPackageidTitlesGet**](docs/Api/PackageResourcesApi.md#custidvendorsvendoridpackagespackageidtitlesget) | **GET** /{custid}/vendors/{vendorid}/packages/{packageid}/titles | 
*PackageResourcesApi* | [**custidVendorsVendoridPackagesPackageidTitlesKbidGet**](docs/Api/PackageResourcesApi.md#custidvendorsvendoridpackagespackageidtitleskbidget) | **GET** /{custid}/vendors/{vendorid}/packages/{packageid}/titles/{kbid} | 
*PackageResourcesApi* | [**custidVendorsVendoridPackagesPackageidTitlesKbidPut**](docs/Api/PackageResourcesApi.md#custidvendorsvendoridpackagespackageidtitleskbidput) | **PUT** /{custid}/vendors/{vendorid}/packages/{packageid}/titles/{kbid} | 
*PackageResourcesApi* | [**custidVendorsVendoridPackagesPost**](docs/Api/PackageResourcesApi.md#custidvendorsvendoridpackagespost) | **POST** /{custid}/vendors/{vendorid}/packages | 
*TitleResourcesApi* | [**custidTitlesGet**](docs/Api/TitleResourcesApi.md#custidtitlesget) | **GET** /{custid}/titles | 
*TitleResourcesApi* | [**custidTitlesKbidGet**](docs/Api/TitleResourcesApi.md#custidtitleskbidget) | **GET** /{custid}/titles/{kbid} | 
*TitleResourcesApi* | [**custidVendorsVendoridPackagesPackageidTitlesPost**](docs/Api/TitleResourcesApi.md#custidvendorsvendoridpackagespackageidtitlespost) | **POST** /{custid}/vendors/{vendorid}/packages/{packageid}/titles | 
*VendorResourcesApi* | [**custidVendorsGet**](docs/Api/VendorResourcesApi.md#custidvendorsget) | **GET** /{custid}/vendors | 
*VendorResourcesApi* | [**custidVendorsVendoridGet**](docs/Api/VendorResourcesApi.md#custidvendorsvendoridget) | **GET** /{custid}/vendors/{vendorid} | 
*VendorResourcesApi* | [**custidVendorsVendoridPackagesGet**](docs/Api/VendorResourcesApi.md#custidvendorsvendoridpackagesget) | **GET** /{custid}/vendors/{vendorid}/packages | 
*VendorResourcesApi* | [**custidVendorsVendoridPut**](docs/Api/VendorResourcesApi.md#custidvendorsvendoridput) | **PUT** /{custid}/vendors/{vendorid} | 

## Documentation For Models

 - [ContributorID](docs/Model/ContributorID.md)
 - [CoverageDates](docs/Model/CoverageDates.md)
 - [CustomLabels](docs/Model/CustomLabels.md)
 - [CustomLabelsProxy](docs/Model/CustomLabelsProxy.md)
 - [CustomPackagePayload](docs/Model/CustomPackagePayload.md)
 - [CustomPackageResponse](docs/Model/CustomPackageResponse.md)
 - [CustomTitlePayload](docs/Model/CustomTitlePayload.md)
 - [CustomTitleResponse](docs/Model/CustomTitleResponse.md)
 - [CustomTitleUpdatePayload](docs/Model/CustomTitleUpdatePayload.md)
 - [CustomerResources](docs/Model/CustomerResources.md)
 - [CustomerResourcesCustom](docs/Model/CustomerResourcesCustom.md)
 - [CustomerResourcesPackageId](docs/Model/CustomerResourcesPackageId.md)
 - [CustomerResourcesTitleROP](docs/Model/CustomerResourcesTitleROP.md)
 - [CustomerToken](docs/Model/CustomerToken.md)
 - [EmbargoPeriod](docs/Model/EmbargoPeriod.md)
 - [ErrorModel](docs/Model/ErrorModel.md)
 - [Errors](docs/Model/Errors.md)
 - [Holding](docs/Model/Holding.md)
 - [HoldingsDetails](docs/Model/HoldingsDetails.md)
 - [HoldingsStatus](docs/Model/HoldingsStatus.md)
 - [Identifier](docs/Model/Identifier.md)
 - [IdentifierCustom](docs/Model/IdentifierCustom.md)
 - [Label](docs/Model/Label.md)
 - [Labelid](docs/Model/Labelid.md)
 - [Model202error](docs/Model/Model202error.md)
 - [Model403error](docs/Model/Model403error.md)
 - [Model404error](docs/Model/Model404error.md)
 - [Model409error](docs/Model/Model409error.md)
 - [NItem](docs/Model/NItem.md)
 - [Package](docs/Model/Package.md)
 - [PackageIdDetails](docs/Model/PackageIdDetails.md)
 - [Packages](docs/Model/Packages.md)
 - [PackagesCombinedPayload](docs/Model/PackagesCombinedPayload.md)
 - [ProxyDetails](docs/Model/ProxyDetails.md)
 - [ProxyInfo](docs/Model/ProxyInfo.md)
 - [ProxyInfoIn](docs/Model/ProxyInfoIn.md)
 - [ProxyList](docs/Model/ProxyList.md)
 - [ProxyWithURL](docs/Model/ProxyWithURL.md)
 - [SelectPayload](docs/Model/SelectPayload.md)
 - [SetCustomCoverageExcludeHidePayload](docs/Model/SetCustomCoverageExcludeHidePayload.md)
 - [SetCustomCoverageIncludingHidePayload](docs/Model/SetCustomCoverageIncludingHidePayload.md)
 - [SetCustomCoveragePayload](docs/Model/SetCustomCoveragePayload.md)
 - [SetCustomPackagePayload](docs/Model/SetCustomPackagePayload.md)
 - [SetHidePayload](docs/Model/SetHidePayload.md)
 - [SetManagedPackagePayload](docs/Model/SetManagedPackagePayload.md)
 - [SetProxyInPayload](docs/Model/SetProxyInPayload.md)
 - [SetProxyPayload](docs/Model/SetProxyPayload.md)
 - [SetProxyTwoPayload](docs/Model/SetProxyTwoPayload.md)
 - [SetUserDefinedFieldsPayload](docs/Model/SetUserDefinedFieldsPayload.md)
 - [Subj](docs/Model/Subj.md)
 - [TitleCustom](docs/Model/TitleCustom.md)
 - [TitleManaged](docs/Model/TitleManaged.md)
 - [TitlePackageId](docs/Model/TitlePackageId.md)
 - [TitleROP](docs/Model/TitleROP.md)
 - [Titles](docs/Model/Titles.md)
 - [TitlesCombinedPayload](docs/Model/TitlesCombinedPayload.md)
 - [TitlesPackageId](docs/Model/TitlesPackageId.md)
 - [TokenDetails](docs/Model/TokenDetails.md)
 - [TokenInfo](docs/Model/TokenInfo.md)
 - [UnhidePackageTitlePayload](docs/Model/UnhidePackageTitlePayload.md)
 - [UnselectPayload](docs/Model/UnselectPayload.md)
 - [UpdatePackageInheritedProxyPayload](docs/Model/UpdatePackageInheritedProxyPayload.md)
 - [UpdatePackageNonInheritedProxyPayload](docs/Model/UpdatePackageNonInheritedProxyPayload.md)
 - [UpdatePackageProxyPayload](docs/Model/UpdatePackageProxyPayload.md)
 - [UpdateVendorInheritedProxyPayload](docs/Model/UpdateVendorInheritedProxyPayload.md)
 - [UpdateVendorNonInheritedProxyPayload](docs/Model/UpdateVendorNonInheritedProxyPayload.md)
 - [UpdateVendorProxyPayload](docs/Model/UpdateVendorProxyPayload.md)
 - [Vendor](docs/Model/Vendor.md)
 - [VendorDetails](docs/Model/VendorDetails.md)
 - [Vendors](docs/Model/Vendors.md)
 - [VisibilityInfo](docs/Model/VisibilityInfo.md)

## Documentation For Authorization

 All endpoints do not require authorization.


## Author


