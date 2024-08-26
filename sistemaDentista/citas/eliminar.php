<?php
include('../includes/db.php');

// Obtener el ID de la cita
$id = $_GET['id'];

// Eliminar la cita
$query = "DELETE FROM citas WHERE id = $id";
if ($conn->query($query)) {
    header('Location: index.php');
    exit;
} else {
    echo "Error al eliminar la cita: " . $conn->error;
}
?>
