<?php
include("conexion.php");
$con = conectar();
if (isset($_POST['cc'])) {
    $documento = $_POST['cc'];
    $descripcion = $_POST['descripcion'];

    $grupo_sanguineo = $_POST['grupo_sanguineo'];
    $RH = $_POST['RH'];

    if ($documento == "" || $grupo_sanguineo == "---grupo sanguineo---" || $RH == "---factor RH---") {

        echo '<script>alert("debe de haber al menos un documento"); </script>';
    } else {
        $sql = "INSERT INTO historia_clinica VALUES('$documento','$descripcion', '$grupo_sanguineo', '$RH')";
        $query = mysqli_query($con, $sql);
        if ($query) {
            Header("Location: historia_clinica.php");
        }
    }

    echo "</div>";
}
