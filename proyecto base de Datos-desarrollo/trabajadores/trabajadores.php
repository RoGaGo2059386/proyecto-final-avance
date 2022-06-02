<?php
include("conexion.php");
$con = conectar();

$sql = "SELECT *  FROM trabajadores";
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
                <h1>Ingresar Trabajador</h1>
                <form action="insertarTrabajador.php" method="POST">

                    <input type="number" class="form-control mb-3" name="cc" placeholder="cedula del trabajador">
                    <input type="text" class="form-control mb-3" name="nombre" placeholder="nombre completo">
                    <input type="text" class="form-control mb-3" name="cargo" placeholder="cargo del trabajador">


                    <input type="submit" class="btn btn-primary">

                </form>
            </div>
            <div class="col-md-8">

                <body>
                    <form action="" method="GET">
                        <input type="text" name="busqueda" placeholder="buscar trabajador">
                        <input type="submit" name="enviar" value="buscar">
                        <error{color: red}>
                    </form>


                </body>
                <table class="table">
                    <thead class="table-success table-striped">
                        <tr>
                            <th>Documento</th>
                            <th>Nombre</th>
                            <th>Cargo</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if (isset($_GET['enviar'])) {
                            $busqueda = $_GET['busqueda'];

                            $consulta = $con->query("select * from trabajadores where cc like '%$busqueda%' or nombre like '%$busqueda%' or cargo like '%$busqueda%'");
                        } else {
                            $consulta = $query;
                        }
                        while ($row = mysqli_fetch_array($consulta)) {
                        ?>
                            <tr>
                                <th><?php echo $row['cc'] ?></th>
                                <th><?php echo $row['nombre'] ?></th>
                                <th><?php echo $row['cargo'] ?></th>

                                <th><a href="editarTrabajador.php?id=<?php echo $row['cc'] ?>" class="btn btn-info">Editar</a></th>
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
                    if (confirm('¿esta seguro que desea borrar este registro? se borraran todos los registros asociados')) {
                        window.location.href = "delete.php?id=" + id;
                    }
                }
            </script>
        </div>
    </div>
</body>

</html>