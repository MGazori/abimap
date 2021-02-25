<?php defined('BASE_PATH') or die("Permision Denied"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= SITE_TITLE ?></title>
    <link rel="shortcut icon" href="<?= BASE_URL ?>assets/img/favicon-64.png">
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
</head>

<body>
    <div class="main">
        <div class="head">
            <input type="text" id="search" placeholder="دنبال کجا می گردی؟" autocomplete="off">
        </div>
        <div class="mapContainer">
            <div id="map"></div>
        </div>
    </div>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script src="assets/js/script.js"></script>
</body>

</html>