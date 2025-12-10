<?php include '../config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Regiones - Sabores de Mi Tierra</title>
    <link rel="stylesheet" href="../css/style-crud.css">
</head>
<body>

<header class="header">
    <div class="logo">Sabores de Mi Tierra</div>
    <ul class="menu">
        <li><a href="../index.php">Inicio</a></li>
        <li><a href="../platillos/index.php">Platillos</a></li>
        <li><a href="../recetas/index.php">Recetas</a></li>
        <li><strong>Regiones</strong></li>
        <li><a href="../ingredientes/index.php">Ingredientes</a></li>
        <li><a href="../usuarios/index.php">Usuarios</a></li>
    </ul>
</header>

<div class="content">
    <h1>Gestión de Regiones Potosinas</h1>
    <a href="add.php" class="btn btn-add">+ Agregar Región</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre de la Región</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM regiones ORDER BY nombre";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id_region']}</td>
                        <td>" . htmlspecialchars($row['nombre']) . "</td>
                        <td>
                            <a href='edit.php?id={$row['id_region']}' class='btn btn-edit'>Editar</a>
                            <a href='delete.php?id={$row['id_region']}' class='btn btn-delete'
                               onclick='return confirm(\"¿Eliminar esta región? Se eliminarán también los platillos asociados.\");'>Eliminar</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No hay regiones registradas.</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<footer>
    <p>© 2025 Eduardo Santiago Acosta Cárdenas | Instituto Tecnológico de Matehuala</p>
</footer>
</body>
</html>