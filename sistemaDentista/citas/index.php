<?php
include('../includes/db.php');
include('../includes/header.php');

$query = "SELECT c.id, p.nombre AS paciente, o.nombre AS odontologo, c.fecha, c.hora, c.descripcion 
          FROM citas c 
          JOIN pacientes p ON c.id_paciente = p.id 
          JOIN odontologos o ON c.id_odontologo = o.id";
$result = $conn->query($query);
?>

<h2 class="mb-4">Gestión de Citas</h2>
<a href="agregar.php" class="btn btn-success mb-3">Agregar Cita</a>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Paciente</th>
                <th>Odontólogo</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['paciente']; ?></td>
                    <td><?php echo $row['odontologo']; ?></td>
                    <td><?php echo $row['fecha']; ?></td>
                    <td><?php echo $row['hora']; ?></td>
                    <td><?php echo $row['descripcion']; ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Editar</a>
                        <a href="eliminar.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include('../includes/footer.php'); ?>
