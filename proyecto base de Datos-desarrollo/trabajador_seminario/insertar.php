<?php
include("conexion.php");
$con = conectar();

if (isset($_POST['trabajador_id'])) {
    $trabajador_id = $_POST['trabajador_id'];
    $seminario_id = $_POST['seminario_id'];
    $query = "SELECT *  from trabajador_seminario where trabajador_id='$trabajador_id' and seminario_id='$seminario_id'";
    $resultado = mysqli_query($con, $query);

    if ($trabajador_id == "" || $seminario_id == "" ) {

        echo '<script>alert("debe seleccionar un trabajador y un seminario"); </script>';
    }
    if($resultado->num_rows > 0){
        echo '<script>alert("ya existe este registro"); </script>';
    } else {
        $sql = "INSERT INTO trabajador_seminario VALUES('$trabajador_id','$seminario_id')";
        $query = mysqli_query($con, $sql);
        if ($query) {
            Header("Location: trabajador_seminario.php");
        }
    }

    echo "</div>";
}
