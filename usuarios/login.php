<?php
session_start();
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id_usuario'];
            $_SESSION['user_name'] = $user['nombre'];
            $_SESSION['user_rol'] = $user['rol'];
            header("Location: ../dashboard.php");  // lo creamos después
            exit();
        } else {
            $error = "Contraseña incorrecta";
        }
    } else {
        $error = "Usuario no encontrado";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sabores de Mi Tierra</title>
    <link rel="stylesheet" href="../css/style-crud.css">
</head>
<body style="background: url('https://as1.ftcdn.net/v2/jpg/08/95/25/90/1000_F_895259039_vudCnamcUKRCCAgdEwmfan8QJKgxW2QB.jpg') center/cover; display:flex; align-items:center; justify-content:center; min-height:100vh;">
<div class="content" style="width:400px; text-align:center;">
    <h1 style="color:#8B4513;">Panel Administrativo</h1>
    <h2>Iniciar Sesión</h2>
    
    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="post" style="margin-top:30px;">
        <label>Email:</label>
        <input type="email" name="email" required placeholder="eduardo@matehuala.tecnm.mx"><br><br>
        
        <label>Contraseña:</label>
        <input type="password" name="password" required placeholder="admin123"><br><br>
        
        <button type="submit" style="padding:15px 40px; font-size:1.2em;">Entrar al Panel</button>
    </form>
    
    <p style="margin-top:20px; color:#666;">
        Usuario: <strong>eduardo@matehuala.tecnm.mx</strong><br>
        Contraseña: <strong>admin123</strong>
    </p>
</div>
</body>
</html>