<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sabores de Mi Tierra - Gastronomía Potosina</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="index">
    <header class="header">
        <div class="logo">Sabores de Mi Tierra</div>
        <nav>
            <ul class="menu">
                <li><strong>Inicio</strong></li>
                <li><a href="historia.php">Historia</a></li>
                <li><a href="platillos.php">Platillos</a></li>
                <li><a href="tabla.php">Ingredientes</a></li>
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
        <h1>Sabores de Mi Tierra</h1>
    </section>

    <section class="hero">
        <img src="https://tse3.mm.bing.net/th/id/OIP.kKdzs7o6rYrdPAf4WgiOpQHaGn?cb=12&rs=1&pid=ImgDetMain&o=7&rm=3" alt="Gastronomía potosina">
        <div class="hero-overlay">
            <h2>Un recorrido por la gastronomía tradicional de San Luis Potosí</h2>
            <p>Descubre la rica herencia cultural a través de sabores ancestrales y mestizos.</p>
        </div>
    </section>

    <section class="content">
        <div class="intro">
            <p>¡Bienvenido a <strong>Sabores de Mi Tierra</strong>! Explora la gastronomía tradicional de San Luis Potosí: desde el zacahuil huasteco hasta las enchiladas potosinas. Conoce su historia, ingredientes y preparación.</p>
            <a href="platillos.php" class="cta-button">Explorar Platillos</a>
        </div>

        <div class="cards-container">
            <div class="card">
                <h3>Historia</h3>
                <p>Orígenes prehispánicos y la fusión mestiza que define nuestra cocina.</p>
                <a href="historia.php">Ver más →</a>
            </div>
            <div class="card">
                <h3>Platillos</h3>
                <p>Los más representativos de cada región del estado.</p>
                <a href="platillos.php">Ver más →</a>
            </div>
            <div class="card">
                <h3>Ingredientes</h3>
                <p>Conoce los productos clave de nuestra tradición culinaria.</p>
                <a href="tabla.php">Ver más →</a>
            </div>
        </div>
    </section>

    <footer>
        <p>© 2025 Eduardo Santiago Acosta Cárdenas | Instituto Tecnológico de Matehuala</p>
    </footer>
</body>
</html>