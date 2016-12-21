<?php
function getStoresList($url = '') {
    $result = handleCurl($url);
    $resultArr = json_decode($result, true);
    foreach($resultArr['Stores'] as $resultArrItem) {
?>
        <button type="button" class="btn btn-primary btn-xs" data-id="<?php echo $resultArrItem; ?>">
            <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <?php echo $resultArrItem; ?>
        </button>
<?php
    }
}

function handleCurl($url = '', $postVars = []) {
    $output = '';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if(!empty($postVars)) {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postVars);
    }
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