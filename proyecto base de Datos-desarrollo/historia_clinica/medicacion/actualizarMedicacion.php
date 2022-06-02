<?php

include("conexion.php");
$con = conectar();

$id = $_POST['medID'];
$documento = $_POST['cc'];
$descripcion = $_POST['descripcion'];


$sql = "UPDATE medicacion SET  descripcion='$descripcion'  WHERE medID='$id' ";
$query = mysqli_query($con, $sql);

if ($query) {
    Header("Location: medicacion.php");
}
