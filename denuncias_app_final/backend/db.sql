CREATE DATABASE IF NOT EXISTS denuncias_db;
USE denuncias_db;

CREATE TABLE IF NOT EXISTS denuncias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100),
    descripcion VARCHAR(255),
    ubicacion VARCHAR(150),
    estado VARCHAR(20),
    ciudadano VARCHAR(100),
    telefono_ciudadano VARCHAR(15),
    fecha_registro DATETIME
);
