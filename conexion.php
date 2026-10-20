<?php
$conn = new mysqli("localhost", "root", "", "sistema_registro", 3307);

if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
?>