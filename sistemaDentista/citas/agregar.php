<?php
include('../includes/db.php');

// Obtener los pacientes y odontólogos para los select
$pacientes = $conn->query("SELECT id, nombre FROM pacientes");
$odontologos = $conn->query("SELECT id, nombre FROM odontologos");

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_paciente = $_POST['id_paciente'];
    $id_odontologo = $_POST['id_odontologo'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $descripcion = $_POST['descripcion'];

    // Insertar la nueva cita en la base de datos
    $query = "INSERT INTO citas (id_paciente, id_odontologo, fecha, hora, descripcion) 
              VALUES ('$id_paciente', '$id_odontologo', '$fecha', '$hora', '$descripcion')";
    if ($conn->query($query)) {
        header('Location: index.php');
        exit;
    } else {
        echo "Error al agregar la cita: " . $conn->error;
    }
}

include('../includes/header.php');
?>

<h2>Agregar Cita</h2>

<form method="POST" action="">
    <div class="form-group">
        <label>Paciente</label>
        <select name="id_paciente" class="form-control" required>
            <option value="">Seleccione un Paciente</option>
            <?php while ($row = $pacientes->fetch_assoc()) { ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label>Odontólogo</label>
        <select name="id_odontologo" class="form-control" required>
            <option value="">Seleccione un Odontólogo</option>
            <?php while ($row = $odontologos->fetch_assoc()) { ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label>Fecha</label>
        <input type="date" name="fecha" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Hora</label>
        <input type="time" name="hora" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Descripción</label>
        <textarea name="descripcion" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-success">Agregar Cita</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>
</form><br>

<?php include('../includes/footer.php'); ?>
