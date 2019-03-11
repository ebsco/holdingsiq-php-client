<?php

require_once '../../../vendor/autoload.php';
require_once '../../../lib/Api/PackageResourcesApi.php';

$apiInstance = new Swagger\Client\Api\PackageResourcesApi(new GuzzleHttp\Client());
$body = new \Swagger\Client\Model\SetCustomPackagePayload();
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

// set package id
$packageid = $json->{'packageId'};
// set packageName and contentType
$body->setPackageName($json->{'packageName'});
$body->setContentType($json->{'contentType'});

// set titles hidden
$body->setIsHidden($json->{'isHidden'});

// set is selected
$body->setIsSelected($json->{'isSelected'});

// set customCoverage
$dateRanges = $json->{'customCoverage'};
foreach ($dateRanges as $range) {
    $coverageDates->setBeginCoverage($range->{'beginCoverage'});
    $coverageDates->setEndCoverage($range->{'endCoverage'});
}
$body->setCustomCoverage($coverageDates);

try {
    $apiInstance->custidVendorsVendoridPackagesPackageidPut($custid, $vendorid, $packageid, $x_api_key, $body);
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');
    echo "{ \"message\": \"Package updated.\", \"packageId\": " . $packageid . ", \"vendorId\": " . $vendorid  . " }";
} catch (Exception $e) {
    echo 'Exception when calling PackageResourcesApi->custidVendorsVendoridPackagesPackageidPut: ', $e->getMessage(), PHP_EOL;
}
