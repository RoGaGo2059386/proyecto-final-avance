<?php
include("conexion.php");
$con = conectar();
$id = $_GET['id'];
$sql = "SELECT info_prueba FROM prueba_covid WHERE pruebaID='$id'";

$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_assoc($result)) {

  echo $row['info_prueba'];
}
