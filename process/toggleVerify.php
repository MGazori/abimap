<?php

include '../bootstrap/init.php';

if (!isAjaxRequest()) {
    diePage("Invalid Request!");
}
// request is Ajax and OK
if (is_null($_POST['locationId']) or !is_numeric($_POST['locationId'])) {
    echo "Invalid Location";
    die();
}
echo toggleVerify($_POST['locationId']);
