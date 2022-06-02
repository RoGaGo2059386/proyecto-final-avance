<?php

include("conexion.php");
$con = conectar();

$id = $_POST['pruebaID'];
$documento = $_POST['cc'];
$info_prueba = $_POST['info_prueba'];
$incapacidad = $_POST['incapacidad'];
$fecha_prueba = $_POST['fecha_prueba'];
$fecha_sospecha = $_POST['fecha_sospecha'];
$fecha_notificacion = $_POST['fecha_notificacion'];
$fecha_fin_aislamiento = $_POST['fecha_fin_aislamiento'];


$sql = "UPDATE prueba_covid SET  info_prueba='$info_prueba',incapacidad='$incapacidad',fecha_prueba='$fecha_prueba', fecha_sospecha='$fecha_sospecha', fecha_notificacion='$fecha_notificacion', fecha_fin_aislamiento='$fecha_fin_aislamiento' WHERE pruebaID='$id'";
$query = mysqli_query($con, $sql);

if ($query) {
    Header("Location: prueba_covid.php");
}
