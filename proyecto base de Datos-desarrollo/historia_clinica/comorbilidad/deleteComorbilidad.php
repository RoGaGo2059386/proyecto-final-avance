<?php

include("conexion.php");
$con = conectar();

$id = $_GET['id'];

$sql = "DELETE FROM comorbilidad  WHERE comID='$id'";
$query = mysqli_query($con, $sql);

if ($query) {
    Header("Location: comorbilidad.php");
}
