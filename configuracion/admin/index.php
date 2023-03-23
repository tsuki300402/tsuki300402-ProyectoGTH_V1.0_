<?php
    session_start();
    if(!isset($_SESSION["Usuario"])){
        header ('Location: ../index.php');
    }
    //$_SESSION["Usuario"];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Index de Admin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../../css/custom.css"  rel="stylesheet">
	<link href="../../libs/bootstrap-icons/bootstrap-icons.css"  rel="stylesheet">
	<script src="../../js/bootstrap.bundle.min.js"></script>

</head>
<body>
   <?php
    include "../../modules/menu/menu_usuario.php"
   ?>
    <div class="container-fluid bg-primary text-center text-white p-2">
        <h1><i class="bi bi-person-rolodex"> Gestion </i></h1>
    </div>
    <div class="container">
    <h1 class="text-center mt-4">Progreso y Habilidades</h1>
        <div class="container p-5">
            <div class="row" style="border:1px solid black ;">
                <div class="col p-4"> 
                Matematicas:
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:75%;">                              
                            </div>
                        </div>
                Logica:
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width:85%;">                              
                            </div>
                        </div>       
                Pensamiento Abstracto:       
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:25%;">                              
                            </div>
                        </div>
                Psicotecnicas:
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width:45%;">                              
                            </div>
                        </div>
                </div>
                <div class="col p-4">
                    <p class="fs-4">El usario es capaz de analizar diversos problemas de manera logica, aplicando teoremas matematicos para dar suoluciones más exactas. De igual manera construye lentamente soluciones creativas de diversos puntos de vista, efectuando la mejor forma de resolverlos.
                </p>
                </div>
            </div>
            <div class="row">
               <p class="fs-3">
               Este apartado está en construccion. La idea fundamental es dar un detalle basico de las habilidades del usuario, su progreso en los diversos temas (representado en barras con la opcion de ver detalles sobre las pruebas ya realizadas)
               </p>

            </div>
    </div>
    </div>
</body>
</html>