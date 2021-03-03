<?php
function isLoggedIn()
{
    return isset($_SESSION['adminUserLogin']);
}
function login($username, $password)
{
    global $siteAdmin;
    if (
        array_key_exists($username, $siteAdmin) &&
        password_verify($password, $siteAdmin[$username])
    ) {
        $_SESSION['adminUserLogin'] = 1;
        return true;
    }
}
function logOut()
{
    unset($_SESSION['adminUserLogin']);
}
