<?php

include("conexion.php");
$con = conectar();

$id = $_POST['seminario_id'];
$nombre = $_POST['nombre'];
$objetivo = $_POST['objetivo'];
$descripcion = $_POST['descripcion'];
$poblacion_dirigida = $_POST['poblacion_dirigida'];

$sql = "UPDATE seminario SET  nombre='$nombre',objetivo='$objetivo',descripcion='$descripcion', poblacion_dirigida='$poblacion_dirigida' WHERE seminario_id='$id'";
$query = mysqli_query($con, $sql);

if ($query) {
    Header("Location: seminario.php");
}
