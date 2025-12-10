<?php include 'auth/session.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Sabores de Mi Tierra</title>
    <link rel="stylesheet" href="css/style-crud.css">
</head>
<body>

<header class="header">
    <div class="logo">Sabores de Mi Tierra - Panel Admin</div>
    <ul class="menu">
        <li>Bienvenido, <strong><?php echo $_SESSION['user_name']; ?></strong></li>
        <li><a href="platillos/index.php">Platillos</a></li>
        <li><a href="recetas/index.php">Recetas</a></li>
        <li><a href="regiones/index.php">Regiones</a></li>
        <li><a href="ingredientes/index.php">Ingredientes</a></li>
        <li><a href="usuarios/index.php">Usuarios</a></li>
        <li><a href="usuarios/logout.php" style="color:#B22222;">Cerrar Sesión</a></li>
    </ul>
</header>

<div class="content" style="text-align:center; padding:50px 20px;">
    <h1 style="font-size:2.8em; color:#8B4513;">Panel de Administración</h1>
    <p style="font-size:1.3em; color:#666; margin:20px 0;">
        Gestión completa del sistema gastronómico potosino<br>
        <small>Proyecto Final - Programación Web | 7° Semestre ISC</small>
    </p>

    <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap:30px; margin:60px auto; max-width:1200px;">
        
        <a href="platillos/index.php" class="btn" style="padding:40px; font-size:1.5em; background:#8B4513; color:white; text-decoration:none;">
            Platillos<br><small>Crear, editar y eliminar platillos</small>
        </a>

        <a href="recetas/index.php" class="btn" style="padding:40px; font-size:1.5em; background:#D2691E; color:white; text-decoration:none;">
            Recetas<br><small>Ingredientes y pasos de preparación</small>
        </a>

        <a href="regiones/index.php" class="btn" style="padding:40px; font-size:1.5em; background:#A0522D; color:white; text-decoration:none;">
            Regiones<br><small>Gestión de regiones potosinas</small>
        </a>

        <a href="ingredientes/index.php" class="btn" style="padding:40px; font-size:1.5em; background:#CD853F; color:white; text-decoration:none;">
            Ingredientes<br><small>Base de datos + asignación a recetas</small>
        </a>

    </div>

    <div style="margin-top:60px; padding:20px; background:#f9f9f9; border-radius:10px;">
        <p><strong>Alumno:</strong> Eduardo Santiago Acosta Cárdenas | <strong>No. Control:</strong> 22660221</p>
        <p><strong>Materia:</strong> Programación Web | <strong>Semestre:</strong> Séptimo</p>
        <p><strong>Docente:</strong> Mtra. Coronado Rosales Martha Beatriz</p>
        <p><strong>Fecha de entrega:</strong> Diciembre 2025</p>
    </div>
</div>

<footer>
    <p>© 2025 Eduardo Santiago Acosta Cárdenas | Instituto Tecnológico de Matehuala</p>
</footer>
</body>
</html>