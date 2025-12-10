<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingredientes - Sabores de Mi Tierra</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="tabla">
    <header class="header">
        <div class="logo">Sabores de Mi Tierra</div>
        <nav>
            <ul class="menu">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="historia.php">Historia</a></li>
                <li><a href="platillos.php">Platillos</a></li>
                <li><strong>Ingredientes</strong></li>
                <li><a href="formulario.php">Opiniones</a></li>
                <li><a href="multimedia.php">Multimedia</a></li>
                <li><a href="enlaces.php">Enlaces</a></li>
              
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

                <li style="margin-left: auto; margin-right: 12px;">
                <a href="usuarios/login.php" title="Panel de Administración" 
                    style="color: rgba(139, 69, 19, 0.9); font-size: 1.2em; text-decoration: none;">
                    <i class="fas fa-user"></i>
                </a>
                </li>

            </ul>
        </nav>
    </header>

    <section class="title-section">
        <h1>Ingredientes Tradicionales</h1>
    </section>

    <section class="content">
        <table>
            <thead>
                <tr>
                    <th>Ingrediente</th>
                    <th>Origen</th>
                    <th>Usos Principales</th>
                    <th>Platillo Ejemplo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT i.nombre, 'Mestizo/Indígena' AS origen, 'Varios' AS usos, p.nombre AS platillo 
                        FROM ingredientes i
                        LEFT JOIN receta_ingrediente ri ON i.id_ingrediente = ri.id_ingrediente
                        LEFT JOIN receta r ON ri.id_receta = r.id_receta
                        LEFT JOIN platillos p ON r.id_platillo = p.id_platillo";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . htmlspecialchars($row['nombre']) . "</td>
                            <td>{$row['origen']}</td>
                            <td>{$row['usos']}</td>
                            <td>" . ($row['platillo'] ? htmlspecialchars($row['platillo']) : 'Varios') . "</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No hay ingredientes registrados.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <footer>
        <p>© 2025 Eduardo Santiago Acosta Cárdenas | Instituto Tecnológico de Matehuala</p>
    </footer>
</body>
</html>