<?php
include("conexion.php");
$con = conectar();
$id = $_GET['id'];
$sql = "SELECT descripcion FROM restriccion WHERE resID='$id'";

$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_assoc($result)) {

  echo $row['descripcion'];
}
