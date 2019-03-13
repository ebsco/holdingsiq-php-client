<?php

require_once '../../../vendor/autoload.php';
require_once '../../../lib/Api/PackageResourcesApi.php';

$apiInstance = new Swagger\Client\Api\PackageResourcesApi( new GuzzleHttp\Client());

// params
$search = (isset($_REQUEST['q'])) ? $_REQUEST['q'] : null;
$orderby = (isset($_REQUEST['orderby'])) ? $_REQUEST['orderby'] : "relevance";
$selection = (isset($_REQUEST['selection'])) ? $_REQUEST['selection'] : "all";
$contenttype = (isset($_REQUEST['contenttype'])) ? $_REQUEST['contenttype'] : "all";

// use datatables params (start & length) if they exits
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
    $offset = ($offset/$count) + 1;
}

// ebsco holdingsIQ credentials
$ebsco = parse_ini_file('../../ebsco.ini');
$custid = $ebsco['hiq_custid'];
$x_api_key = $ebsco['hiq_key'];

try {
    $result = $apiInstance->custidPackagesGet($custid, $search, $orderby, $count, $offset, $x_api_key, $selection, $contenttype);
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');

    $obj = json_decode($result);

    $datatables_json = '{ "data": [ ] }';

    $titles = [];
    foreach ($obj->packagesList as $key=>$value) {
        $index = $key+1;
        $selected_text ="No";
        if ($value->isSelected) { $selected_text = "Yes"; }
        array_push($titles, "[\"<a onclick='hiq.getPackageDetails(" . $value->vendorId . "," . $value->packageId . ");' style='cursor: pointer;'>" .$value->packageName . "</a>\", \"" . $value->vendorName . "\", \"" . $selected_text . "\"]");
    }
    echo "{ \"recordsTotal\": ". $obj->totalResults . ", \"recordsFiltered\": " . $obj->totalResults . ", \"data\": [" . join(',', $titles) . "] }";


} catch (Exception $e) {
    echo 'Exception when calling PackageResourcesApi->custidTitlesGet: ', $e->getMessage(), PHP_EOL;
}
?>