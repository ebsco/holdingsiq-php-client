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
if ($json->{'customCoverageList'}) {
    $customCoverageList = [];
    $dateRanges = $json->{'customCoverageList'};
    foreach ($dateRanges as $range) {
        $coverageDates = new \Swagger\Client\Model\CoverageDates();
        $coverageDates->setBeginCoverage($range->{'beginCoverage'});
        $coverageDates->setEndCoverage($range->{'endCoverage'});
        array_push($customCoverageList, $coverageDates);
    }
    $body->setCustomCoverageList($customCoverageList);
}

// set contributors
if ($json->{'contributorsList'}) {
    $contribList = [];
    $contribs = $json->{'contributorsList'};
    foreach ($contribs as $contrib) {
        $contribId = new \Swagger\Client\Model\ContributorID();
        $contribId->setType($contrib->{'type'});
        $contribId->setContributor($contrib->{'contributor'});
        array_push($contribList, $contribId);
    }
    $body->setContributorsList($contribList);
}

// set identifiers
if ($json->{'identifiersList'}) {
    $identList = [];
    $idents = $json->{'identifiersList'};
    foreach ($idents as $ident) {
        $identifier = new \Swagger\Client\Model\Identifier();
        $identifier->setType($ident->{'type'});
        $identifier->setSubtype($ident->{'subtype'});
        $identifier->setId($ident->{'id'});
        array_push($identList, $identifier);
    }
    $body->setIdentifiersList($identList);
}

// set embargo period
if ($json->{'embargoPeriod'}) {
    $embargo = new \Swagger\Client\Model\EmbargoPeriod();
    $embargo->setEmbargoUnit($json->{'embargoPeriod'}->{'embargoUnit'});
    $embargo->setEmbargoValue($json->{'embargoPeriod'}->{'embargoValue'});
    $body->setCustomEmbargoPeriod($embargo);
}

// set publisher name
if ($json->{'publisherName'}) {
    $body->setPublisherName($json->{'publisherName'});
}

// set edition
if ($json->{'edition'}) {
    $body->setEdition($json->{'edition'});
}

// set description
if ($json->{'description'}) {
    $body->setDescription($json->{'description'});
}

// set coverage statement
if ($json->{'coverageStatement'}) {
    $body->setCoverageStatement($json->{'coverageStatement'});
}

// peer reviewed
if ($json->{'peerReviewed'}) {
    $body->setIsPeerReviewed($json->{'peerReviewed'});
}

// url
if ($json->{'url'}) {
    $body->setUrl($json->{'url'});
}

try {
    $result = $apiInstance->custidVendorsVendoridPackagesPackageidTitlesPost($custid, $vendorid, $packageid, $x_api_key, $body);
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');
    echo $result; // return titleId json: {titleId: 19558440}
} catch (Exception $e) {
    echo 'Exception when calling TitleResourcesApi->custidVendorsVendoridPackagesPost: ', $e->getMessage(), PHP_EOL;
}
