<?php
$conexion = new mysqli("localhost", "root", "", "denuncias_db");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$resultado = $conexion->query("SELECT * FROM denuncias ORDER BY fecha_registro DESC");

$datos = [];
while ($fila = $resultado->fetch_assoc()) {
    $datos[] = $fila;
}

echo json_encode($datos);
$conexion->close();
?>
