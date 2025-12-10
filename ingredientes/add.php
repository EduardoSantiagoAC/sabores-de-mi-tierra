<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $sql = "INSERT INTO ingredientes (nombre) VALUES ('$nombre')";

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
    <title>Agregar Ingrediente</title>
    <link rel="stylesheet" href="../css/style-crud.css">
</head>
<body>
<header class="header">
    <div class="logo">Sabores de Mi Tierra</div>
    <ul class="menu">
        <li><a href="index.php">Ingredientes</a></li>
    </ul>
</header>

<div class="content">
    <h1>Agregar Nuevo Ingrediente</h1>
    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="post">
        <label>Nombre del ingrediente:</label>
        <input type="text" name="nombre" required placeholder="Ej: Chile guajillo" style="width:100%;padding:12px;">
        <button type="submit">Guardar</button>
    </form>
    <p><a href="index.php">Volver</a></p>
</div>
</body>
</html>