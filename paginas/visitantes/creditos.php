<!DOCTYPE html>
<html lang="en">
<head>
    <title>Human's Proyect</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Pagina de inicio">
	<link href="../../css/custom.css"  rel="stylesheet">
	<link href="../../libs/bootstrap-icons/bootstrap-icons.css"  rel="stylesheet">
	<script src="../../js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-info">
    <?php
    include '../menu/menu.php'
    ?>
    <div class="container-fluid bg-info">
        <div class="container text-center">
            <b style="font-size:179px;">MUCHO TEXTO</b>
        </div>
        <div class="container bg-light text-center p-4">
            <h1>Terminos y Condiciones</h1>
            <p  class="fs-3">Dejamos nuestros terminos y condiciones de uso, todo tipo de actividad directamente relacionada a la pagina es unica y excluivamente de propiedad p'rivada. Su uso incorrecto puede generar controversia, a lo cual actuaremos con respecto a la ley 53x0 del 2002.</p>
            <div id="CC">

            </div>
            <div>
                <a class="fs-1" id="Close" onclick="CargarCreditos()">Leer más</a> 
            </div>
              
              
                      
        </div>
    </div>
    <script>
        function CargarCreditos(){
            var Credit='<textarea class="fs-2" name="" cols="60" rows="50">';
            for (let i = 0;i<15;i++){
                Credit+='Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente inventore ea dolorem! Incidunt atque perspiciatis non modi veritatis voluptatum ab ducimus corrupti, aut et adipisci soluta, sit ratione est in.';
            } 
            document.getElementById('CC').innerHTML= Credit+'</textarea>';
            document.getElementById('Close').innerHTML= '<a class="fs-1 text-danger" onclick="Close()">Cerrar</a>';
        }
        function Close(){
            document.getElementById('CC').innerHTML= 'hola';
            document.getElementById('Close').innerHTML= '<a class="fs-1" id="Close" onclick="CargarCreditos()">Leer más</a>';
        }
    </script>
</body>
</html>