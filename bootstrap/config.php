<?php defined('BASE_PATH') or die("Permision Denied");
//set database connection info
$database_config = (object)[
    'host' => 'localhost',
    'user' => 'root',
    'password' => '',
    'dbname' => 'abimap',
    'charset' => 'utf8mb4'
];
$siteAdmin = [
    'username' => 'BCRYPT_PASSWORD HERE'
];
