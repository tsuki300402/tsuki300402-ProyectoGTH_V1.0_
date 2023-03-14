<?php
    session_start();

?>
<html lang="en">
<head>
    <title>Human's Proyect</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Pagina de inicio">
	<link href="../../../css/custom.css"  rel="stylesheet">
	<link href="../../../libs/bootstrap-icons/bootstrap-icons.css"  rel="stylesheet">
	<script src="../../../js/bootstrap.bundle.min.js"></script>
    <script src="../../../jq/jquery-3.6.1.min.js"></script>
</head>
<body>
    <?php
        //include "../../../modules/menu/menu_usuario.php"
    ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
           
              <?php
                     $id=$_POST['archivo'];
                     $idUser=$_SESSION['idUsuario'];
                     include './archivos.php';
                     $conexion = new Traer();
                     $conexion->Data($id,$idUser);
                ?>
            </div>  
            
    </div>
    <!--<script>
        $(document).ready(function(){
            $('#type').click(function(){
                var tp= $(this).val();    
                console.log(tp);
                if(tp=="mul"){
                        $('div#respuestas').html('<br> <input type="text" class="form-control" id="1" placeholder="Respuesta 1"> <br> <input type="text" class="form-control" id="2" placeholder="Respuesta 2"> <br> <input type="text" class="form-control" id="3" placeholder="Respuesta 3"> ');
                } else if(tp=="des"){
                    $('div#respuestas').html('<label for="rango" class="form-label">Rango Satisfaccion</label><input type="range" class="form-range" id="rango">');
                }else if(tp=="abi"){
                    $('div#respuestas').html('<label for="answ">Respuesta</label><input type="text" class="form-control" id="answ">');
                }
            });
        });
    </script>-->
</body>
</html>