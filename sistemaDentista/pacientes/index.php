<?php
include('../includes/db.php');
include('../includes/header.php');

$query = "SELECT * FROM pacientes";
$result = $conn->query($query);
?>

<h2 class="mb-4">Gestión de Pacientes</h2>
<a href="agregar.php" class="btn btn-success mb-3">Agregar Paciente</a>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Nombre</th>
                <th>Fecha de Nacimiento</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['fecha_nacimiento']; ?></td>
                    <td><?php echo $row['telefono']; ?></td>
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
