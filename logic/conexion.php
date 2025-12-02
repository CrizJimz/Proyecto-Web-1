<?php
$host = "sql100.infinityfree.com";
$user = "if0_40500748";
$password = "e3v7oaueTLcHbU";
$dbname = "if0_40500748_proyecto";

$conexion = new mysqli($host,$user,$password,$dbname);

if($conexion -> connect_error){
    die('Error en la conexion a la DB :( : '.$conexion -> connect_error);
}else{
}


?>