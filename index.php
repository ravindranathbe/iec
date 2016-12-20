<?php require_once('./config.php'); ?>
<!doctype html>
<html lang="en-US">
    <head>
        <title>IEC Assignment</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <div class="container">
            <h3>IEC Assignment</h3>
            <p>Click on the map to get the default locations.</p>
            <div class="row">
                <div class="col-md-3">
                    <h4>Locations</h4>
                    <div id="mapItems"><ol></ol></div>
                </div>
                <div class="col-md-9"><div id="map"></div></div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="./script.js"></script>
        <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=<?php echo $config['map_api_key']; ?>&callback=initMap"></script>
    </body>
</html>