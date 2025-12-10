<?php include '../auth/session.php'; ?>
<?php include '../config.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $rol = $_POST['rol'];

    $sql = "INSERT INTO usuarios (nombre, email, password, rol) 
            VALUES ('$nombre', '$email', '$password', '$rol')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Usuario</title>
    <link rel="stylesheet" href="../css/style-crud.css">
</head>
<body>
<header class="header">
    <div class="logo">Sabores de Mi Tierra</div>
    <ul class="menu">
        <li><a href="index.php">Usuarios</a></li>
        <li><a href="../dashboard.php">Dashboard</a></li>
    </ul>
</header>

<div class="content">
    <h1>Agregar Nuevo Usuario</h1>
    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="post">
        <label>Nombre completo:</label>
        <input type="text" name="nombre" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" required><br><br>

        <label>Contraseña:</label>
        <input type="password" name="password" required minlength="6"><br><br>

        <label>Rol:</label>
        <select name="rol">
            <option value="editor">Editor</option>
            <option value="admin">Administrador</option>
        </select><br><br>

        <button type="submit">Crear Usuario</button>
    </form>
    <p><a href="index.php">Volver</a></p>
</div>
</body>
</html>