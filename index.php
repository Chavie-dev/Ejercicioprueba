<?php
include('conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Registro</title>
        <style>
            body {font-family: Arial; padding: 20px;}
            table {width: 100%; border-collapse: collapse; margin-top: 20px;}
            th, td {border: 1px solid #fff; padding: 8px; text-align: left;}
            th {background-color: #f84df0; color: white;}
            form {background: #f23030; padding: 20px; border-radius: 5px; width: 300px;}
            input, button {width: 100%; margin-bottom: 10px; padding: 8px; box-sizing: border-box;}
            button {background: black; color: white; border: none; cursor: pointer;}
            .BotonEditar{padding: 5px 10px; text-decoration: none; color: #fff; border-radius: 3px; background-color: greenyellow;}
            .BotonEliminar { padding: 5px 10px; text-decoration: none; color: #fff; background: red; border-radius: 3px; }
        </style>
    </head>

    <body>
        <h2>Usuarios Registrados</h2>
        <table>
            <a href="registro.html" class="BotonRegistro">Nuevo Registro </a>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Fecha de registro</th>
                <th>Columna 5</th>
            </tr>
            <?php
            $sql="SELECT id, nombre, email, fecha_registro FROM usuarios";
            $result = $conn->query($sql);

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nombre']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['fecha_registro']}</td>
                    <td>
                        <a href='editar.php?id={$row['id']}' class='BotonEditar'>Editar</a>
                        <a href='eliminar.php?id={$row['id']}' class='BotonEliminar' >Eliminar</a>
                        
                    
                    </td>
                    
                    
                    </tr>";
                }
            } else {
                echo "<tr><td>No hay Usuarios Registrados</td>  </tr>";
            }
            ?>
        </table>
        
    </body>
</html>