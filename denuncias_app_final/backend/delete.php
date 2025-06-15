<?php
$conexion = new mysqli("localhost", "root", "", "denuncias_db");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$id = $_POST['id'];
$sql = "DELETE FROM denuncias WHERE id = $id";

if ($conexion->query($sql) === TRUE) {
    echo "Denuncia eliminada correctamente";
} else {
    echo "Error: " . $conexion->error;
}

$conexion->close();
?>
