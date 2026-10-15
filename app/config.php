<?php
define('SERVIDOR', 'localhost');
define('USUARIO', 'root');
define('PASSWORD', '');
define('BD', 'lavadokoala');
$servidor = "mysql:dbname=" . BD . ";host=" . SERVIDOR . ";charset=utf8";
try {
    $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
   
} catch (PDOException $e) {
    echo "ERROR: No se pudo conectar.";
}

$URL = "http://localhost/www.lavadokoala.com";

date_default_timezone_set( "America/Mexico_City" );
$fechahora = date( 'Y-m-d H:i:s' );





