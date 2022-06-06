<?php

include("conexion.php");
$con = conectar();

$documento = $_POST['cc'];
$descripcion = $_POST['descripcion'];
$grupo_sanguineo = $_POST['grupo_sanguineo'];
$RH = $_POST['RH'];




if ($documento == "" || $grupo_sanguineo == "---grupo sanguineo---" || $RH == "---factor RH---") {

    echo '<script>alert("debe de haber un documento, tipo de sangre y factor RH"); </script>';
} else {
    $sql = "UPDATE historia_clinica SET  cc='$documento',descripcion='$descripcion',  grupo_sanguineo='$grupo_sanguineo',RH='$RH' WHERE cc='$documento'";
    $query = mysqli_query($con, $sql);
    if ($query) {
        Header("Location: historia_clinica.php");
    }
}

