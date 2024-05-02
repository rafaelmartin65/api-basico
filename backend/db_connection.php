<?php
// Configuración de la base de datos
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'web_service';

// Conexion
try {
    $conn = new PDO("mysql:host=".$db_host.";dbname=".$db_name, $db_username, $db_password);
    $GLOBALS['conn'] = $conn;
}catch (PDOException $err) {
    echo $err->getMessage();
}

?>