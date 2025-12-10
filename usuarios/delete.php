<?php
include '../auth/session.php';
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // No permitas borrar tu propio usuario
    if ($id == $_SESSION['user_id']) {
        header("Location: index.php?error=no_self_delete");
        exit();
    }
    $sql = "DELETE FROM usuarios WHERE id_usuario = $id";
    $conn->query($sql);
}
header("Location: index.php");
exit();