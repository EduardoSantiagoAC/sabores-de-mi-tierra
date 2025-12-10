<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM platillos WHERE id_platillo=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al eliminar: " . $conn->error;
    }
} else {
    header("Location: index.php");
    exit();
}
$conn->close();
?>