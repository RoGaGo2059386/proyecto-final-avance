<?php
include("conexion.php");
$con = conectar();
if (isset($_POST['cc'])) {
    $documento = $_POST['cc'];
    $descripcion = $_POST['descripcion'];
    $comorbilidad_1 = $_POST['comorbilidad_1'];
    $comorbilidad_2 = $_POST['comorbilidad_2'];
    $comorbilidad_3 = $_POST['comorbilidad_3'];
    $medicacion = $_POST['medicacion'];
    $restriccion_medica = $_POST['restriccion_medica'];
    $grupo_sanguineo = $_POST['grupo_sanguineo'];
    $RH = $_POST['RH'];

    if ($documento == "" || $grupo_sanguineo == "---grupo sanguineo---" || $RH == "---factor RH---") {

        echo '<script>alert("MENSAJE DE ERROR"); </script>';
    } else {
        $sql = "INSERT INTO historia_clinica VALUES('$documento','$descripcion','$comorbilidad_1','$comorbilidad_2', '$comorbilidad_3', '$medicacion', '$grupo_sanguineo', '$RH','$restriccion_medica')";
        $query = mysqli_query($con, $sql);
        if ($query) {
            Header("Location: historia_clinica.php");
        }
    }

    echo "</div>";
}
