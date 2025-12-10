<?php 
// Eduardo Santiago Acosta Cardenas
include '../config.php'; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Recetas - Sabores de Mi Tierra</title>
    <!-- Ruta para el archivo css de estilos almacenado en otra carpeta -->
    <link rel="stylesheet" href="../css/style-crud.css"> 
</head>
<body>

<header class="header">
    <div class="logo">Sabores de Mi Tierra</div>
    <ul class="menu">
        <li><a href="../index.php">Inicio</a></li>
        <li><a href="../platillos/index.php">Platillos</a></li>
        <li><strong>Recetas</strong></li>
        <li><a href="../regiones/index.php">Regiones</a></li>
        <li><a href="../ingredientes/index.php">Ingredientes</a></li>
        <li><a href="../usuarios/index.php">Usuarios</a></li>
    </ul>
</header>

<div class="content">
    <h1>Gestión de Recetas</h1>
    <!-- Botón para agregar nueva receta -->
    <a href="add.php" class="btn btn-add">+ Agregar Receta</a>

    <!-- Tabla para mostrar las recetas almacenadas -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Platillo</th>
                <th>Ingredientes (vista previa)</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Consulta SQL que obtiene el ID de receta, nombre del platillo
            // y una vista previa de los ingredientes
            $sql = "SELECT r.id_receta, p.nombre AS platillo, LEFT(r.ingredientes, 80) AS preview_ing
                    FROM receta r
                    JOIN platillos p ON r.id_platillo = p.id_platillo
                    ORDER BY p.nombre";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

            
                while($row = $result->fetch_assoc()) {

                    // Se imprime cada receta como una fila en la tabla
                    echo "<tr>
                        <td>{$row['id_receta']}</td>
                        <td>{$row['platillo']}</td>
                        <!-- Se usa htmlspecialchars para evitar inyección de HTML -->
                        <td>" . htmlspecialchars($row['preview_ing']) . "...</td>
                        <td>
                            <!-- Botón para editar la receta -->
                            <a href='edit.php?id={$row['id_receta']}' class='btn btn-edit'>Editar</a>
                            
                            <!-- Botón para eliminar la receta, con confirmación -->
                            <a href='delete.php?id={$row['id_receta']}' class='btn btn-delete'
                               onclick='return confirm(\"¿Eliminar esta receta?\");'>Eliminar</a>
                        </td>
                    </tr>";
                }
            } else {
                // Si no hay recetas registradas aún
                echo "<tr><td colspan='4'>No hay recetas aún. ¡Agrega la primera!</td></tr>";
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
