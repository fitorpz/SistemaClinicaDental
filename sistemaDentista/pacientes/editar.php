<?php
include('../includes/db.php');

// Obtener el ID del paciente
$id = $_GET['id'];

// Consultar los datos del paciente
$query = "SELECT * FROM pacientes WHERE id = $id";
$result = $conn->query($query);
$paciente = $result->fetch_assoc();

// Actualizar datos del paciente
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $telefono = $_POST['telefono'];

    $query = "UPDATE pacientes SET nombre = '$nombre', fecha_nacimiento = '$fecha_nacimiento', telefono = '$telefono' WHERE id = $id";
    if ($conn->query($query)) {
        header('Location: index.php');
        exit;
    } else {
        echo "Error al actualizar los datos del paciente: " . $conn->error;
    }
}

include('../includes/header.php');
?>

<h2>Editar Paciente</h2>

<form method="POST" action="">
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control" value="<?php echo $paciente['nombre']; ?>" required>
    </div>
    <div class="form-group">
        <label>Fecha de Nacimiento</label>
        <input type="date" name="fecha_nacimiento" class="form-control" value="<?php echo $paciente['fecha_nacimiento']; ?>" required>
    </div>
    <div class="form-group">
        <label>Teléfono</label>
        <input type="text" name="telefono" class="form-control" value="<?php echo $paciente['telefono']; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>
</form>

<?php include('../includes/footer.php'); ?>
