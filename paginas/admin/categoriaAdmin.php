<?php
    session_start();
    if(!isset($_SESSION["Usuario"])&&($_SESSION['rol']!='administrador')){
        header ('Location: ../index.php');
    }
    $_SESSION["Usuario"];
?>
    <?php
       include "../../modules/menu/menu_admin.php"
    ?>
    
   <div class="container">
        <div class="row justify-content-center">
            <div class="col-4 p-4">
                        
            </div>
            <div class="col-4 p-4">
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row mt-5">
            <?php
                include 'pruebasA.php'; 
            ?>
            <a class="col-1 btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdd"><i class="bi bi-cloud-plus-fill" style="font-size:19px;"> Añadir</i></a>
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
									<form action='../funciones/upload.php' method='post' class="was-validated">
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
                                            <input type="text" class="form-control is-valid" id="tema" name="tema" placeholder="Ingrese el tema" required>
                                            <div class="invalid-feedback">
                                            Doesn't Looks good!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="nivel">Nivel select</label>
                                            <select class="form-control" id="nivel" name="nivel">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>	
                                        <div class="form-group custom-file">
                                            <label class="custom-file-label" for="image">Choose file...</label>
                                            <input type="file" class="custom-file-input form-control" id="image" name="image" required>
                                            <div class="invalid-feedback">Invalid custom file feedback</div>
                                        </div>					
										<div class='container-fluid p-4 text-center'>
											<button type='submit' class='btn btn-success mt-2'>Añadir</button>
										</div>
									</form>
								</div> 
							</div>
							
						</div>
                        
    <script>
      function Confirm() {
        if(confirm("¿Está seguro que desea realizar esta acción?")) {
        } else {
          event.preventDefault(); 
          return false;
        }
       
      }
//controlador de Evento submit
      document.getElementById("btnDel").addEventListener("submit", Confirm);
    </script>
</body>
</html>