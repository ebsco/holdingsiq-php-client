<?php

require_once '../../../vendor/autoload.php';
require_once '../../../lib/Api/PackageResourcesApi.php';

$apiInstance = new Swagger\Client\Api\PackageResourcesApi(new GuzzleHttp\Client());
$body = new \Swagger\Client\Model\CustomPackagePayload();

// ebsco holdingsIQ credentials
$ebsco = parse_ini_file('../../ebsco.ini');
$custid = $ebsco['hiq_custid'];
$vendorid = $ebsco['hiq_vendorid'];
$x_api_key = $ebsco['hiq_key'];

// create body from params
// todo: add coverage dates
$packageName = $_REQUEST['name'];
$contentType = $_REQUEST['contentType'];
$body->setPackageName($packageName);
$body->setContentType($contentType);

try {
    $result = $apiInstance->custidVendorsVendoridPackagesPost($custid, $vendorid, $x_api_key, $body);
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');
    $packageId = $result->getPackageId();
    echo "{ \"packageId\": " . $packageId . ", \"vendorId\": " . $vendorid  . " }";
} catch (Exception $e) {
    echo 'Exception when calling PackageResourcesApi->custidVendorsVendoridPackagesPost: ', $e->getMessage(), PHP_EOL;
}
