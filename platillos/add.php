<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $id_region = $_POST['id_region'];

    $sql = "INSERT INTO platillos (nombre, descripcion, id_region) 
            VALUES ('$nombre', '$descripcion', '$id_region')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Platillo - Sabores de Mi Tierra</title>
    <link rel="stylesheet" href="../css/style-crud.css">
</head>
<body>

<header class="header">
    <div class="logo">Sabores de Mi Tierra</div>
    <ul class="menu">
        <li><a href="../index.html">Inicio</a></li>
        <li><a href="index.php">Gestión de Platillos</a></li>
    </ul>
</header>

<div class="content">
    <h1>Agregar Nuevo Platillo</h1>

    <form method="post" action="">
        <label for="nombre">Nombre del platillo:</label>
        <input type="text" name="nombre" id="nombre" required minlength="3" placeholder="Ej: Enchiladas Potosinas">

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" rows="5" required minlength="10" 
                  placeholder="Breve descripción del platillo..."></textarea>

        <label for="id_region">Región:</label>
        <select name="id_region" id="id_region" required>
            <option value="">Selecciona una región</option>
            <?php
            $sql = "SELECT id_region, nombre FROM regiones ORDER BY nombre";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                echo "<option value='{$row['id_region']}'>{$row['nombre']}</option>";
            }
            ?>
        </select>

        <button type="submit">Guardar Platillo</button>
    </form>

    <p><a href="index.php">Volver a la lista</a></p>
</div>

<footer>
    <p>&copy; 2025 Eduardo Santiago Acosta Cárdenas | Instituto Tecnológico de Matehuala</p>
</footer>
</body>
</html>