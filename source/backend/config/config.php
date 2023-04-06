<?php
    declare(strict_types = 1);
    $server= $_SERVER['HTTP_HOST'];
    $path = $_SERVER['PHP_SELF'];
    $host = "localhost";
    $dbname = "serviciopeluqueria";
    $username = "root";
    $pass = "";

    if(!defined('__CONFIG__')){
        define('__CONFIG__', true);
        define('ROOT_PATH', $server);
        define('PATH_ACTUAL', $path);
        define("HOST", $host);
        define("DB_NAME", $dbname);
        define("USERNAME", $username);
        define("PASS", $pass);
    }
?>