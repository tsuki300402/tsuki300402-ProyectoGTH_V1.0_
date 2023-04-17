<?php
    session_start();
    if(!isset($_SESSION["Usuario"])&&($_SESSION['rol']!='administrador')){
        header ('Location: ../index.php');
    }
    $_SESSION["Usuario"];
?>
<style>
    .no-arrow {
    -webkit-appearance: none;
    -moz-appearance: none;
    }
    .no-arrow::-ms-expand {
        display: none;
    }
</style>
<?php include "../../modules/menu/menu_admin.php" ?>

<div class="container">
    <div class="row mt-4">
        <div class="col">
                <?php 
                    $prueba = $_POST['idBtnMod'];
                    include '../funciones/archivos.php';
                    $conexion = new Traer();
                    $conexion->Prueba($prueba);
                ?> 
        </div>
        <div class="col">
                <?php 
                    $conexion = new Traer();
                    $conexion->Listar($prueba);
                ?> 
                
        </div>  
    </div>
                
</div>
<script>
    //MOSTRAT IMAGEN
    function previewImage() {
        var preview = document.querySelector('#preview');
        var file    = document.querySelector('#image').files[0];
        var reader  = new FileReader();

        reader.addEventListener("load", function () {
            preview.src = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    
	//ESPECIFICAR SELECT
    
	const select = document.getElementById("sel_tema");;
	for (let i = 0; i < select.options.length; i++) {
        if (select.options[i].value === valor_tema) {
            select.options[i].selected = true;
            break;
        }
    }  
    const select_n = document.getElementById("sel_nivel");;
	for (let i = 0; i < select_n.options.length; i++) {
        if (select_n.options[i].value === valor_nivel) {
            select_n.options[i].selected = true;
            break;
        }
    }  
    
</script>

</body>
</html>