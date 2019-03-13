<?php

require_once '../../../vendor/autoload.php';
require_once '../../../lib/Api/PackageResourcesApi.php';

$apiInstance = new Swagger\Client\Api\PackageResourcesApi(new GuzzleHttp\Client());
$body = new \Swagger\Client\Model\SetCustomPackagePayload();
$coverageDates = new \Swagger\Client\Model\CoverageDates();

// ebsco holdingsIQ credentials
$ebsco = parse_ini_file('../../ebsco.ini');
$custid = $ebsco['hiq_custid'];
$x_api_key = $ebsco['hiq_key'];

$packageid = $_REQUEST['packageId'];
$vendorid = $_REQUEST['vendorId'];

// set is selected
$body->setIsSelected(true);

try {
    $apiInstance->custidVendorsVendoridPackagesPackageidPut($custid, $vendorid, $packageid, $x_api_key, $body);
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');
    echo "{ \"message\": \"Package updated.\", \"packageId\": " . $packageid . ", \"vendorId\": " . $vendorid  . " }";
} catch (Exception $e) {
    echo 'Exception when calling PackageResourcesApi->custidVendorsVendoridPackagesPackageidPut: ', $e->getMessage(), PHP_EOL;
}
