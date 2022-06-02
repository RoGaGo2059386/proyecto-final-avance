<?php

include("conexion.php");
$con = conectar();

$cc = $_GET['id'];

$sql = "DELETE FROM trabajadores  WHERE cc='$cc'";
$query = mysqli_query($con, $sql);

if ($query) {
    Header("Location: trabajadores.php");
}
