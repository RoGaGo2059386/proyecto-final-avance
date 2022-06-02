<?php
include("conexion.php");
$con = conectar();
$personal = "SELECT cc from trabajadores EXCEPT Select cc from historia_clinica";
$resultado = mysqli_query($con, $personal);



$id = $_GET['id'];

$sql = "SELECT * FROM prueba_covid WHERE pruebaID='$id'";
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
        <form action="actualizarPrueba.php" method="POST">

            <strong>informacion</strong><br />
            <textarea name="info_prueba" cols="38" rows="5" placeholder="informacion de la prueba"><?php echo $row['info_prueba']; ?></textarea>
            <br />
            <strong>¿Hubo incapacidad durante la prueba?</strong><br />
            <input type="radio" name="incapacidad" value="si">si<br />
            <input type="radio" name="incapacidad" value="no">no<br />
            <strong>Fecha de la prueba</strong><br />
            <input type="date" class="form-control mb-3" name="fecha_prueba" value="<?php echo $row['fecha_prueba']  ?>">
            <strong>Fecha del informe de sospecha</strong><br />
            <input type="date" class="form-control mb-3" name="fecha_sospecha" value="<?php echo $row['fecha_sospecha']  ?>">
            <strong>Fecha de la confirmacion</strong><br />
            <input type="date" class="form-control mb-3" name="fecha_notificacion" value="<?php echo $row['fecha_notificacion']  ?>">
            <strong>Fecha del fin del aislamiento</strong><br />
            <input type="date" class="form-control mb-3" name="fecha_fin_aislamiento" value="<?php echo $row['fecha_fin_aislamiento']  ?>">


            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
        </form>

    </div>
</body>

</html>