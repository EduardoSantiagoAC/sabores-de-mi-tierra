<?php
include '../config.php';

$id = $_GET['id'] ?? 0;
$sql = "SELECT r.*, p.nombre AS platillo 
        FROM receta r 
        JOIN platillos p ON r.id_platillo = p.id_platillo 
        WHERE r.id_receta = $id";
$result = $conn->query($sql);
$receta = $result->fetch_assoc();

// Si no se encuentra la receta, se detiene la ejecución
if (!$receta) {
    echo "Receta no encontrada.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ingredientes = $_POST['ingredientes'];
    $pasos = $_POST['pasos'];
    $id_platillo = $_POST['id_platillo'];

    $sql_update = "UPDATE receta 
                   SET ingredientes = '$ingredientes', 
                       pasos = '$pasos', 
                       id_platillo = '$id_platillo' 
                   WHERE id_receta = $id";

    if ($conn->query($sql_update) === TRUE) {
        header("Location: index.php"); 
        exit();
    } else {
        // Muestra mensaje si ocurre un error
        echo "Error al actualizar: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Receta - Sabores de Mi Tierra</title>
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
    
    <h1>Editar Receta: <?php echo htmlspecialchars($receta['platillo']); ?></h1>

    <!-- Formulario para editar los datos -->
    <form method="post">
        <label>Platillo:</label>
        <select name="id_platillo" required>
            <?php
            // Se consultan todos los platillos para mostrarlos
            $sql_platillos = "SELECT id_platillo, nombre FROM platillos ORDER BY nombre";
            $res_platillos = $conn->query($sql_platillos);
            
            while ($p = $res_platillos->fetch_assoc()) {
                $selected = ($p['id_platillo'] == $receta['id_platillo']) ? 'selected' : '';
                echo "<option value='{$p['id_platillo']}' $selected>{$p['nombre']}</option>";
            }
            ?>
        </select>

        <label>Ingredientes (uno por línea):</label>
        <!-- Se muestran los ingredientes actuales -->
        <textarea name="ingredientes" rows="10" required><?php echo htmlspecialchars($receta['ingredientes']); ?></textarea>

        <label>Pasos de preparación (con saltos de línea):</label>
        <textarea name="pasos" rows="12" required><?php echo htmlspecialchars($receta['pasos']); ?></textarea>

        <button type="submit">Actualizar Receta</button>
    </form>


    <p><a href="index.php">Volver a la lista de recetas</a></p>
</div>

<footer>
    <p>&copy; 2025 Eduardo Santiago Acosta Cárdenas | Instituto Tecnológico de Matehuala</p>
</footer>
</body>
</html>
