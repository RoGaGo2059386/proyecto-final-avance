<?php

include("conexion.php");
$con = conectar();

$id = $_POST['comID'];
$documento = $_POST['cc'];
$descripcion = $_POST['descripcion'];


$sql = "UPDATE comorbilidad SET  descripcion='$descripcion'  WHERE comID='$id' ";
$query = mysqli_query($con, $sql);

if ($query) {
    Header("Location: comorbilidad.php");
}
