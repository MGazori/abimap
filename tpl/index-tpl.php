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
        <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgNDY5LjMzMyA0NjkuMzMzIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA0NjkuMzMzIDQ2OS4zMzM7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxwYXRoIGQ9Ik0yMzQuNjY3LDE0OS4zMzNjLTQ3LjE0NywwLTg1LjMzMywzOC4xODctODUuMzMzLDg1LjMzM1MxODcuNTIsMzIwLDIzNC42NjcsMzIwUzMyMCwyODEuODEzLDMyMCwyMzQuNjY3DQoJUzI4MS44MTMsMTQ5LjMzMywyMzQuNjY3LDE0OS4zMzN6IE00MjUuMzg3LDIxMy4zMzNDNDE1LjU3MywxMjQuMzczLDM0NC45Niw1My43NiwyNTYsNDMuOTQ3VjBoLTQyLjY2N3Y0My45NDcNCglDMTI0LjM3Myw1My43Niw1My43NiwxMjQuMzczLDQzLjk0NywyMTMuMzMzSDBWMjU2aDQzLjk0N2M5LjgxMyw4OC45Niw4MC40MjcsMTU5LjU3MywxNjkuMzg3LDE2OS4zODd2NDMuOTQ3SDI1NnYtNDMuOTQ3DQoJQzM0NC45Niw0MTUuNTczLDQxNS41NzMsMzQ0Ljk2LDQyNS4zODcsMjU2aDQzLjk0N3YtNDIuNjY3SDQyNS4zODdMNDI1LjM4NywyMTMuMzMzeiBNMjM0LjY2NywzODQNCgljLTgyLjQ1MywwLTE0OS4zMzMtNjYuODgtMTQ5LjMzMy0xNDkuMzMzczY2Ljg4LTE0OS4zMzMsMTQ5LjMzMy0xNDkuMzMzUzM4NCwxNTIuMjEzLDM4NCwyMzQuNjY3UzMxNy4xMiwzODQsMjM0LjY2NywzODR6Ii8+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8L3N2Zz4NCg==" class="geolocation-btn" title="برو به مکان فعلی من" />
    </div>
    <div class="modal-overlay" style="display:none">
        <div class="modal">
            <span class="close">
                <img src="data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9IjM2NXB0IiB2aWV3Qm94PSIwIDAgMzY1LjcxNzMzIDM2NSIgd2lkdGg9IjM2NXB0IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxnIGZpbGw9IiNmNDQzMzYiPjxwYXRoIGQ9Im0zNTYuMzM5ODQ0IDI5Ni4zNDc2NTYtMjg2LjYxMzI4Mi0yODYuNjEzMjgxYy0xMi41LTEyLjUtMzIuNzY1NjI0LTEyLjUtNDUuMjQ2MDkzIDBsLTE1LjEwNTQ2OSAxNS4wODIwMzFjLTEyLjUgMTIuNTAzOTA2LTEyLjUgMzIuNzY5NTMyIDAgNDUuMjVsMjg2LjYxMzI4MSAyODYuNjEzMjgyYzEyLjUwMzkwNyAxMi41IDMyLjc2OTUzMSAxMi41IDQ1LjI1IDBsMTUuMDgyMDMxLTE1LjA4MjAzMmMxMi41MjM0MzgtMTIuNDgwNDY4IDEyLjUyMzQzOC0zMi43NS4wMTk1MzItNDUuMjV6bTAgMCIvPjxwYXRoIGQ9Im0yOTUuOTg4MjgxIDkuNzM0Mzc1LTI4Ni42MTMyODEgMjg2LjYxMzI4MWMtMTIuNSAxMi41LTEyLjUgMzIuNzY5NTMyIDAgNDUuMjVsMTUuMDgyMDMxIDE1LjA4MjAzMmMxMi41MDM5MDcgMTIuNSAzMi43Njk1MzEgMTIuNSA0NS4yNSAwbDI4Ni42MzI4MTMtMjg2LjU5Mzc1YzEyLjUwMzkwNi0xMi41IDEyLjUwMzkwNi0zMi43NjU2MjYgMC00NS4yNDYwOTRsLTE1LjA4MjAzMi0xNS4wODIwMzJjLTEyLjUtMTIuNTIzNDM3LTMyLjc2NTYyNC0xMi41MjM0MzctNDUuMjY5NTMxLS4wMjM0Mzd6bTAgMCIvPjwvZz48L3N2Zz4=" />
            </span>
            <h3 class="modal-title">ثبت مکان</h3>
            <div class="modal-content">
                <form id="addLocationForm" action="<?= site_url('process/addLocation.php') ?>" method="post">
                    <div class="field-row">
                        <div class="field-title">مختصات</div>
                        <div class="field-content">
                            <input type=text name="lat" id="lat-display" readonly style="width: 165px;text-align: center;" required>
                            <input type="text" name="lng" id="lng-display" readonly style="width: 165px;text-align: center;" required>
                        </div>
                    </div>
                    <div class="field-row">
                        <div class="field-title">نام مکان</div>
                        <div class="field-content">
                            <input type="text" name="title" id="l-title" placeholder="مثلا: دفتر مرکزی آبی کلیک" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="field-row">
                        <div class="field-title">نوع</div>
                        <div class="field-content">
                            <select name="type" id="l-type">
                                <?php foreach (locationTypes as $key => $value) : ?>
                                    <option value="<?= $key ?>"><?= $value ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="field-row">
                        <div class="field-title">ذخیره نهایی</div>
                        <div class="field-content"> <input type="submit" value="ثبت مکان"> </div>
                    </div>
                    <div class="ajax-result"></div>
                </form>
            </div>
        </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script src="assets/js/script.js"></script>
    <script>
        <?php if ($location) : ?>
            $(document).ready(function() {
                L.marker([<?= $location->lat ?>, <?= $location->lng ?>]).addTo(map).bindPopup('<?= $location->title ?>').openPopup();
                map.setView([<?= $location->lat ?>, <?= $location->lng ?>]);
            })
        <?php endif; ?>
    </script>
</body>

</html>