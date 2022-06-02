<?php
include("conexion.php");
$con = conectar();
$busqueda = $sql = "SELECT cc  FROM historia_clinica";
$resultado = $query = mysqli_query($con, $busqueda);
$sql = "SELECT *  FROM comorbilidad ";
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
                <h1>Agregar comorbilidad</h1>
                <form action="insertarComorbilidad.php" method="POST">

                    <select name="cc">
                        <option>---cedula asociada---</option>
                        <?php while ($row1 = mysqli_fetch_array($resultado)) :; ?>
                            <option><?php echo $row1[0]; ?></option>
                        <?php endwhile; ?>
                    </select>
                    <input type="text" class="form-control mb-3" name="descripcion" placeholder="descripcion">


                    <input type="submit" class="btn btn-primary">

                </form>
            </div>
            <div class="col-md-9">

                <body>
                    <form action="" method="GET">
                        <input type="text" name="busqueda" placeholder="buscar">
                        <input type="submit" name="enviar" value="buscar">
                        <error{color: red}>
                    </form>


                </body>
                <table class="table">
                    <thead class="table-success table-striped">
                        <tr>
                            <th>id</th>
                            <th>Documento</th>
                            <th>descripcion</th>

                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if (isset($_GET['enviar'])) {
                            $busqueda = $_GET['busqueda'];

                            $consulta = $con->query("SELECT * from comorbilidad WHERE cc like '%$busqueda%' or descripcion like '%$busqueda%' or comID like '%$busqueda%' ");
                        } else {
                            $consulta = $query;
                        }
                        while ($row = mysqli_fetch_array($consulta)) {
                        ?>
                            <tr>
                                <th><?php echo $row['comID'] ?></th>
                                <th><?php echo $row['cc'] ?></th>
                                <th><?php echo $row['descripcion'] ?></th>


                                <th><a href="editarComorbilidad.php?id=<?php echo $row['comID'] ?>" class="btn btn-info">Editar</a></th>
                                <th><a href='#' onclick="preguntar(<?php echo $row['comID'] ?>)" class="btn btn-danger">Eliminar</a></th>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>

                </table>
            </div>
            <script type="text/javascript">
                function preguntar(id) {
                    if (confirm('¿esta seguro que desea borrar la comorbilidad?')) {
                        window.location.href = "deleteComorbilidad.php?id=" + id;
                    }
                }
            </script>
        </div>
    </div>
</body>

</html>