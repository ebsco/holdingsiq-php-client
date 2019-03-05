<?php

require_once '../../../vendor/autoload.php';
require_once '../../../lib/Api/PackageResourcesApi.php';

$apiInstance = new Swagger\Client\Api\PackageResourcesApi( new GuzzleHttp\Client() );
$vendorid = $_REQUEST['vid'];
$packageid = $_REQUEST['pid'];
$orderby = "titlename";
$count = 100;
$offset = 1;
$selection = "all";
$contenttype = "all";
$search = "";
$searchfield = "titlename";
$resourcetype = "all";

// ebsco holdingsIQ credentials
$ebsco = parse_ini_file('../../ebsco.ini');
$custid = $ebsco['hiq_custid'];
$x_api_key = $ebsco['hiq_key'];

try {
    $result = $apiInstance->custidVendorsVendoridPackagesPackageidTitlesGet(
        $vendorid,
        $packageid,
        $custid,
        $searchfield,
        $orderby,
        $count,
        $offset,
        $x_api_key,
        $search,
        $selection,
        $resourcetype);
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');
    echo $result;
} catch (Exception $e) {
    echo 'Error calling PackageResourcesApi->custidVendorsVendoridPackagesPackageidTitlesGet: ', $e->getMessage(), PHP_EOL;
}