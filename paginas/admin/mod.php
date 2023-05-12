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
    <div class="row">
        <div class="col">
                <?php 
                    $prueba = $_POST['idBtnMod'];
                    $_SESSION['IdBtnMod'] = $prueba;
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
            <button class='btn btn-success' data-bs-toggle='modal' data-bs-target='#añadirPregunta'><i class='bi bi-plus-square'></i> Añadir</button>
        </div>  
    </div>
    <!--MODAL AÑADIR PREGUNTA-->
    <div class='modal fade' id='añadirPregunta'>
	    <div class='modal-dialog'>
	        <div class='modal-content'>
                <!--modal header-->
                <div class='modal-header'>
	                <h2>Añadir Pregunta </h2>
                    <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
	            </div>
	            <div class='modal-body'>
	                <form action='../funciones/subir_pregunta.php' method='post' class='was-validated' enctype='multipart/form-data'>
                    <input type='hidden' id='idQuest' name='idQuest' value='<?php echo $prueba;?>'></input>
                        <div class="form-group">
                            <label for='pregun_tipo'>Pregunta Tipo:</label>
                            <select class="form-control" name="pregun_tipo" id="pregun_tipo" onchange="QuestType()">
                                <option value="uni">unica</option>
                                <option value="img">imagen</option>
                            </select>
                        </div>
	                    <div class='form-group' id="Tipo_Pregunta">
                            <label for='pregunta_txt'>Texto de la Pregunta</label>
                            <textarea class='form-control is-valid' id='pregunta_txt' name='pregunta_txt' rows='2' cols='1'required></textarea>
                            <div class='invalid-feedback'>
                                Doesn't Looks good!
                            </div>
				        </div>	
                        <div class="form-group mb-2">
                            <label for='resp_tipo'>Respuesta Tipo:</label>
                            <select class="form-control" name="resp_tipo" id="resp_tipo" onchange="QuestType()">
                                <option value="uni">unica</option>
                                <option value="mult">multiple</option>
                                <!--<option value="img">imagen</option>-->
                                 <!--<option value="slid">deslizante</option>-->
                            </select>
                        </div>		
                        <div class='form-group mt-2' id="Tipo_Respuesta">
                            
				        </div>						
                        <div class='container-fluid text-center'>
                            <button type='submit' class='btn btn-success mt-2'>Aceptar</button>
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

    //TIPO PREGUNTA
    function QuestType(){
        let campo_preg = document.getElementById("Tipo_Pregunta");
        let campo_resp = document.getElementById("Tipo_Respuesta");
        //Modificacion tipo pregunta
        var Ques_type = document.getElementById("pregun_tipo");
        var QuestVTipo = Ques_type.value;
        console.log(QuestVTipo);
        switch (QuestVTipo){
            case "uni": 
                console.log("El pregunta es unica");
                campo_preg.innerHTML = "<label for='pregunta_txt'>Texto de la Pregunta</label><textarea class='form-control is-valid' id='pregunta_txt' name='pregunta_txt' rows='2' cols='1'required></textarea><div class='invalid-feedback'>Doesn't Looks good!</div>";

            break; 
            case "img":
                console.log("El pregunta es imagen");
                campo_preg.innerHTML = "<label for='pregunta_txt'>Texto de la Pregunta</label><textarea class='form-control is-valid' id='pregunta_txt' name='pregunta_txt' rows='2' cols='1'required></textarea><div class='invalid-feedback'>Doesn't Looks good!</div>";
                campo_preg.innerHTML +="<div class='custom-file mb-4 mt-2'><label class='custom-file-label' for='Preg'>Elija un archivo imagen</label><input type='file' class='custom-file-input form-control required' id='imagePreg' name='imagePreg' accept='.png, .jpg, .jpeg' required/><span id='imagenPreg'>Nada seleccionado</span></div>";
                const input = document.getElementById('imagePreg');
                const span = document.getElementById('imagenPreg');

                    // Agregar un evento change al input file
                input.addEventListener('change', function() {
                        // Verificar si se ha seleccionado un archivo
                        if (input.files.length > 0) {
                            // Obtener el nombre del archivo seleccionado
                            const fileName = input.files[0].name;
                            
                            // Asignar el nombre del archivo al texto del span
                            span.textContent ="Seleccionado: "+fileName;
                        } else {
                            // No se ha seleccionado un archivo
                            span.textContent ="Nada seleccionado";
                        }
                    });
            break;    
        }

        //Modificacion tipo respuesta
        var Answ_type = document.getElementById("resp_tipo");
        var AnswVTipo = Answ_type.value;
        console.log(AnswVTipo);
        switch (AnswVTipo){
            case "uni": 
                console.log("El option es unica");
                campo_resp.innerHTML = " ";
                
            break;
            case "mult":
                console.log("El option es multiple");
                campo_resp.innerHTML = "<div class='mt-2 input-group'><div><span class='input-group-text' for='resp_c'>Opcion Correcta</span class='input-group-text'></div><textarea class='form-control is-valid' id='resp_c' name='resp_c' rows='1' cols='1'required></textarea><div class='invalid-feedback'>Doesn't Looks good!</div></div>";
                
    
                for (i=1;i<4;i++){
                    campo_resp.innerHTML += "<div class='mt-2 input-group'><div><span class='input-group-text' for='resp_posible'>Opcion "+i+" </span class='input-group-text'></div><textarea class='form-control is-valid' id='resp_posible[]' name='resp_posible[]' rows='1' cols='1'required></textarea><div class='invalid-feedback'>Doesn't Looks good!</div></div>";
                }
                
            break;   
            case "img":
                console.log("El option es imagen");
                campo_resp.innerHTML = "<div class='custom-file mb-4 mt-2'><label class='custom-file-label' for='imageResP'>Elija un archivo imagen</label><input type='file' class='custom-file-input form-control required' id='imageResP' name='imageResP' accept='.png, .jpg, .jpeg' required/><span id='imagenResP'>Nada seleccionado</span></div>";
                const input = document.getElementById('imageResP');
                const span = document.getElementById('imagenResP');

                    // Agregar un evento change al input file
                input.addEventListener('change', function() {
                        // Verificar si se ha seleccionado un archivo
                        if (input.files.length > 0) {
                            // Obtener el nombre del archivo seleccionado
                            const fileName = input.files[0].name;
                            
                            // Asignar el nombre del archivo al texto del span
                            span.textContent ="Seleccionado: "+fileName;
                        } else {
                            // No se ha seleccionado un archivo
                            span.textContent ="Nada seleccionado";
                        }
                    });
            break;  
            case "slid":
                console.log("El option es slid");
                campo_resp.innerHTML = "<div class='input-group mt-3'><span for='min-value' class='input-group-text'>Valor mínimo:</span><select id='min-value' name='min-value' class='form-control'><option value='0'>0</option><option value='1'>1</option><option value='2'>2</option><!-- Agrega más opciones según tus necesidades --></select></div><div class='input-group mt-2'><span for='max-value' class='input-group-text'>Valor máximo:</span><select id='max-value' name='max-value' class='form-control'><option value='10'>10</option><option value='20'>20</option><option value='30'>30</option><!-- Agrega más opciones según tus necesidades --></select></div>";
                
            break;  
        } 
        
    }

</script>

</body>
</html>