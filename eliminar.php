<?php

require 'config/database.php';

$db = new Database();
$con = $db->conectar();

$id = $_GET['id'];

$query = $con->prepare("DELETE FROM productos WHERE id=?");
$query->execute([$id]);
$numElimina = $query->rowCount();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elinado</title>

    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/estilos.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
</head>

<body class="py-3">
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
                <div class="col">
                    <?php if ($numElimina > 0) { ?>
                        <h3>Registro eliminado</h3>
                        <div class="alert alert-primary" role="alert">
  <h5>Has eliminado un registro el administrador sera notificado</h5>
</div>
                    <?php } else { ?>
                        <h3>Error al eliminar registro</h3>
                    <?php }  ?>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <a class="btn btn-primary"  href="index.php"></i><i class="bi bi-arrow-return-left"></i></a>
                </div>
            </div>
        </div>
    </main>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</body>

</html>