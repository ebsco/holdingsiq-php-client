<?php

require_once '../../../vendor/autoload.php';
require_once '../../../lib/Api/VendorResourcesApi.php';

$apiInstance = new Swagger\Client\Api\VendorResourcesApi( new GuzzleHttp\Client() );
$vendorid = $_REQUEST['id'];

// ebsco holdingsIQ credentials
$ebsco = parse_ini_file('../../ebsco.ini');
$custid = $ebsco['hiq_custid'];
$x_api_key = $ebsco['hiq_key'];

try {
    $result = $apiInstance->custidVendorsVendoridGet($vendorid, $custid, $x_api_key);
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');
    echo $result;
} catch (Exception $e) {
    echo 'Error calling VendorResourcesApi->custidVendorsVendoridGet: ', $e->getMessage(), PHP_EOL;
}