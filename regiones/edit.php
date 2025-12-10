<?php
include '../config.php';
$id = $_GET['id'] ?? 0;

$sql = "SELECT * FROM regiones WHERE id_region = $id";
$result = $conn->query($sql);
$region = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $sql = "UPDATE regiones SET nombre='$nombre' WHERE id_region=$id";

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Región</title>
    <link rel="stylesheet" href="../css/style-crud.css">
</head>
<body>

<header class="header">
    <div class="logo">Sabores de Mi Tierra</div>
    <ul class="menu">
        <li><a href="../platillos/index.php">Platillos</a></li>
        <li><a href="index.php">Regiones</a></li>
    </ul>
</header>

<div class="content">
    <h1>Editar Región</h1>

    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="post">
        <label>Nombre de la región:</label>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($region['nombre']); ?>" 
               required minlength="3" style="width:100%; padding:12px;">

        <button type="submit">Actualizar Región</button>
    </form>

    <p><a href="index.php">Volver</a></p>
</div>
</body>
</html>