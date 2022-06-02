<?php
include("conexion.php");
$con = conectar();
$personal = "SELECT cc from trabajadores EXCEPT Select cc from historia_clinica";
$resultado = mysqli_query($con, $personal);



$id = $_GET['id'];

$sql = "SELECT * FROM historia_clinica WHERE cc='$id'";
$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <title>Actualizar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>

<body>
    <div class="container mt-5">
        <form action="actualizarHistoria.php" method="POST">

            <textarea name="descripcion" cols="38" rows="5" placeholder="descripcion" width:600px><?php echo $row['descripcion']; ?></textarea>

            <select name="grupo_sanguineo">
                <option>---grupo sanguineo---</option>
                <option>A</option>
                <option>B</option>
                <option>AB</option>
                <option>O</option>
            </select>
            <select name="RH">
                <option>---factor RH---</option>
                <option>+</option>
                <option>-</option>
            </select>

            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
        </form>

    </div>
</body>

</html>