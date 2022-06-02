<?php
function conectar()
{
    $host = "localhost";
    $user = "root";
    $pass = "";

    $bd = "basededatos";

    $con = mysqli_connect($host, $user, $pass) or die("problemas en el servidor :(");

    mysqli_select_db($con, $bd) or die("problemas con la base de datos:(");

    return $con;
}
