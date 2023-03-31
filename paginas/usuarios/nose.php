<?php
    session_start();
    if(!isset($_SESSION["Usuario"])){
        header ('Location: ../index.php');
    }
    $_SESSION["Usuario"];
?>
    <?php
        include "../../modules/menu/menu_usuario.php"
    ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
           
              <?php
                     $id=$_POST['archivo'];
                     $idUser=$_SESSION['idUsuario'];
                     include '../funciones/archivos.php';
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