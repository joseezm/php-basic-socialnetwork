<?php
$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "redsocial";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
	die("La conexion falló: " . $conexion->connect_error);
}

@mysql_query("SET NAMES 'utf8'");

?>