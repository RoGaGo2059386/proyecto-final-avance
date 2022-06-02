<?php
include("conexion.php");
$con = conectar();
if (isset($_POST['cc'])) {
    $documento = $_POST['cc'];
    $info_prueba = $_POST['info_prueba'];
    $incapacidad = $_POST['incapacidad'];
    $fecha_prueba = $_POST['fecha_prueba'];
    $fecha_sospecha = $_POST['fecha_sospecha'];
    $fecha_notificacion = $_POST['fecha_notificacion'];
    $fecha_fin_aislamiento = $_POST['fecha_fin_aislamiento'];


    if ($documento == "" || $fecha_prueba == "" || $fecha_sospecha == "" || $fecha_notificacion == "" || $fecha_fin_aislamiento == "") {

        echo '<script>alert("debe seleccionar un documento asociado y especificar las fechas la prueba"); </script>';
    } else {
        $sql = "INSERT INTO prueba_covid (cc, info_prueba, incapacidad, fecha_prueba, fecha_sospecha, fecha_notificacion, fecha_fin_aislamiento) VALUES('$documento','$info_prueba','$incapacidad','$fecha_prueba', '$fecha_sospecha', '$fecha_notificacion', '$fecha_fin_aislamiento')";
        $query = mysqli_query($con, $sql);
        if ($query) {
            Header("Location: prueba_covid.php");
        }
    }

    echo "</div>";
}
