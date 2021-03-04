<?php

include '../bootstrap/init.php';

if (!isAjaxRequest()) {
    diePage("Invalid Request!");
}
// request is Ajax and OK
if (empty($_POST['title']) || empty($_POST['lat']) || empty($_POST['lng'])) {
    diePage("تمامی فیلد ها را کامل کنید!");
}
if (strlen($_POST['title']) < 3) {
    diePage("حداقل 3 حرف برای نام مکان لازم است!");
}
$lat = (float)$_POST['lat'];
$lng = (float)$_POST['lng'];
if ($lat == 0 || $lng == 0) {
    diePage("مختصات را به درستی وارد کنید.");
}
if (insertLocation($_POST)) {
    echo "مکان با موفقیت ثبت شد و منتظر تایید مدیر است.";
} else {
    echo "مشکلی در ثبت مکان پیش آمده است";
}
