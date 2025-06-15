<?php
$conexion = new mysqli("localhost", "root", "", "denuncias_db");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$ubicacion = $_POST['ubicacion'];
$estado = $_POST['estado'];
$ciudadano = $_POST['ciudadano'];
$telefono = $_POST['telefono_ciudadano'];
$fecha = date('Y-m-d H:i:s');

$sql = "INSERT INTO denuncias (titulo, descripcion, ubicacion, estado, ciudadano, telefono_ciudadano, fecha_registro)
        VALUES ('$titulo', '$descripcion', '$ubicacion', '$estado', '$ciudadano', '$telefono', '$fecha')";

if ($conexion->query($sql) === TRUE) {
    echo "Denuncia registrada correctamente";
} else {
    echo "Error: " . $conexion->error;
}
$conexion->close();
?>
