<?php
// Conexión a la base de datos(archivo en la carpeta raiz)
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Se obtienen los datos ingresados por el usuario
    $ingredientes = $_POST['ingredientes'];
    $pasos = $_POST['pasos'];
    $id_platillo = $_POST['id_platillo'];

    $sql = "INSERT INTO receta (ingredientes, pasos, id_platillo) 
            VALUES ('$ingredientes', '$pasos', '$id_platillo')";

    // Ejecutar consulta e identificar si fue exitosa
    if ($conn->query($sql) === TRUE) {
        // Si todo salió bien, redirige al listado de recetas
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
    <title>Agregar Receta</title>
    <!-- Ruta para el archivo css de estilos almacenado en otra carpeta -->
    <link rel="stylesheet" href="../css/style-crud.css">
</head>
<body>

<header class="header">
    <div class="logo">Sabores de Mi Tierra</div>
    <ul class="menu">
        <li><a href="../platillos/index.php">Platillos</a></li>
        <li><a href="index.php">Recetas</a></li>
    </ul>
</header>

<div class="content">
    <h1>Agregar Receta</h1>

    <form method="post">

        <label>Platillo:</label>
        <select name="id_platillo" required>
            <option value="">Selecciona un platillo</option>
            <?php
            // Consultamos los platillos registrados para mostrarlos como opciones
            $sql = "SELECT id_platillo, nombre FROM platillos ORDER BY nombre";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['id_platillo']}'>{$row['nombre']}</option>";
            }
            ?>
        </select>

        <!-- Área de texto para escribir ingredientes -->
        <label>Ingredientes (uno por línea):</label>
        <textarea name="ingredientes" rows="8" required 
                  placeholder="500g masa de maíz&#10;100g chile guajillo&#10;300g queso fresco"></textarea>

        <!-- Área de texto para escribir los pasos de preparación -->
        <label>Pasos (numerados o con saltos de línea):</label>
        <textarea name="pasos" rows="10" required
                  placeholder="1. Tostar los chiles...&#10;2. Licuar con agua..."></textarea>

       
        <button type="submit">Guardar Receta</button>
    </form>

    <p><a href="index.php">← Volver</a></p>
</div>

</body>
</html>
