<!DOCTYPE html>
<html>

<head>
    <title>Registrarse</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../css/custom.css" rel="stylesheet">
    <link href="../../libs/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <script src="../../js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <?php //include "../../modules/menu/menu.php" ?>

    <?php
    if (isset($_SESSION["ErrorDB"])) {
        echo '<div class="alert alert-danger m-0">
        <strong>Error:</strong>';
        echo $_SESSION['ErrorDB'];
        echo '</div>';
        session_unset();
        session_destroy();
    }

    if (isset($_SESSION["Status"])) {
        echo '<div class="alert alert-success m-0">
        <strong>Exito:</strong> La operacion ha sido realizada.
        </div>';
        session_unset();
        session_destroy();
    }

    ?>


    <div class="container-fluid">
        <!--<a class="btn btn-primary btn-lg mt-3" href="../../index.php">Volver</a>-->
        <div class="row g-4 text-center justify-content-center">
            <div class="col-12">
                <div class="card h-100">
                    <img src="../../libs/bootstrap-icons/people-fill.svg" class="card-img-top" alt="person-plus"
                        width="90px" height="90">
                    <div class="card-body">
                        <form action="../../configuracion/config/inicio.php" method="POST" class="was-validated">
                            <div class="row g-3">
                                <div class="col">

                                    <label for="email"><i class="bi bi-person-fill"> Primer Nombre</i></label>
                                    <input type="text" class="form-control" id="nombre"
                                        placeholder="Ingrese su primer nombre" name="nombre" required>
                                    <div class="invalid-feedback">Por favor llene este campo</div>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col">
                                    <label for="email"><i class="bi bi-person-fill">Primer Apellido</i></label>
                                    <input type="text" class="form-control" id="apellido"
                                        placeholder="Ingrese su primer apellido" name="apellido" required>
                                    <div class="invalid-feedback">Por favor llene este campo</div>
                                </div>
                            </div>


                            <div class="col">
                                <label for="email"><i class="bi bi-person-fill">Rol</i></label>
                                <input readonly value="usuario" type="text" class="form-control" id="rol"
                                    placeholder="Ingrese el rol" name="rol">
                                <div class="invalid-feedback">Por favor llene este campo</div>

                            </div>
                    </div>

                    <div class="form-floating m-4">
                        <input type="email" class="form-control" id="email" placeholder="Ingrese su email" name="email"
                            required>
                        <div class="invalid-feedback">Por favor llene este campo</div>
                        <label for="email"><i class="bi bi-envelope">Email</i></label>

                    </div>

                    <div class="form-floating m-4">
            <input type="password" class="form-control" id="password" placeholder="Ingrese su Email" name="password" required>
            <label for="password"><i class="bi bi-lock">Password</i></label>
        </div>
                    <div class="d-grid m-0">

                        <button type="submit" class="btn btn-secondary m-5"><i class="bi bi-pc me-1">Agregar
                                usuario</i></button>

                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



</body>

</html>
<?php
?>