<?php
include('conexion.php');

$id = $_GET['id'];
$sql = "DELETE FROM usuarios WHERE id=$id";

if ($conexion->query($sql) === TRUE) {
    header('Location: ../index.php');
    exit();
} else {
    echo "Error: " . $conexion->error;
}
?>