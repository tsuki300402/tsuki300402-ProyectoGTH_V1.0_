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
        <?php
        
        ?>
        <div class="col">
                <?php 
                    $conexion = new Traer();
                    $conexion->Listar($prueba);
                ?> 
            <button class='btn btn-success' data-bs-toggle='modal' data-bs-target='#añadirPregunta'>Añadir</button>
        </div>  
    </div>
    <!--MODAL AÑADIR PREGUNTA-->
    <div class='modal fade' id='añadirPregunta'>
	    <div class='modal-dialog'>
	        <div class='modal-content'>
                <!--modal header-->
                <div class='modal-header'>
	                <h2>Añadir Pregunta </h2>
	            </div>
	            <div class='modal-body'>
	                <form action='' method='post'>
	                    <div class='form-group'>
                            <label for='title'>Pregunta</label>
                            <textarea class='form-control is-valid' id='title' name='title' rows='2' cols='1'required> </textarea>
                            <div class='invalid-feedback'>
                                Doesn't Looks good!
                            </div>
				        </div>								
                        <div class='container-fluid text-center'>
                            <button type='submit' class='btn btn-primary mt-2'>Aceptar</button>
                        </div>
	                </form>
                </div>
            </div>
        </div>
    </div>
<script> 
    //MOSTRAT IMAGEN
    function previewImage() {
    var MAX_WIDTH = 224;
    var MAX_HEIGHT = 261;
    var preview = document.querySelector('#preview');
    var file = document.querySelector('#image').files[0];
    var reader = new FileReader();
    var image = new Image();

    reader.addEventListener("load", function () {
        image.src = reader.result;
    }, false);

    if (file) {
        reader.readAsDataURL(file);
    }

    image.onload = function() {
        var width = image.width;
        var height = image.height;

        // Redimensionar la imagen si es más grande que los límites dados
        if (width > MAX_WIDTH) {
            width = MAX_WIDTH;
        }
        if (height > MAX_HEIGHT) {
            height = MAX_HEIGHT;
        }

        // Redimensionar la imagen si es más pequeña que los límites dados
        if (width < MAX_WIDTH) {
            width = MAX_WIDTH;
        }
        if (height < MAX_HEIGHT) {
            height = MAX_HEIGHT;
        }

        // Dibujar la imagen redimensionada en un lienzo temporal
        var canvas = document.createElement('canvas');
        canvas.width = width;
        canvas.height = height;
        var ctx = canvas.getContext('2d');
        
        // Detectar el tipo de archivo y establecer el tipo MIME correspondiente
        var mimeType = file.type || 'image/jpeg';
        
        // Dibujar la imagen redimensionada en el lienzo temporal
        ctx.drawImage(image, 0, 0, width, height);

        // Actualizar la vista previa con la imagen redimensionada
        preview.src = canvas.toDataURL(mimeType, 0.8);
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
    
    //verificar si el archivo es imagen

    const archivoInput = document.getElementById('image');
    const errorArchivo = document.getElementById('errorArchivo');
    
    archivoInput.addEventListener('change', function() {
        if (!validarArchivo(archivoInput.files[0])) {
            archivoInput.value = '';
            errorArchivo.style.display = 'block';
        } else {
            errorArchivo.style.display = 'none';
        }
    });
    
    function validarArchivo(archivo) {
        const allowedTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml', 'image/jpg',];
        return archivo && allowedTypes.includes(archivo.type);
    }
</script>

</body>
</html>