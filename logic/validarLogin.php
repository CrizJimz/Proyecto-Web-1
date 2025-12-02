<?php

    session_start();
    include('./conexion.php');
    $usuario = $_POST['admin'];
    $password = $_POST['password'];

    $q = "SELECT COUNT(*) as contar FROM Admins WHERE username ='$usuario' AND password ='$password'";

    $consulta = mysqli_query($conexion,$q);
    $array = mysqli_fetch_array($consulta);
  
    if( $array['contar']>0){
        $_SESSION['usuario'] = $usuario;
        header("location: ../index.php");
    }
    else {
    header("location: ../iniciar_sesion.php");
    }
?>