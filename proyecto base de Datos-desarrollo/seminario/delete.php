<?php

include("conexion.php");
$con = conectar();

$id = $_GET['id'];

$sql = "DELETE FROM seminario  WHERE seminario_id='$id'";
$query = mysqli_query($con, $sql);

if ($query) {
    Header("Location: seminario.php");
}
