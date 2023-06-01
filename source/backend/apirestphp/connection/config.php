<?php
    declare(strict_types=1); 
    /* Estas líneas de código definen variables para la conexión de la base de datos. */
    $servidor= $_SERVER['HTTP_HOST'];
    $path_actual=$_SERVER['PHP_SELF'];
    $host="localhost";
    $dbname="dbpeluqueria";
    $username="root";
    $password="";
    $driver="mysql";

    /* Este bloque de código define constantes y establece sus valores para su uso en toda la
    aplicación PHP. La sentencia `if(!defined('__CONFIG__'))` comprueba si la constante `__CONFIG__`
    ya ha sido definida. Si no se ha definido, se ejecuta el bloque de código dentro de la
    instrucción if. */
    if(!defined('__CONFIG__')){
        define('__CONFIG__',true);
        define('ROOT_PATH',$servidor);
        define('ROOT',__DIR__);
        define('RUTA_ACTUAL', $path_actual);
        define("HOST",$host);
        define("DB",$dbname);
        define("USUARIO",$username);
        define("CLAVE",$password);
        define("DRIVER",$driver);
        // define('CARPETA_ACTUAL',CARPETA_PADRE.basename(getcwd()).'/');
    }
?>