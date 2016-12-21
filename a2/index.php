<?php
require_once('./config.php');
require_once('./funcs.php');
?>
<!doctype html>
<html lang="en-US">
    <head>
        <title>IEC Assignment #2</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <div class="container">
            <h3>IEC Assignment #2</h3>
            <div class="row"><div id="map"></div></div>
            <div class="row">
                <h4>Stores</h4>
                <div id="mapItems"><?php getStoresList($config['shop_list_url']); ?></div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="./script.js"></script>
        <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=<?php echo $config['map_api_key']; ?>&callback=initMap"></script>
    </body>
</html>