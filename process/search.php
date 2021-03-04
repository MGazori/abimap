<?php
include '../bootstrap/init.php';

if (!isAjaxRequest()) {
    diePage("Invalid Request!");
}
// request is Ajax and OK
$keyword = $_POST['keyword'];
if (!isset($keyword) && empty($keyword) && is_null($keyword) && strlen($keyword) < 1) {
    die("عبارت مورد نظر را وارد کنید...");
}
$locations = getLocations(['keyword' => $keyword]);
if (sizeof($locations) > 0) {
    foreach ($locations as $location) {
        echo "
        <div class='result-item' data-lat='$location->lat' data-lng='$location->lng'>
            <span class='loc-type'>" . locationTypes[$location->type] . "</span>
            <span class='loc-title'>$location->title</span>
        </div>
        ";
    }
} else {
    echo "نتیجه ای یافت نشد.";
}
