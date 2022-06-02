<?php

include("conexion.php");
$con = conectar();

$id = $_GET['id'];

$sql = "DELETE FROM prueba_covid  WHERE pruebaID='$id'";
$query = mysqli_query($con, $sql);

if ($query) {
    Header("Location: prueba_covid.php");
}
