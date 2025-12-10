<?php
include '../config.php';

$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    // Validaciones básicas
    if ($password !== $password_confirm) {
        $mensaje = "<p style='color:red;'>Las contraseñas no coinciden.</p>";
    } elseif (strlen($password) < 6) {
        $mensaje = "<p style='color:red;'>La contraseña debe tener al menos 6 caracteres.</p>";
    } else {
        // Verificar si el email ya existe
        $check = $conn->query("SELECT * FROM usuarios WHERE email = '$email'");
        if ($check->num_rows > 0) {
            $mensaje = "<p style='color:red;'>Este correo ya está registrado.</p>";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO usuarios (nombre, email, password, rol) 
                    VALUES ('$nombre', '$email', '$hash', 'editor')";

            if ($conn->query($sql) === TRUE) {
                $mensaje = "<p style='color:green; font-weight:bold;'>¡Registro exitoso! Ya puedes <a href='login.php'>iniciar sesión</a>.</p>";
            } else {
                $mensaje = "<p style='color:red;'>Error: " . $conn->error . "</p>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Sabores de Mi Tierra</title>
    <link rel="stylesheet" href="../css/style-crud.css">
    <style>
        body {
            background: url('https://as1.ftcdn.net/v2/jpg/08/95/25/90/1000_F_895259039_vudCnamcUKRCCAgdEwmfan8QJKgxW2QB.jpg') center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .content {
            width: 450px;
            text-align: center;
            background: rgba(255,255,255,0.98);
        }
    </style>
</head>
<body>

<div class="content">
    <h1 style="color:#8B4513;">Crear Cuenta Nueva</h1>
    <p>Regístrate para colaborar en el proyecto gastronómico</p>

    <?php echo $mensaje; ?>

    <form method="post" style="margin-top:30px;">
        <label>Nombre completo:</label>
        <input type="text" name="nombre" required placeholder="Eduardo Santiago Acosta" style="width:100%; padding:12px; margin:10px 0;"><br>

        <label>Correo electrónico:</label>
        <input type="email" name="email" required placeholder="tu@correo.com" style="width:100%; padding:12px; margin:10px 0;"><br>

        <label>Contraseña:</label>
        <input type="password" name="password" required minlength="6" style="width:100%; padding:12px; margin:10px 0;"><br>

        <label>Confirmar contraseña:</label>
        <input type="password" name="password_confirm" required minlength="6" style="width:100%; padding:12px; margin:10px 0;"><br>

        <button type="submit" style="padding:15px 40px; font-size:1.2em; margin-top:20px;">
            Crear Cuenta
        </button>
    </form>

    <p style="margin-top:25px;">
        ¿Ya tienes cuenta? <a href="login.php" style="color:#8B4513; font-weight:bold;">Iniciar sesión</a>
    </p>
    <p><a href="../index.html">← Volver al sitio público</a></p>
</div>

</body>
</html>