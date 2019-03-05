<?php

require_once '../../../vendor/autoload.php';
require_once '../../../lib/Api/TitleResourcesApi.php';

$apiInstance = new Swagger\Client\Api\TitleResourcesApi( new GuzzleHttp\Client() );
$kbid = $_REQUEST['tid'];

// ebsco holdingsIQ credentials
$ebsco = parse_ini_file('../../ebsco.ini');
$custid = $ebsco['hiq_custid'];
$x_api_key = $ebsco['hiq_key'];

try {
    $result = $apiInstance->custidTitlesKbidGet($custid, $kbid, $x_api_key);
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');
    echo $result;
} catch (Exception $e) {
    // echo 'Error calling TitleResourcesApi->custidTitlesKbidGet: ', $e->getMessage(), PHP_EOL;
    echo "{\"error\": \"" . $e->getMessage() . "\"}";
}