<?php
require_once('./config.php');

$url = $config['result_url'];
$appId = $config['result_app_id'];
$withinKM = $config['result_radius'];
$maxStores = $config['result_max_stores'];
$lat = $_REQUEST['lat'];
$lng = $_REQUEST['lng'];

function handleCurl($url = '', $postVars = []) {
    $output = '';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postVars);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    try {
        $output = curl_exec($ch);
    } catch(Exception $e) {
        echo $e->getMessage();
        exit();
    }

    if($output === false) {
        die ('Curl error: ' . curl_error($ch));
    }
    curl_close($ch);

    return $output;
}

function getDump() {
    $dump = file_get_contents('dump.json');
    return $dump;
}

/* $result = handleCurl($url, [
    'latitude' => $lat,
    'longitude' => $lng,
    'applicationID' => $appId,
    'withinKm' => $withinKM,
    'maxNumberOfStores' => $maxStores,
]); */

// var_dump($result);


echo getDump();
