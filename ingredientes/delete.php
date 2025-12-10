<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Verificamos si está en uso
    $check = $conn->query("SELECT * FROM receta_ingrediente WHERE id_ingrediente = $id");
    if ($check->num_rows > 0) {
        header("Location: index.php?error=ingrediente_en_uso");
        exit();
    }

    $sql = "DELETE FROM ingredientes WHERE id_ingrediente = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
$conn->close();
?>