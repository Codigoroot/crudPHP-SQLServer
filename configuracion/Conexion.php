<?php
require_once "global.php";

$servidor = SERVIDOR;
$usuario = USUARIO; // reemplaza username con el usuario de la base de datos
$contraseña = CONTRASEÑA; // reemplaza password con la contraseña de la base de datos
$database = DATABASE; // reemplaza database_name con el nombre de la base de datos


$dsn = "sqlsrv:Server=$servidor;Database=$database";
try {
    $conexion = new PDO($dsn, $usuario, $contraseña);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}
?>