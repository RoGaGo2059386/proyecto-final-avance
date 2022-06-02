<?php
include("conexion.php");
$con = conectar();
$id = $_GET['id'];
$sql = "SELECT descripcion FROM comorbilidad WHERE cc='$id'";

$result = mysqli_query($con, $sql);
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        echo "<br> DESCRIPCION: " . $row["descripcion"] . "<br>";
    }
} else {
    echo "no hay resultados";
}
