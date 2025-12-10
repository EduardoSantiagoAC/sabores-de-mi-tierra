<?php include '../config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Platillos - Sabores de Mi Tierra</title>
    <link rel="stylesheet" href="../css/style-crud.css">
</head>
<body>

<header class="header">
    <div class="logo">Sabores de Mi Tierra</div>
    <ul class="menu">
        <li><a href="../index.php">Inicio</a></li>
        <li><strong>Platillos</strong></li>
        <li><a href="../recetas/index.php">Recetas</a></li>
        <li><a href="../regiones/index.php">Regiones</a></li>
        <li><a href="../ingredientes/index.php">Ingredientes</a></li>
        <li><a href="../usuarios/index.php">Usuarios</a></li>
    </ul>
</header>

<div class="content">
    <h1>Gestión de Platillos Potosinos</h1>
    <a href="add.php" class="btn btn-add">+ Agregar Nuevo Platillo</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Región</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT p.id_platillo, p.nombre, p.descripcion, r.nombre AS region 
                    FROM platillos p 
                    JOIN regiones r ON p.id_region = r.id_region
                    ORDER BY p.nombre";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id_platillo']}</td>
                        <td>" . htmlspecialchars($row['nombre']) . "</td>
                        <td>" . htmlspecialchars($row['descripcion']) . "</td>
                        <td>" . htmlspecialchars($row['region']) . "</td>
                        <td>
                            <a href='edit.php?id={$row['id_platillo']}' class='btn btn-edit'>Editar</a>
                            <a href='delete.php?id={$row['id_platillo']}' class='btn btn-delete' 
                               onclick='return confirm(\"¿Seguro que deseas eliminar este platillo?\");'>Eliminar</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No hay platillos registrados aún.</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<footer>
    <p>&copy; 2025 Eduardo Santiago Acosta Cárdenas | Instituto Tecnológico de Matehuala</p>
</footer>
</body>
</html>