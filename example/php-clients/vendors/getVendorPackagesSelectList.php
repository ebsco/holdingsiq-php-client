<?php

require_once '../../../vendor/autoload.php';
require_once '../../../lib/Api/VendorResourcesApi.php';

$apiInstance = new Swagger\Client\Api\VendorResourcesApi( new GuzzleHttp\Client() );
$orderby = "packageName";
$count = 100;
$offset = 1;
$selection = "all";
$contenttype = "all";
$search = null;

// ebsco holdingsIQ credentials
$ebsco = parse_ini_file('../../ebsco.ini');
$custid = $ebsco['hiq_custid'];
$x_api_key = $ebsco['hiq_key'];
$my_vendor_id = $ebsco['hiq_vendorid'];

$vendorid = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : $my_vendor_id;

try {
    $result = $apiInstance->custidVendorsVendoridPackagesGet($vendorid, $custid, $orderby, $count, $offset, $x_api_key, $search, $selection, $contenttype);
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');
    $obj = json_decode($result);
    $options = [];
    foreach ($obj->packagesList as $key=>$value) {
        array_push($options, "<option value=\"" . $my_vendor_id . "-" . $value->packageId . "\">" . $value->packageName . "</option>");
    }
    echo join("\n", $options);

} catch (Exception $e) {
    echo 'Error calling VendorResourcesApi->custidVendorsVendoridPackagesGet: ', $e->getMessage(), PHP_EOL;
}