<?php

require_once '../../../vendor/autoload.php';
require_once '../../../lib/Api/TitleResourcesApi.php';

$apiInstance = new Swagger\Client\Api\TitleResourcesApi(new GuzzleHttp\Client());
$body = new \Swagger\Client\Model\CustomTitlePayload();

// ebsco holdingsIQ credentials
$ebsco = parse_ini_file('../../ebsco.ini');
$custid = $ebsco['hiq_custid'];
$vendorid = $ebsco['hiq_vendorid'];
$x_api_key = $ebsco['hiq_key'];

// parse body json and form body of request
$json = json_decode($_REQUEST['body']);
if (json_last_error() !== JSON_ERROR_NONE) {
    throw new EncryptException('Could not decode json.');
}

$packageid = $json->{'packageId'};
$body->setTitleName($json->{'titleName'});
$body->setPubType($json->{'pubType'});

// set customCoverage dates
$customCoverageList = [];
$dateRanges = $json->{'customCoverageList'};
foreach ($dateRanges as $range) {
    $coverageDates = new \Swagger\Client\Model\CoverageDates();
    $coverageDates->setBeginCoverage($range->{'beginCoverage'});
    $coverageDates->setEndCoverage($range->{'endCoverage'});
    array_push($customCoverageList, $coverageDates);
}
$body->setCustomCoverageList($customCoverageList);

try {
    $result = $apiInstance->custidVendorsVendoridPackagesPackageidTitlesPost($custid, $vendorid, $packageid, $x_api_key, $body);
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');
    echo $result; // return titleId json: {titleId: 19558440}
} catch (Exception $e) {
    echo 'Exception when calling TitleResourcesApi->custidVendorsVendoridPackagesPost: ', $e->getMessage(), PHP_EOL;
}
