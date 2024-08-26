<?php
include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM odontologos WHERE id = $id";
    if ($conn->query($query) === TRUE) {
        header('Location: ../index.php');
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}
?>
