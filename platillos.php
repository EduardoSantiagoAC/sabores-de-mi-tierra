<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Platillos - Sabores de Mi Tierra</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="platillos">
    <header class="header">
        <div class="logo">Sabores de Mi Tierra</div>
        <nav>
            <ul class="menu">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="historia.php">Historia</a></li>
                <li><strong>Platillos</strong></li>
                <li><a href="tabla.php">Ingredientes</a></li>
                <li><a href="formulario.php">Opiniones</a></li>
                <li><a href="multimedia.php">Multimedia</a></li>
                <li><a href="enlaces.php">Enlaces</a></li>
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
        <h1>Platillos Emblemáticos de San Luis Potosí</h1>
    </section>

    <section class="content">
        <p>Haz clic en un platillo para ver su historia o <strong>descarga la receta completa en PDF</strong>.</p>

        <div class="dish-grid">
            <?php
            $sql = "SELECT p.id_platillo, p.nombre, p.descripcion FROM platillos p ORDER BY p.nombre";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $id = $row['id_platillo'];
                    $nombre = htmlspecialchars($row['nombre']);
                    $descripcion = htmlspecialchars($row['descripcion']);
                    echo "<div class='dish-card'>
                        <h3>$nombre</h3>
                        <p>$descripcion</p>
                        <div style='margin-top:12px; display:flex; gap:10px; justify-content:center;'>
                            <button onclick='openModal(\"$nombre\")' 
                                    style='padding:8px 16px; background:#D2691E; color:white; border:none; border-radius:5px; cursor:pointer; font-size:0.9em;'>
                                Ver Historia
                            </button>
                            <a href='generar_pdf.php?id=$id' target='_blank'
                               style='padding:8px 16px; background:#8B4513; color:white; text-decoration:none; border-radius:5px; font-size:0.9em;'>
                                Descargar PDF
                            </a>
                        </div>
                      </div>";
                }
            } else {
                echo "<p style='text-align:center; color:#666; grid-column:1/-1;'>No hay platillos registrados aún.</p>";
            }
            $conn->close();
            ?>
        </div>
    </section>

    <!-- Modal para historia -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="document.getElementById('modal').style.display='none'">×</span>
            <h2 id="modalTitle"></h2>
            <p id="modalText">Historia próximamente disponible...</p>
        </div>
    </div>

    <footer>
        <p>© 2025 Eduardo Santiago Acosta Cárdenas | Instituto Tecnológico de Matehuala</p>
    </footer>

    <script>
        function openModal(title) {
            document.getElementById('modalTitle').textContent = title;
            document.getElementById('modalText').textContent = 'Historia próximamente disponible...';
            document.getElementById('modal').style.display = 'block';
        }
        window.onclick = function(e) {
            if (e.target == document.getElementById('modal')) {
                document.getElementById('modal').style.display = 'none';
            }
        }
    </script>
</body>
</html>