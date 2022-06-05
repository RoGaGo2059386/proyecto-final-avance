<?php
include("conexion.php");
$con = conectar();
$personal = "SELECT cc, nombre  from trabajadores ";
$resultado = mysqli_query($con, $personal);
$seminario = "SELECT seminario_id, nombre from seminario ";
$resultado2 = mysqli_query($con, $seminario);
$sql = "SELECT trabajadores.nombre as 't_nombre',
trabajador_seminario.trabajador_id,
trabajador_seminario.seminario_id,
seminario.nombre  
FROM trabajador_seminario 
JOIN trabajadores 
ON trabajador_seminario.trabajador_id=trabajadores.cc 
JOIN seminario 
ON trabajador_seminario.seminario_id=seminario.seminario_id";
$query = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Inscripcion</title>
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <h1>crear historia clinica</h1>
                <form action="insertar.php" method="POST">

                    <select name="trabajador_id">
                        <option>---cedula asociada---</option>
                        <?php while ($row1 = mysqli_fetch_array($resultado)) :; ?>

                            <option><?php echo $row1[0]; ?> <?php echo $row1[1]; ?></option>
                        <?php endwhile; ?>
                    </select>
                    <select name="seminario_id">
                        <option>---seminario---</option>
                        <?php while ($row1 = mysqli_fetch_array($resultado2)) :; ?>
                            <option><?php echo $row1[0];;
                                    echo $row1[1] ?></option>
                        <?php endwhile; ?>
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
                            <th>Nombre trabajador</th>
                            <th>Id seminario</th>
                            <th>Nombre seminario</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if (isset($_GET['enviar'])) {
                            $busqueda = $_GET['busqueda'];

                            $consulta = $con->query("SELECT trabajadores.nombre as 't_nombre',
                            trabajador_seminario.trabajador_id,
                            trabajador_seminario.seminario_id,
                            seminario.nombre from trabajador_seminario 
                            JOIN trabajadores 
                            ON trabajador_seminario.trabajador_id=trabajadores.cc 
                            JOIN seminario 
                            ON trabajador_seminario.seminario_id=seminario.seminario_id  
                            WHERE trabajadores.nombre like '%$busqueda%' 
                            or seminario.seminario_id like '%$busqueda%'
                            or trabajador_id like '%$busqueda%' 
                            or seminario.nombre like '%$busqueda%'");
                        } else {
                            $consulta = $query;
                        }
                        while ($row = mysqli_fetch_array($consulta)) {
                        ?>
                            <tr>
                                <th><?php echo $row['trabajador_id'] ?></th>
                                <th><?php echo $row['t_nombre'] ?></th>
                                <th><?php echo $row['seminario_id'] ?></th>
                                <th><?php echo $row['nombre'] ?></th>


                                <th><a href='#' onclick="preguntar(<?php echo $row['trabajador_id'] ?>,<?php echo $row['seminario_id'] ?>)" class="btn btn-danger">Eliminar</a></th>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>

                </table>
            </div>
            <script type="text/javascript">
                function preguntar(id1, id2) {
                    if (confirm('¿esta seguro que desea borrar el registro?')) {
                        window.location.href = "delete.php?id1=" + id1 + "&id2=" + id2;
                    }
                }
            </script>
        </div>
    </div>
</body>

</html>