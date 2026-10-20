<?php
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre   = trim($_POST["nombre"] ?? "");
    $email    = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";

    // Conexión: servidor, usuario, contraseña, base de datos, puerto
    $conn = new mysqli("127.0.0.1", "root", "", "mi_base", 3307);

    if ($conn->connect_error) {
        $mensaje = "Error de conexión: " . $conn->connect_error;
    } else {
        $conn->set_charset("utf8mb4");
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, contrasena) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $email, $hash);

        if ($stmt->execute()) {
            $mensaje = "éxito";
        } else {
            $mensaje = "Error: " . $stmt->error;
        }
        $stmt->close();
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>
    <style>
        body { font-family: Arial, sans-serif; display: flex; justify-content: center; margin-top: 50px; }
        form { background: #7c15b3; padding: 20px; border-radius: 5px; width: 300px; color: white; }
        label { display: block; margin-bottom: 5px; }
        input, button { width: 100%; margin-bottom: 10px; padding: 8px; box-sizing: border-box; }
        button { background: red; color: white; border: none; cursor: pointer; }
        button:hover { background: darkred; }
        .mensaje { text-align: center; font-weight: bold; margin-bottom: 10px; }
    </style>
</head>
<body>
    <form action="index.php" method="POST">
        <h3>Registro</h3>

        <?php if ($mensaje !== ""): ?>
            <div class="mensaje"><?php echo htmlspecialchars($mensaje); ?></div>
        <?php endif; ?>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="email">Correo:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>