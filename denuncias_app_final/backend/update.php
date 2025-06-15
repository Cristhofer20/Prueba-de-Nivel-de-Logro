<?php
$conexion = new mysqli("localhost", "root", "", "denuncias_db");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$id = $_POST['id'];
$estado = $_POST['estado'];

$sql = "UPDATE denuncias SET estado = '$estado' WHERE id = $id";

if ($conexion->query($sql) === TRUE) {
    echo "Estado actualizado correctamente";
} else {
    echo "Error: " . $conexion->error;
}
$conexion->close();
?>
