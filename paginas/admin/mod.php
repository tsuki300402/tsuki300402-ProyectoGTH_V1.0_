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
	            </div>
	            <div class='modal-body'>
	                <form action='' method='post' class='was-validated' enctype='multipart/form-data'>
                    <input type='hidden' name='idQuest' value='<?php $prueba = $_POST['idBtnMod'];?>'></input>
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
                                <option value="mul">multiple</option>
                                <option value="img">imagen</option>
                                <option value="slid">deslizante</option>
                            </select>
                        </div>		
                        <div class='form-group mt-2' id="Tipo_Respuesta">
                            <label for='ResP'>Texto de la Pregunta</label>
                            <textarea class='form-control is-valid' id='ResP' name='ResP' rows='2' cols='1'required></textarea>
                            <div class='invalid-feedback'>
                                Doesn't Looks good!
                            </div>
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
                campo_preg.innerHTML = "<label for='Preg'>Texto de la Pregunta</label><textarea class='form-control is-valid' id='Preg' name='Preg' rows='2' cols='1'required></textarea><div class='invalid-feedback'>Doesn't Looks good!</div>";

            break; 
            case "img":
                console.log("El pregunta es imagen");
                $("#Tipo_Pregunta").addClass("custom-file mb-4");
                campo_preg.innerHTML = "<label class='custom-file-label' for='Preg'>Elija un archivo imagen</label><input type='file' class='custom-file-input form-control' id='imagePreg' name='Preg' accept='.png, .jpg, .jpeg' required/><span id='imagenPreg'>Nada seleccionado</span>";
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
                campo_resp.innerHTML = "<label for='title'>Texto de la Pregunta</label><textarea class='form-control is-valid' id='title' name='title' rows='2' cols='1'required></textarea><div class='invalid-feedback'>Doesn't Looks good!</div>";
                
            break;
            case "mul":
                console.log("El option es multiple");
                campo_resp.innerHTML = "<p>Este es un nuevo párrafo.</p>";
            break;   
            case "img":
                console.log("El option es imagen");
                console.log("El pregunta es imagen");
                $("#Tipo_Respuesta").addClass("custom-file mb-4");
                campo_resp.innerHTML = "<label class='custom-file-label' for='imageResP'>Elija un archivo imagen</label><input type='file' class='custom-file-input form-control' id='imageResP' name='imageResP' accept='.png, .jpg, .jpeg' required/><span id='imagenResP'>Nada seleccionado</span>";
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
                campo_resp.innerHTML = "<div class='container mt-3'><input type='range' class='form-range' id='Preg' name='Preg'></div>";
                
            break;  
        } 
        
    }

</script>

</body>
</html>