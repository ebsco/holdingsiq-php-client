<?php

require_once '../../../vendor/autoload.php';
require_once '../../../lib/Api/PackageResourcesApi.php';

$apiInstance = new Swagger\Client\Api\PackageResourcesApi( new GuzzleHttp\Client());

// params
$search = (isset($_REQUEST['q'])) ? $_REQUEST['q'] : null;
$orderby = (isset($_REQUEST['orderby'])) ? $_REQUEST['orderby'] : "relevance";
$count = (isset($_REQUEST['count'])) ? $_REQUEST['count'] : 100;
$offset = (isset($_REQUEST['offset'])) ? $_REQUEST['offset'] : 1;
$selection = (isset($_REQUEST['selection'])) ? $_REQUEST['selection'] : "all";
$contenttype = (isset($_REQUEST['contenttype'])) ? $_REQUEST['contenttype'] : "all";

// ebsco holdingsIQ credentials
$ebsco = parse_ini_file('../../ebsco.ini');
$custid = $ebsco['hiq_custid'];
$x_api_key = $ebsco['hiq_key'];

try {
    $result = $apiInstance->custidPackagesGet($custid, $search, $orderby, $count, $offset, $x_api_key, $selection, $contenttype);
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');
    echo $result;
} catch (Exception $e) {
    echo 'Exception when calling PackageResourcesApi->custidPackagesGet: ', $e->getMessage(), PHP_EOL;
}
?>