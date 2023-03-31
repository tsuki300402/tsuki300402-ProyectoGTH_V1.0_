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
        <div class="container-fluid mx-auto ms-auto">
            <div class="container text-center">
                <form method="post" action="./paginas/funciones/">
                    <label>Ingresa aqui tu contraseña para restablecerla</label>
                    <div class="">
                        <input type="email" id="email" name="email" required>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>