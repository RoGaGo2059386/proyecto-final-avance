<?php
include("conexion.php");
$con = conectar();
$personal = "SELECT cc from trabajadores";
$resultado = mysqli_query($con, $personal);
$sql = "SELECT *  FROM prueba_covid INNER JOIN trabajadores ON prueba_covid.cc=trabajadores.cc";
$query = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Trabajadores</title>
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <h1>Ingresar prueva de Covid</h1>
                <form action="insertarPrueba.php" method="POST">
                    <strong>Documento</strong><br />
                    <select name="cc">
                        <option>---cedula asociada---</option>
                        <?php while ($row1 = mysqli_fetch_array($resultado)) :; ?>
                            <option><?php echo $row1[0]; ?></option>
                        <?php endwhile; ?>
                    </select><br />
                    <strong>informacion</strong><br />
                    <textarea name="info_prueba" cols="38" rows="5" placeholder="informacion de la prueba"></textarea>
                    <br />
                    <strong>¿Hubo incapacidad durante la prueba?</strong><br />
                    <input type="radio" name="incapacidad" value="si">si<br />
                    <input type="radio" name="incapacidad" value="no">no<br />
                    <strong>Fecha de la prueba</strong><br />
                    <input type="date" class="form-control mb-3" name="fecha_prueba" placeholder="fecha de la prueba">
                    <strong>Fecha del informe de sospecha</strong><br />
                    <input type="date" class="form-control mb-3" name="fecha_sospecha" placeholder="fecha de la prueba">
                    <strong>Fecha de la confirmacion</strong><br />
                    <input type="date" class="form-control mb-3" name="fecha_notificacion" placeholder="fecha de la prueba">
                    <strong>Fecha del fin del aislamiento</strong><br />
                    <input type="date" class="form-control mb-3" name="fecha_fin_aislamiento" placeholder="fecha de la prueba">

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
                            <th>informacion de la prueba</th>
                            <th>incapacidad</th>
                            <th>fecha de la prueba</th>
                            <th>fecha sospecha</th>
                            <th>fecha notificacion</th>
                            <th>fecha fin aislamiento</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if (isset($_GET['enviar'])) {
                            $busqueda = $_GET['busqueda'];

                            $consulta = $con->query("SELECT * from prueba_covid INNER JOIN trabajadores ON prueba_covid.cc=trabajadores.cc WHERE prueba_covid.cc like '%$busqueda%' or nombre like '%$busqueda%' or info_prueba like '%$busqueda%' or incapacidad like '%$busqueda%' or fecha_prueba like '%$busqueda%'");
                        } else {
                            $consulta = $query;
                        }
                        while ($row = mysqli_fetch_array($consulta)) {
                        ?>
                            <tr>
                                <th><?php echo $row['cc'] ?></th>
                                <th><?php echo $row['nombre'] ?></th>
                                <th><a href="informacionPrueba.php?id=<?php echo $row['pruebaID'] ?>" class="btn btn-info">ver informacion</a></th>
                                <th><?php echo $row['incapacidad'] ?></th>
                                <th><?php echo $row['fecha_prueba'] ?></th>
                                <th><?php echo $row['fecha_sospecha'] ?></th>
                                <th><?php echo $row['fecha_notificacion'] ?></th>
                                <th><?php echo $row['fecha_fin_aislamiento'] ?></th>


                                <th><a href="editarPrueba.php?id=<?php echo $row['pruebaID'] ?>" class="btn btn-info">Editar</a></th>
                                <th><a href='#' onclick="preguntar(<?php echo $row['pruebaID'] ?>)" class="btn btn-danger">Eliminar</a></th>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>

                </table>
            </div>
            <script type="text/javascript">
                function preguntar(id) {
                    if (confirm('¿esta seguro que desea borrar esta prueba de covid?')) {
                        window.location.href = "deletePrueba.php?id=" + id;
                    }
                }
            </script>
        </div>
    </div>
</body>

</html>