<?php

require_once '../../../vendor/autoload.php';
require_once '../../../lib/Api/TitleResourcesApi.php';

$apiInstance = new Swagger\Client\Api\PackageResourcesApi(new GuzzleHttp\Client());
$body = new \Swagger\Client\Model\SetProxyInPayload();

// ebsco holdingsIQ credentials
$ebsco = parse_ini_file('../../ebsco.ini');
$custid = $ebsco['hiq_custid'];
$vendorid = $ebsco['hiq_vendorid'];
$x_api_key = $ebsco['hiq_key'];

// required params
$packageid = $_REQUEST['packageId'];
$kbid = $_REQUEST['titleId'];
$titleName = $_REQUEST['titleName'];
$pubType = $_REQUEST['pubType'];

$body->setIsSelected(true);
$body->setTitleName($titleName);
$body->setPubType($pubType);

try {
    $apiInstance->custidVendorsVendoridPackagesPackageidTitlesKbidPut($vendorid, $packageid, $kbid, $custid, $x_api_key, $body);
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');
    echo '{"titleId": ' .  $kbid . '}';
} catch (Exception $e) {
    echo 'Exception when calling PackageResourcesApi->custidVendorsVendoridPackagesPackageidTitlesKbidPut: ',
    $e->getMessage(), PHP_EOL;
}
