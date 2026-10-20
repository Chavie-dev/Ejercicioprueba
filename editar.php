<?php
include 'conexion.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $conn
    ->query("SELECT * FROM usuarios WHERE id=$id");
    $usuario = $result->fetch_assoc();
}

if($_SERVER["REQUEST_METHOD"]== "POST"){
    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $email=$_POST['email'];

    $sql="UPDATE usuarios SET nombre='$nombre', email='$email' WHERE id=$id";

    if($conn->query($sql)== TRUE){
        header("Location: index.php");
    }else{
        echo "ERROR al actualizar! :( ".$conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Editar usuario.</title>
    </head>

    <body>
        <h2>Editar Usuario</h2>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
            <label>Nombre: </label><br>

            <input type="text" name="nombre" value="<?php echo $usuario['nombre']; ?>" required><br>
             <label>Correo: </label><br>

            <input type="email" name="email" value="<?php echo $usuario['email']; ?>" required><br>


            <button type="submit">Actulizar</button>
            <a href="index.php">Cancelar</a>
        </form>
    </body>



</html>
