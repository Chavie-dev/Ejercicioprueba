<?php
include 'conexion.php';

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = password_hash($_POST['password'],PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre','$email','$password')";

if ($conn->query($sql)==TRUE){
    echo "Registro Exitoso! ";
} else {
    echo "Error: ". $sql . "<br>". $conn->error;
}
$conn->close();
?>