<?php
include('../includes/db.php');

// Obtener el ID de la cita
$id = $_GET['id'];

// Obtener los pacientes y odontólogos para los select
$pacientes = $conn->query("SELECT id, nombre FROM pacientes");
$odontologos = $conn->query("SELECT id, nombre FROM odontologos");

// Consultar los datos de la cita
$query = "SELECT * FROM citas WHERE id = $id";
$result = $conn->query($query);
$cita = $result->fetch_assoc();

// Actualizar datos de la cita
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_paciente = $_POST['id_paciente'];
    $id_odontologo = $_POST['id_odontologo'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $descripcion = $_POST['descripcion'];

    $query = "UPDATE citas SET id_paciente = '$id_paciente', id_odontologo = '$id_odontologo', fecha = '$fecha', hora = '$hora', descripcion = '$descripcion' WHERE id = $id";
    if ($conn->query($query)) {
        header('Location: index.php');
        exit;
    } else {
        echo "Error al actualizar la cita: " . $conn->error;
    }
}

include('../includes/header.php');
?>

<h2>Editar Cita</h2>

<form method="POST" action="">
    <div class="form-group">
        <label>Paciente</label>
        <select name="id_paciente" class="form-control" required>
            <?php while ($row = $pacientes->fetch_assoc()) { ?>
                <option value="<?php echo $row['id']; ?>" <?php echo $row['id'] == $cita['id_paciente'] ? 'selected' : ''; ?>>
                    <?php echo $row['nombre']; ?>
                </option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label>Odontólogo</label>
        <select name="id_odontologo" class="form-control" required>
            <?php while ($row = $odontologos->fetch_assoc()) { ?>
                <option value="<?php echo $row['id']; ?>" <?php echo $row['id'] == $cita['id_odontologo'] ? 'selected' : ''; ?>>
                    <?php echo $row['nombre']; ?>
                </option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label>Fecha</label>
        <input type="date" name="fecha" class="form-control" value="<?php echo $cita['fecha']; ?>" required>
    </div>
    <div class="form-group">
        <label>Hora</label>
        <input type="time" name="hora" class="form-control" value="<?php echo $cita['hora']; ?>" required>
    </div>
    <div class="form-group">
        <label>Descripción</label>
        <textarea name="descripcion" class="form-control" required><?php echo $cita['descripcion']; ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>
</form>

<?php include('../includes/footer.php'); ?>
