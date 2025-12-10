<?php
include '../config.php';

$id = $_GET['id'] ?? 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $id_region = $_POST['id_region'];

    $sql = "UPDATE platillos SET nombre='$nombre', descripcion='$descripcion', id_region='$id_region' 
            WHERE id_platillo=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

$sql = "SELECT * FROM platillos WHERE id_platillo=$id";
$result = $conn->query($sql);
$platillo = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Platillo - Sabores de Mi Tierra</title>
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
    <h1>Editar Platillo</h1>

    <form method="post" action="">
        <label for="nombre">Nombre del platillo:</label>
        <input type="text" name="nombre" id="nombre" required minlength="3" 
               value="<?php echo htmlspecialchars($platillo['nombre']); ?>">

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" rows="5" required minlength="10"><?php echo htmlspecialchars($platillo['descripcion']); ?></textarea>

        <label for="id_region">Región:</label>
        <select name="id_region" id="id_region" required>
            <?php
            $sql_reg = "SELECT id_region, nombre FROM regiones ORDER BY nombre";
            $res_reg = $conn->query($sql_reg);
            while($reg = $res_reg->fetch_assoc()) {
                $selected = ($reg['id_region'] == $platillo['id_region']) ? 'selected' : '';
                echo "<option value='{$reg['id_region']}' $selected>{$reg['nombre']}</option>";
            }
            ?>
        </select>

        <button type="submit">Actualizar Platillo</button>
    </form>

    <p><a href="index.php">Volver a la lista</a></p>
</div>

<footer>
    <p>&copy; 2025 Eduardo Santiago Acosta Cárdenas | Instituto Tecnológico de Matehuala</p>
</footer>
</body>
</html>