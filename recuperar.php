<html>
    <head>
    <title>Recuperar Contraseña</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Pagina de inicio">
	<link href="./css/custom.css"  rel="stylesheet">
	<link href="./libs/bootstrap-icons/bootstrap-icons.css"  rel="stylesheet">
	<script src="./js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <?php include("./modules/menu/menu.php") ?>
        <div class="container text-start bg-light mt-5">
            <div class="row mt-5">
                <div class="col-sm-6 mx-auto bg-white mt-3 mb-3">
                    <form class="mt-5" method="post" action="./paginas/funciones/restablecerC.php">
                        <label class="lead mb-3">Ingresa aqui tu correo para restablecerla tu contraseña</label>
                        <div class="">
                            <input class="form-control form-control-lg mb-3" type="email" id="email" name="email" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Restablecer</button>
                    </form>
                </div>
            </div>
            <a class="btn btn-primary mb-2" href="index.php">Volver</a>
        </div>
    </body>
</html>