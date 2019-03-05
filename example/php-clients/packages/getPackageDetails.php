<?php

require_once '../../../vendor/autoload.php';
require_once '../../../lib/Api/PackageResourcesApi.php';

$apiInstance = new Swagger\Client\Api\PackageResourcesApi( new GuzzleHttp\Client() );
$vendorid = $_REQUEST['vid'];
$packageid = $_REQUEST['pid'];

// ebsco holdingsIQ credentials
$ebsco = parse_ini_file('../../ebsco.ini');
$custid = $ebsco['hiq_custid'];
$x_api_key = $ebsco['hiq_key'];

try {
    $result = $apiInstance->custidVendorsVendoridPackagesPackageidGet($vendorid, $packageid, $custid, $x_api_key);
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');
    echo $result;
} catch (Exception $e) {
    echo 'Error calling PackageResourcesApi->custidVendorsVendoridPackagesPackageidGet: ', $e->getMessage(), PHP_EOL;
}