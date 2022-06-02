<?php

include("conexion.php");
$con = conectar();

$id = $_POST['resID'];
$documento = $_POST['cc'];
$descripcion = $_POST['descripcion'];


$sql = "UPDATE restriccion SET  descripcion='$descripcion'  WHERE resID='$id' ";
$query = mysqli_query($con, $sql);

if ($query) {
    Header("Location: restriccion.php");
}
