<?php
include('includes/db.php');
include('includes/header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $especialidad = $_POST['especialidad'];
    $telefono = $_POST['telefono'];

    $query = "INSERT INTO odontologos (nombre, especialidad, telefono) VALUES ('$nombre', '$especialidad', '$telefono')";
    if ($conn->query($query) === TRUE) {
        header('Location: index.php');
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}
?>

<h2 class="mb-4">Agregar Odontólogo</h2>
<form method="POST" action="agregar.php">
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
    <div class="form-group">
        <label for="especialidad">Especialidad</label>
        <input type="text" class="form-control" id="especialidad" name="especialidad">
    </div>
    <div class="form-group">
        <label for="telefono">Teléfono</label>
        <input type="text" class="form-control" id="telefono" name="telefono">
    </div>
    <button type="submit" class="btn btn-success">Agregar</button>
</form>

<?php include('includes/footer.php'); ?>
