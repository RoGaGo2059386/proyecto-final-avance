<?php
include("conexion.php");
$con = conectar();
$id = $_GET['id'];
$sql = "SELECT descripcion FROM historia_clinica WHERE cc='$id'";

$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_assoc($result)) {

  echo $row['descripcion'];
}
