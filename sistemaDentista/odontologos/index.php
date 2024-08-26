<?php
include('../includes/db.php');
include('../includes/header.php');

$query = "SELECT * FROM odontologos";
$result = $conn->query($query);
?>

<h2 class="mb-4">Gestión de Odontólogos</h2>
<a href="agregar.php" class="btn btn-success mb-3">Agregar Odontólogo</a>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Nombre</th>
                <th>Especialidad</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['especialidad']; ?></td>
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
