<?php
include('../includes/db.php');

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $telefono = $_POST['telefono'];

    // Insertar el nuevo paciente en la base de datos
    $query = "INSERT INTO pacientes (nombre, fecha_nacimiento, telefono) VALUES ('$nombre', '$fecha_nacimiento', '$telefono')";
    if ($conn->query($query)) {
        header('Location: index.php');
        exit;
    } else {
        echo "Error al agregar el paciente: " . $conn->error;
    }
}

include('../includes/header.php');
?>

<h2>Agregar Paciente</h2>

<form method="POST" action="">
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Fecha de Nacimiento</label>
        <input type="date" name="fecha_nacimiento" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Teléfono</label>
        <input type="text" name="telefono" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Agregar Paciente</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>
</form>

<?php include('../includes/footer.php'); ?>
