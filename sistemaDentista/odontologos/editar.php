<?php
include('db.php');
include('header.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM odontologos WHERE id = $id";
    $result = $conn->query($query);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nombre = $row['nombre'];
        $especialidad = $row['especialidad'];
        $telefono = $row['telefono'];
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $especialidad = $_POST['especialidad'];
    $telefono = $_POST['telefono'];

    $query = "UPDATE odontologos SET nombre = '$nombre', especialidad = '$especialidad', telefono = '$telefono' WHERE id = $id";
    if ($conn->query($query) === TRUE) {
        header('Location: ../index.php');
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}
?>

<h2 class="mb-4">Editar Odontólogo</h2>
<form method="POST" action="editar.php">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
    </div>
    <div class="form-group">
        <label for="especialidad">Especialidad</label>
        <input type="text" class="form-control" id="especialidad" name="especialidad" value="<?php echo $especialidad; ?>">
    </div>
    <div class="form-group">
        <label for="telefono">Teléfono</label>
        <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $telefono; ?>">
    </div>
    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
</form>

<?php include('footer.php'); ?>
