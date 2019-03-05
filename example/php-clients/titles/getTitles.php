<?php

require_once '../../../vendor/autoload.php';
require_once '../../../lib/Api/TitleResourcesApi.php';

$apiInstance = new Swagger\Client\Api\TitleResourcesApi( new GuzzleHttp\Client());

// params
$search = (isset($_REQUEST['q'])) ? $_REQUEST['q'] : null;
$searchfield = (isset($_REQUEST['searchfield'])) ? $_REQUEST['searchfield'] : "titlename";
$searchtype = (isset($_REQUEST['searchtype'])) ? $_REQUEST['searchtype'] : "any";
$orderby = (isset($_REQUEST['orderby'])) ? $_REQUEST['orderby'] : "relevance";
$count = (isset($_REQUEST['count'])) ? $_REQUEST['count'] : 100;
$offset = (isset($_REQUEST['offset'])) ? $_REQUEST['offset'] : 1;
$selection = (isset($_REQUEST['selection'])) ? $_REQUEST['selection'] : "all";
$resourcetype = (isset($_REQUEST['resourcetype'])) ? $_REQUEST['resourcetype'] : "all";

// ebsco holdingsIQ credentials
$ebsco = parse_ini_file('../../ebsco.ini');
$custid = $ebsco['hiq_custid'];
$x_api_key = $ebsco['hiq_key'];

try {
    $result = $apiInstance->custidTitlesGet($custid, $search, $searchfield, $orderby, $count, $offset, $x_api_key, $selection, $resourcetype, $searchtype);
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');
    echo $result;
} catch (Exception $e) {
    echo 'Exception when calling TitleResourcesApi->custidTitlesGet: ', $e->getMessage(), PHP_EOL;
}
?>