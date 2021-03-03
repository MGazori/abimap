<?php
include "bootstrap/init.php";
if (isset($_GET['logout']) && $_GET['logout'] == 1) {
    logOut();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!login($_POST['username'], $_POST['password'])) {
        message("نام کاربری یا پسورد اشتباه است");
    }
}
if (isLoggedIn()) {
    include "tpl/admin-tpl.php";
} else {
    include "tpl/admin-login-tpl.php";
}
