<?php

$server = 'http://98.142.107.243/~aplicaci';
$username = 'aplicaci';
$password = 't27Zdzy1S2';
$database = 'aplicaci_rmd';

try {
    $conn = mysqli_connect($server, $username, $password, $database);
} catch (Exception $e) {
    die('Conexion fallida: '.$e->getMessage());
}

?>