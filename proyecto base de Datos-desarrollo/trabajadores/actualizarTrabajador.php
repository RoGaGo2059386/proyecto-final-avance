<?php

include("conexion.php");
$con = conectar();

$documento = $_POST['cc'];
$nombre = $_POST['nombre'];
$cargo = $_POST['cargo'];

$sql = "UPDATE trabajadores SET  cc='$documento',nombre='$nombre',cargo='$cargo' WHERE cc='$documento'";
$query = mysqli_query($con, $sql);

if ($query) {
    Header("Location: trabajadores.php");
}
