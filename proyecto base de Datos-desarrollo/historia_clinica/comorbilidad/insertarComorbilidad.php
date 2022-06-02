<?php
include("conexion.php");
$con = conectar();
if (isset($_POST['cc'])) {

    $documento = $_POST['cc'];
    $descripcion = $_POST['descripcion'];


    if ($documento == "" || $descripcion == "") {

        echo '<script>alert("debe llenar toda la informacion"); </script>';
    } else {
        $sql = "INSERT INTO comorbilidad(cc, descripcion) VALUES('$documento','$descripcion')";
        $query = mysqli_query($con, $sql);
        if ($query) {
            Header("Location: comorbilidad.php");
        }
    }

    echo "</div>";
}
