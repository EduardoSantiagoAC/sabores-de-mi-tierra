<?php include '../config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingredientes - Sabores de Mi Tierra</title>
    <link rel="stylesheet" href="../css/style-crud.css">
</head>
<body>

<header class="header">
    <div class="logo">Sabores de Mi Tierra</div>
    <ul class="menu">
        <li><a href="../index.php">Inicio</a></li>
        <li><a href="../platillos/index.php">Platillos</a></li>
        <li><a href="../recetas/index.php">Recetas</a></li>
        <li><a href="../regiones/index.php">Regiones</a></li>
        <li><strong>Ingredientes</strong></li>
        <li><a href="../usuarios/index.php">Usuarios</a></li>
    </ul>
</header>

<div class="content">
    <h1>Gestión de Ingredientes</h1>
    <a href="add.php" class="btn btn-add">+ Agregar Ingrediente</a>
    <a href="asignar.php" class="btn" style="background:#8B4513;color:white;margin-left:10px;">
        Asignar a Receta
    </a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Ingrediente</th>
                <th>Usado en</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT i.*, COUNT(ri.id_receta) as usadas 
                    FROM ingredientes i 
                    LEFT JOIN receta_ingrediente ri ON i.id_ingrediente = ri.id_ingrediente 
                    GROUP BY i.id_ingrediente 
                    ORDER BY i.nombre";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $puede_borrar = ($row['usadas'] == 0) ? "" : "onclick='return false;' style='opacity:0.5;' title='No se puede eliminar: está en uso'";
                    echo "<tr>
                        <td>{$row['id_ingrediente']}</td>
                        <td>" . htmlspecialchars($row['nombre']) . "</td>
                        <td>{$row['usadas']} receta(s)</td>
                        <td>
                            <a href='edit.php?id={$row['id_ingrediente']}' class='btn btn-edit'>Editar</a>
                            <a href='delete.php?id={$row['id_ingrediente']}' class='btn btn-delete' $puede_borrar>
                                Eliminar
                            </a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No hay ingredientes registrados.</td></tr>";
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