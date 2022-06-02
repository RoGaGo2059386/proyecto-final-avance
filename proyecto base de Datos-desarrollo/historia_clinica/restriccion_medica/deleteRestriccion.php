<?php

include("conexion.php");
$con = conectar();

$id = $_GET['id'];

$sql = "DELETE FROM restriccion  WHERE resID='$id'";
$query = mysqli_query($con, $sql);

if ($query) {
    Header("Location: restriccion.php");
}
