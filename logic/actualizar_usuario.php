<?php
include('./logic/conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    if (empty($nombre) || empty($email) || empty($telefono)) {
        echo "Error: Campos vacios no permitidos";
        exit(); // Detenemos el script
    }

    // Sentencia preparada para seguridad
    $stmt = $conexion->prepare("UPDATE usuarios SET nombre=?, email=?, telefono=? WHERE id=?");
    $stmt->bind_param("sssi", $nombre, $email, $telefono, $id);

    if ($stmt->execute()) {
        echo "OK";
    } else {
        http_response_code(500);
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
    $conexion->close();
}
?>