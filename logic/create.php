<?php
include('conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    $sql = "INSERT INTO usuarios (nombre, email, telefono) VALUES ('$nombre', '$email', '$telefono')";
    
    if ($conexion->query($sql) === TRUE) {
        header('Location: ../index.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}   
    else {
    header('Location: index.php');
    exit();
}
?>  