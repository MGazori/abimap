<?php
include "bootstrap/init.php";
$location = false;
if (isset($_GET['locationId']) && is_numeric($_GET['locationId'])) {
    $location = getLocation($_GET['locationId']);
}
include "tpl/index-tpl.php";
