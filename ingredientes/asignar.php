<?php include '../config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Ingredientes a Receta</title>
    <link rel="stylesheet" href="../css/style-crud.css">
</head>
<body>
<header class="header">
    <div class="logo">Sabores de Mi Tierra</div>
    <ul class="menu">
        <li><a href="../platillos/index.php">Platillos</a></li>
        <li><a href="../recetas/index.php">Recetas</a></li>
        <li><a href="index.php">Ingredientes</a></li>
    </ul>
</header>

<div class="content">
    <h1>Asignar Ingredientes a una Receta</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_receta = $_POST['id_receta'];
        $id_ingrediente = $_POST['id_ingrediente'];
        $cantidad = $_POST['cantidad'];

        $sql = "INSERT INTO receta_ingrediente (id_receta, id_ingrediente, cantidad) 
                VALUES ('$id_receta', '$id_ingrediente', '$cantidad')
                ON DUPLICATE KEY UPDATE cantidad = '$cantidad'";

        if ($conn->query($sql)) {
            echo "<p style='color:green;'>Ingrediente asignado correctamente.</p>";
        }
    }
    ?>

    <form method="post">
        <label>Selecciona la receta:</label>
        <select name="id_receta" required>
            <option value="">-- Selecciona una receta --</option>
            <?php
            $rec = $conn->query("SELECT r.id_receta, p.nombre FROM receta r JOIN platillos p ON r.id_platillo = p.id_platillo");
            while($row = $rec->fetch_assoc()) {
                echo "<option value='{$row['id_receta']}'>" . htmlspecialchars($row['nombre']) . "</option>";
            }
            ?>
        </select>

        <label>Ingrediente:</label>
        <select name="id_ingrediente" required>
            <option value="">-- Selecciona un ingrediente --</option>
            <?php
            $ing = $conn->query("SELECT * FROM ingredientes ORDER BY nombre");
            while($row = $ing->fetch_assoc()) {
                echo "<option value='{$row['id_ingrediente']}'>" . htmlspecialchars($row['nombre']) . "</option>";
            }
            ?>
        </select>

        <label>Cantidad (ej: 500g, 2 tazas, al gusto):</label>
        <input type="text" name="cantidad" required placeholder="500g" style="width:100%; padding:12px;">

        <button type="submit">Asignar Ingrediente</button>
    </form>

    <p><a href="index.php">Volver a Ingredientes</a></p>
</div>

<footer>
    <p>© 2025 Eduardo Santiago Acosta Cárdenas | Instituto Tecnológico de Matehuala</p>
</footer>
</body>
</html>
