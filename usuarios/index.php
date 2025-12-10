<?php include '../auth/session.php'; ?>
<?php include '../config.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
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
        <li><a href="../ingredientes/index.php">Ingredientes</a></li>
        <li><strong>Usuarios</strong></li>
        <li><a href="logout.php" style="color:#B22222;">Cerrar Sesión</a></li>
    </ul>
</header>

<div class="content">
    <h1>Gestión de Usuarios</h1>
    <a href="add.php" class="btn btn-add">+ Agregar Usuario</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Fecha Registro</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM usuarios ORDER BY fecha_registro DESC";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id_usuario']}</td>
                    <td>" . htmlspecialchars($row['nombre']) . "</td>
                    <td>" . htmlspecialchars($row['email']) . "</td>
                    <td><strong>" . ucfirst($row['rol']) . "</strong></td>
                    <td>{$row['fecha_registro']}</td>
                    <td>
                        <a href='edit.php?id={$row['id_usuario']}' class='btn btn-edit'>Editar</a>
                        <a href='delete.php?id={$row['id_usuario']}' class='btn btn-delete'
                           onclick='return confirm(\"¿Eliminar este usuario?\");'>Eliminar</a>
                    </td>
                </tr>";
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