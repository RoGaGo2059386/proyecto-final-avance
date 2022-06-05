<?php
include("conexion.php");
$con = conectar();
$personal = "SELECT cc from trabajadores EXCEPT Select cc from historia_clinica";
$resultado = mysqli_query($con, $personal);
$sql = "SELECT *  FROM historia_clinica INNER JOIN trabajadores ON historia_clinica.cc=trabajadores.cc";
$query = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Historia clinica</title>
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <h1>crear historia clinica</h1>
                <form action="insertarHistoria.php" method="POST">

                    <select name="cc">
                        <option>---cedula asociada---</option>
                        <?php while ($row1 = mysqli_fetch_array($resultado)) :; ?>
                            <option><?php echo $row1[0]; ?></option>
                        <?php endwhile; ?>
                    </select>
                    <textarea name="descripcion" cols="38" rows="5" placeholder="descripcion"></textarea>

                    <th><a href="comorbilidad/comorbilidad.php" class=" btn btn-info">agregar comorbilidad</a></br>
                    <th><a href="medicacion/medicacion.php" class=" btn btn-info">agregar medicacion</a></th>
                    <th><a href="restriccion/restriccion.php" class=" btn btn-info">agregar restriccion medica</a></th>


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
                    <input type="submit" class="btn btn-primary">

                </form>
            </div>
            <div class="col-md-9">

                <body>
                    <form action="" method="GET">
                        <input type="text" name="busqueda" placeholder="buscar historia clinica">
                        <input type="submit" name="enviar" value="buscar">
                        <error{color: red}>
                    </form>


                </body>
                <table class="table">
                    <thead class="table-success table-striped">
                        <tr>
                            <th>Documento</th>
                            <th>Nombre</th>
                            <th>descripcion</th>
                            <th>Comorbilidad</th>
                            <th>medicacion</th>
                            <th>Restriccion medica</th>
                            <th>Grupo sanguineo</th>
                            <th>RH</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if (isset($_GET['enviar'])) {
                            $busqueda = $_GET['busqueda'];

                            $consulta = $con->query("SELECT * from historia_clinica INNER JOIN trabajadores ON historia_clinica.cc=trabajadores.cc WHERE historia_clinica.cc like '%$busqueda%' or nombre like '%$busqueda%' or descripcion like '%$busqueda%' or comorbilidad_1 like '%$busqueda%' or comorbilidad_2 like '%$busqueda%' or comorbilidad_3 like '%$busqueda%' or medicacion like '%$busqueda%' or restriccion_medica like '%$busqueda%' or grupo_sanguineo like '%$busqueda%' or RH like '%$busqueda%'");
                        } else {
                            $consulta = $query;
                        }
                        while ($row = mysqli_fetch_array($consulta)) {
                        ?>
                            <tr>
                                <th><?php echo $row['cc'] ?></th>
                                <th><?php echo $row['nombre'] ?></th>
                                <th><a href="descripcionHistoria.php?id=<?php echo $row['cc'] ?>" class="btn btn-info">Descripcion</a></th>
                                <th><a href="tablaComorbilidad.php?id=<?php echo $row['cc'] ?>" class="btn btn-info">comorbilidad</a></th>
                                <th><a href="tablaMedicacion.php?id=<?php echo $row['cc'] ?>" class="btn btn-info">medicacion</a></th>
                                <th><a href="tablaRestriccion.php?id=<?php echo $row['cc'] ?>" class="btn btn-info">restriccion medica</a></th>
                                <th><?php echo $row['grupo_sanguineo'] ?></th>
                                <th><?php echo $row['RH'] ?></th>

                                <th><a href="editarHistoria.php?id=<?php echo $row['cc'] ?>" class="btn btn-info">Editar</a></th>
                                <th><a href='#' onclick="preguntar(<?php echo $row['cc'] ?>)" class="btn btn-danger">Eliminar</a></th>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>

                </table>
            </div>
            <script type="text/javascript">
                function preguntar(id) {
                    if (confirm('¿esta seguro que desea borrar la historia clinica?')) {
                        window.location.href = "deleteHistoria.php?id=" + id;
                    }
                }
            </script>
        </div>
    </div>
</body>

</html>