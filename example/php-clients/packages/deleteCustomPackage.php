<?php

require_once '../../../vendor/autoload.php';
require_once '../../../lib/Api/PackageResourcesApi.php';

$apiInstance = new Swagger\Client\Api\PackageResourcesApi(new GuzzleHttp\Client());
$body = new \Swagger\Client\Model\UpdatePackageNonInheritedProxyPayload();

// ebsco holdingsIQ credentials
$ebsco = parse_ini_file('../../ebsco.ini');
$custid = $ebsco['hiq_custid'];
$vendorid = $ebsco['hiq_vendorid'];
$x_api_key = $ebsco['hiq_key'];

$packageid = $_REQUEST['packageId'];

$body->setIsSelected(false);

try {
    $apiInstance->custidVendorsVendoridPackagesPackageidPut($custid, $vendorid, $packageid, $x_api_key, $body);
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');
    echo '{ "message": "package deleted" }';
} catch (Exception $e) {
    echo 'Exception when calling PackageResourcesApi->custidVendorsVendoridPackagesPackageidPut: ', $e->getMessage(), PHP_EOL;
}
