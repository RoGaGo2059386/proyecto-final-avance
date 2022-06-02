<?php

include("conexion.php");
$con = conectar();

$id = $_GET['id'];

$sql = "DELETE FROM medicacion  WHERE medID='$id'";
$query = mysqli_query($con, $sql);

if ($query) {
    Header("Location: medicacion.php");
}
