<?php

require_once '../../../vendor/autoload.php';
require_once '../../../lib/Api/VendorResourcesApi.php';

$apiInstance = new Swagger\Client\Api\VendorResourcesApi( new GuzzleHttp\Client() );

// params
$search = (isset($_REQUEST['q'])) ? $_REQUEST['q'] : null;
$orderby = (isset($_REQUEST['orderby'])) ? $_REQUEST['orderby'] : "relevance";
$count = (isset($_REQUEST['count'])) ? $_REQUEST['count'] : 100;
$offset = (isset($_REQUEST['offset'])) ? $_REQUEST['offset'] : 1;

// ebsco holdingsIQ credentials
$ebsco = parse_ini_file('../../ebsco.ini');
$custid = $ebsco['hiq_custid'];
$x_api_key = $ebsco['hiq_key'];

try {
    $result = $apiInstance->custidVendorsGet($custid, $orderby, $count, $offset, $x_api_key, $search);
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');
    echo $result;
} catch (Exception $e) {
    echo 'Error calling VendorResourcesApi->custidVendorsGet: ', $e->getMessage(), PHP_EOL;
}
