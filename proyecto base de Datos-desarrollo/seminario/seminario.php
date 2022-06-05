<?php
include("conexion.php");
$con = conectar();
$sql = "SELECT *  FROM seminario";
$query = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Seminario</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <h1>Ingresar Seminario</h1>
                <form action="insertarSeminario.php" method="POST">
                    
                    <input type="text" class="form-control mb-3" name="nombre" placeholder="nombre del seminario">
                    <textarea name="objetivo" cols="38" rows="5" placeholder="objetivo"></textarea>
                    <textarea name="descripcion" cols="38" rows="5" placeholder="descripcion"></textarea>
                    <textarea name="poblacion_dirigida" cols="38" rows="5" placeholder="poblacion_dirigida"></textarea>
                    <input type="submit" class="btn btn-primary">
                </form>
            </div>
            <div class="col-md-8">
                <body>
                    <form action="" method="GET">
                        <input type="text" name="busqueda" placeholder="buscar seminario">
                        <input type="submit" name="enviar" value="buscar">
                        <error{color: red}>
                    </form>
                </body>
                <table class="table">
                    <thead class="table-success table-striped">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Objetivo</th>
                            <th>Descripcion</th>
                            <th>Poblacion dirigida</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_GET['enviar'])) {
                            $busqueda = $_GET['busqueda'];
                            $consulta = $con->query("select * from seminario 
                            where seminario_id like '%$busqueda%' 
                            or nombre like '%$busqueda%' 
                            or objetivo like '%$busqueda%' 
                            or descripcion like '%$busqueda%' 
                            or poblacion_dirigida like '%$busqueda%'");
                        } else {
                            $consulta = $query;
                        }
                        while ($row = mysqli_fetch_array($consulta)) {
                        ?>
                            <tr>
                                <th><?php echo $row['seminario_id'] ?></th>
                                <th><?php echo $row['nombre'] ?></th>
                                <th><?php echo $row['objetivo'] ?></th>
                                <th><?php echo $row['descripcion'] ?></th>
                                <th><?php echo $row['poblacion_dirigida'] ?></th>             
                                <th><a href="editarSeminario.php?id=<?php echo $row['seminario_id'] ?>" class="btn btn-info">Editar</a></th>
                                <th><a href='#' onclick="preguntar(<?php echo $row['seminario_id'] ?>)" class="btn btn-danger">Eliminar</a></th>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                </table>
            </div>
            <script type="text/javascript">
                function preguntar(id) {
                    if (confirm('¿esta seguro que desea borrar este seminario? se borraran todos los registros asociados')) {
                        window.location.href = "delete.php?id=" + id;
                    }
                }
            </script>
        </div>
    </div>    
</body>
</html>