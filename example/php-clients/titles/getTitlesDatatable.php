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
$selection = (isset($_REQUEST['selection'])) ? $_REQUEST['selection'] : "all";
$resourcetype = (isset($_REQUEST['resourcetype'])) ? $_REQUEST['resourcetype'] : "all";

// use datatables params if they exits
$count = 20;
if (isset($_REQUEST['length'])) {
    $count = $_REQUEST['length'];
} elseif (isset($_REQUEST['count'])) {
    $count = $_REQUEST['count'];
}
$offset = (isset($_REQUEST['start'])) ? $_REQUEST['start'] : 1;
if ($offset < 1) {
    $offset = 1;
} else {
    $offset = $offset/$count;
}


// ebsco holdingsIQ credentials
$ebsco = parse_ini_file('../../ebsco.ini');
$custid = $ebsco['hiq_custid'];
$x_api_key = $ebsco['hiq_key'];

try {
    $result = $apiInstance->custidTitlesGet($custid, $search, $searchfield, $orderby, $count, $offset, $x_api_key, $selection, $resourcetype, $searchtype);
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');

    $obj = json_decode($result);

    $datatables_json = '{ "data": [ ] }';

    $titles = [];
    foreach ($obj->titles as $key=>$value) {
        $index = $key+1;
        array_push($titles, "[\"<a onclick='hiq.getTitleDetails(" . $value->titleId . ");' style='cursor: pointer;'>" .$value->titleName . "</a>\", \"" . $value->pubType . "\", \"" . $value->publisherName . "\"]");
    }
    echo "{ \"recordsTotal\": ". $obj->totalResults . ", \"recordsFiltered\": " . $obj->totalResults . ", \"data\": [" . join(',', $titles) . "] }";


} catch (Exception $e) {
    echo 'Exception when calling TitleResourcesApi->custidTitlesGet: ', $e->getMessage(), PHP_EOL;
}
?>