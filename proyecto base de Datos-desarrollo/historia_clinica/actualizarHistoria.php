<?php

include("conexion.php");
$con = conectar();

$documento = $_POST['cc'];
$descripcion = $_POST['descripcion'];
$comorbilidad_1 = $_POST['comorbilidad_1'];
$comorbilidad_2 = $_POST['comorbilidad_2'];
$comorbilidad_3 = $_POST['comorbilidad_3'];
$medicacion = $_POST['medicacion'];
$grupo_sanguineo = $_POST['grupo_sanguineo'];
$RH = $_POST['RH'];
$restriccion_medica = $_POST['restriccion_medica'];

$sql = "UPDATE historia_clinica SET  cc='$documento',descripcion='$descripcion',comorbilidad_1='$comorbilidad_1',comorbilidad_2='$comorbilidad_2', comorbilidad_3='$comorbilidad_3', medicacion='$medicacion', grupo_sanguineo='$grupo_sanguineo',RH='$RH',restriccion_medica='$restriccion_medica' WHERE cc='$documento'";
$query = mysqli_query($con, $sql);

if ($query) {
    Header("Location: historia_clinica.php");
}
