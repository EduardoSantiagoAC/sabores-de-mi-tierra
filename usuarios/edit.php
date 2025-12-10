<?php include '../auth/session.php'; ?>
<?php include '../config.php'; ?>

$id = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE id_usuario = $id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $rol = $_POST['rol'];
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $user['password'];

    $sql = "UPDATE usuarios SET nombre='$nombre', email='$email', password='$password', rol='$rol' WHERE id_usuario=$id";
    
    if ($conn->query($sql)) {
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="../css/style-crud.css">
</head>
<body>
<header class="header">
    <div class="logo">Sabores de Mi Tierra</div>
</header>

<div class="content">
    <h1>Editar Usuario</h1>

    <form method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($user['nombre']); ?>" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required><br><br>

        <label>Nueva contraseña (dejar vacío para no cambiar):</label>
        <input type="password" name="password"><br><br>

        <label>Rol:</label>
        <select name="rol">
            <option value="editor" <?php echo $user['rol']=='editor'?'selected':''; ?>>Editor</option>
            <option value="admin" <?php echo $user['rol']=='admin'?'selected':''; ?>>Administrador</option>
        </select><br><br>

        <button type="submit">Actualizar</button>
    </form>
    <p><a href="index.php">Volver</a></p>
</div>
</body>
</html>