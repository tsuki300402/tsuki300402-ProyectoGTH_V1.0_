<?php
session_start();
?>
<html lang="en">

<head>
    <title>Human's Proyect</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Pagina de inicio">
    <link href="../../css/custom.css" rel="stylesheet">
    <link href="../../libs/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../jq/jquery-3.6.1.min.js"></script>
</head>

<body>
    <?php
    include "../../modules/menu/menu_usuario.php"
        ?>
    <div class="container mt-4">
        <form action="nose.php" method="POST">
            <div class="row">
                <?php
                $archivo = $_POST["archivo"];
                include '../funciones/archivos.php';
                $conexion = new Traer();
                $conexion->Archivos($archivo);
                ?>
            </div>
        </form>
    </div>
</body>

</html>