<?php

require 'config/database.php';

$db = new Database();
$con = $db->conectar();

$activo = 1;

$comando = $con->prepare("SELECT id, codigo, descripcion, stock FROM productos WHERE activo=:mi_activo ORDER BY codigo ASC");
$comando->execute(['mi_activo' => $activo]);
$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almacen</title>
    <link rel="icon" type="https://cdn.sstatic.net/Sites/es/img/apple-touch-icon.png?v=7739871010e6
">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/estilos.css">
    <img src="" alt="">
    <script src="public/js/bootstrap.bundle.min.js"></script>
    
</head>

<body class="py-3">
    <main class="container contenedor">
        <div class="py-3 rounded">
            <div class="row row-centered pos">
                <div class="col-12">
                    <center><h4>Productos Del Almacen<i class="bi bi-box-seam"></i></center>
                    <center></center>
                        <a href="nuevo.php" class="btn btn-primary "><i class="bi bi-plus-square-dotted"></i></a>
                    </h4>
                </div>
            </div>

            <br>
            <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="" ariaBuscar-label="Search" >
      
    </form>
            <div class="row py-3">
                <div class="col">
                    <table class="table table-border">
                        <thead>
                            <tr>
                                <th># <i class="bi bi-sort-numeric-down"></i></th>
                                <th>Código <i class="bi bi-upc-scan"></i></th>
                                <th>Descripción <i class="bi bi-input-cursor"></i></th>
                                <th>Stock<i class="bi bi-clipboard2-data"></i></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($resultado as $row) {
                            ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['codigo']; ?></td>
                                    <td><?php echo $row['descripcion']; ?></td>
                                    <td><?php echo $row['stock']; ?></td>
                                    <td><a href="editar.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary"><i class="bi bi-pencil"></i></a></td>
                                    <td><a href="eliminar.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
</body>

</html>