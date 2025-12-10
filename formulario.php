<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opiniones - Sabores de Mi Tierra</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="formulario">
    <header class="header">
        <div class="logo">Sabores de Mi Tierra</div>
        <nav>
            <ul class="menu">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="historia.php">Historia</a></li>
                <li><a href="platillos.php">Platillos</a></li>
                <li><a href="tabla.php">Ingredientes</a></li>
                <li><strong>Opiniones</strong></li>
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
        <h1>¡Comparte tu Opinión!</h1>
    </section>

    <section class="content">
        <p>Este formulario nos ayuda a conocer tus platillos favoritos y sugerencias para mejorar el sitio. ¡Tus respuestas son muy valiosas!</p>

        <form action="#" method="post" style="background:white;padding:25px;border-radius:10px;">
            <label for="nombre">Nombre (opcional):</label>
            <input type="text" id="nombre" name="nombre" placeholder="Tu nombre">

            <label for="email">Correo (opcional):</label>
            <input type="email" id="email" name="email" placeholder="tu@email.com">

            <label for="platillo">Platillo favorito:</label>
            <select id="platillo" name="platillo">
                <option value="">Selecciona uno</option>
                <?php
                include 'config.php';
                $sql = "SELECT nombre FROM platillos ORDER BY nombre";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo "<option>" . htmlspecialchars($row['nombre']) . "</option>";
                }
                $conn->close();
                ?>
            </select>

            <label for="comentarios">Comentarios:</label>
            <textarea id="comentarios" name="comentarios" rows="5" placeholder="¿Qué te gustaría ver más?"></textarea>

            <button type="submit" style="margin-top:15px;padding:12px 30px;background:#8B4513;color:white;border:none;border-radius:8px;cursor:pointer;">
                Enviar Opinión
            </button>
        </form>
    </section>

    <footer>
        <p>© 2025 Eduardo Santiago Acosta Cárdenas | Instituto Tecnológico de Matehuala</p>
    </footer>
</body>
</html>