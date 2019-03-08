<?php

require_once '../../../vendor/autoload.php';
require_once '../../../lib/Api/PackageResourcesApi.php';

$apiInstance = new Swagger\Client\Api\PackageResourcesApi(new GuzzleHttp\Client());
$body = new \Swagger\Client\Model\CustomPackagePayload();
$coverageDates = new \Swagger\Client\Model\CoverageDates();

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

// set packageName and contentType
$body->setPackageName($json->{'packageName'});
$body->setContentType($json->{'contentType'});

// set customCoverage
$dateRanges = $json->{'customCoverage'};
foreach ($dateRanges as $range) {
    $coverageDates->setBeginCoverage($range->{'beginCoverage'});
    $coverageDates->setEndCoverage($range->{'endCoverage'});
}
$body->setCustomCoverage($coverageDates);

try {
    $result = $apiInstance->custidVendorsVendoridPackagesPost($custid, $vendorid, $x_api_key, $body);
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');
    $packageId = $result->getPackageId();
    echo "{ \"packageId\": " . $packageId . ", \"vendorId\": " . $vendorid  . " }";
} catch (Exception $e) {
    echo 'Exception when calling PackageResourcesApi->custidVendorsVendoridPackagesPost: ', $e->getMessage(), PHP_EOL;
}
