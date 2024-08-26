<?php
include('../includes/db.php');

// Obtener el ID del paciente
$id = $_GET['id'];

// Eliminar el paciente
$query = "DELETE FROM pacientes WHERE id = $id";
if ($conn->query($query)) {
    header('Location: index.php');
    exit;
} else {
    echo "Error al eliminar el paciente: " . $conn->error;
}
?>
