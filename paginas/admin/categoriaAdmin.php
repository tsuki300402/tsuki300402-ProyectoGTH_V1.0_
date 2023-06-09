<?php
session_start();
if (!isset($_SESSION["Usuario"]) && ($_SESSION['rol'] != 'administrador')) {
    header('Location: ../index.php');
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
    
    <div class="container mt-4">
        <div class="row">
            <?php
                include 'pruebasA.php'; 
            ?>
            <a class="col-2 btn btn-primary text-light" data-bs-toggle="modal" data-bs-target="#modalAdd"><i class="bi bi-cloud-plus "> Añadir</i></a>
        </div>
    </div>
    <!--EL MODAL-->
    <div class='modal fade' id='modalAdd'>
						<div class='modal-dialog'>
							<div class='modal-content'>
								<!--modal header-->
								<div class='modal-header'>
									<h2>Añadir una Prueba</h2> 
									<button type='button' class='btn-close' data-bs-dismiss='modal'></button>
								</div>
								<div class='modal-body'>
									<form action='../funciones/upload.php' method='post' class="was-validated" enctype='multipart/form-data'>
										<div class="form-group">
                                            <label for="title">Titulo</label>
                                            <input type="text" class="form-control is-valid" id="title" name="title" placeholder="Ingrese Titulo o Nombre" required>
                                            <div class="invalid-feedback">
                                            Doesn't Looks good!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Descripcion</label>
                                            <textarea class="form-control is-valid" id="desc" name="desc" rows="4" cols="50" placeholder="Aquí puedes insertar la descripcion que deseas mostrar en la prueba." required></textarea>
                                            <div class="invalid-feedback">
                                            Doesn't Looks good!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="tema">Tema</label>
                                            <select class='form-control no-arrow' id='sel_tema' name='tema'> 
													<option value='Salud Mental'>Salud Mental</option>
													<option value='Matematicas'>Matematicas</option>
													<option value='P. Abstracto'>P. Abstracto</option>
													<option value='Logica'>Logica</option>
											</select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nivel">Nivel select</label>
                                            <select class="form-control no-arrow" id="nivel" name="nivel">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                        </div>	
                                        <div class="form-group custom-file">
                                            
                                            <label class="custom-file-label" for="image">Choose file...</label>
                                            <input type="file" class="custom-file-input form-control" id="image" name="image" accept='.png, .jpg, .jpeg' required/>
                                            <span id="imagen">Nada seleccionado</span>
                                        </div>					
										<div class='container-fluid p-4 text-center'>
											<button type='submit' class='btn btn-success mt-2'>Añadir</button>
										</div>
									</form>
								</div> 
							</div>
							
						</div>
                        
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
  </script>
    <script>
        function Confirm() {
            if (confirm("¿Está seguro que desea realizar esta acción?")) {
            } else {
                event.preventDefault();
                return false;
            }

        }
        //controlador de Evento submit
        document.getElementById("btnDel").addEventListener("submit", Confirm);

        //MOSTRAR NOMBRE DE ARCHIVO
        const input = document.getElementById('image');
        const span = document.getElementById('imagen');

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
                span.textContent = "Nada seleccionado";
            }
        });
    </script>
    </body>

    </html>