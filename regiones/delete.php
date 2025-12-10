<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Gracias al ON DELETE CASCADE, se borrarán también los platillos asociados, asi evitamos platillos con regiones fantasma
    $sql = "DELETE FROM regiones WHERE id_region = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    header("Location: index.php");
}
$conn->close();
?>