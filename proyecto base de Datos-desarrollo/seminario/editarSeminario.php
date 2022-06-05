<?php
include("conexion.php");
$con = conectar();

$id = $_GET['id'];

$sql = "SELECT * FROM seminario WHERE seminario_id='$id'";
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
        <form action="actualizarSeminario.php" method="POST">



            <input type="hidden" class="form-control mb-3" name="seminario_id" value="<?php echo $row['seminario_id']  ?>">
            <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre" value="<?php echo $row['nombre']  ?>">
            <textarea name="objetivo" cols="38" rows="5" placeholder="objetivo" width:600px><?php echo $row['objetivo']; ?></textarea>
            <textarea name="descripcion" cols="38" rows="5" placeholder="descripcion" width:600px><?php echo $row['descripcion']; ?></textarea>
            <textarea name="poblacion_dirigida" cols="38" rows="5" placeholder="poblacion_dirigida" width:600px><?php echo $row['poblacion_dirigida']; ?></textarea>

            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
        </form>

    </div>
</body>

</html>