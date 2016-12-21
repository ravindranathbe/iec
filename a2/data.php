<?php
require_once('./config.php');
require_once('./funcs.php');

$shopListURL = $config['shop_list_url'];
$shopURL = $config['shop_url'];
$id = $_REQUEST['id'];

$result = handleCurl($shopURL.$id);
echo $result;


