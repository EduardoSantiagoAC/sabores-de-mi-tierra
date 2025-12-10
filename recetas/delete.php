<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $sql_check = "SELECT p.nombre FROM receta r JOIN platillos p ON r.id_platillo = p.id_platillo WHERE r.id_receta = $id";
    $result = $conn->query($sql_check);
    $platillo = $result->fetch_assoc();

    $sql = "DELETE FROM receta WHERE id_receta = $id";

    if ($conn->query($sql) === TRUE) {
 
        header("Location: index.php");
        exit();
    } else {
        echo "Error al eliminar la receta: " . $conn->error;
    }
} else {
    header("Location: index.php");
    exit();
}

$conn->close();
?>