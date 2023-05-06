<?php
class Traer
{
	function conectarDB()
	{
		$servidor = "localhost";
		$user = "root";
		$password = "";
		$database = "gthumano";
		$con = new mysqli($servidor, $user, $password, $database);

		if ($con->connect_error) {

			$_SESSION["ErrorDB"] = "No ha sido posible establecer la conexion con la base de datos";
			header('Location: config.php');
		} else {
			$status = 1;
		}
		return $con;
	}

	function Archivos($id)
	{
		$enlace = $this->conectarDB();
		$consulta = "SELECT * FROM prueba where id='" . $id . "';";
		if ($resultado = mysqli_query($enlace, $consulta) and ($value = mysqli_fetch_assoc($resultado))) {
			foreach ($resultado as $value) {
				echo "<div class='container mt-2 text-center'>";
				echo " <table class='table table-bordered text-center'>
							<thead>
								<td><b>Portada</b></td>
								<td colspan='2'><b>Info</b</td>
							</thead>
							<tr>
								<td rowspan='2'><img src='../../img/" . $value['imagen'] . "'></td>
								<td><b class='text-start '>Titulo</b></td>
								<td ><i class='text-end'>" . $value['titulo'] . "</i></td>
							</tr>
							<tr >
								<td><b class='text-start'>Tema</b></td>
								<td><i class='text-end'> " . $value['tema'] . "</i></td>
								
							</tr>
							<tr>
								<td colspan='3'><b>Descripcion</b</td>
							</tr>
							<tr>
								
								<td colspan='3'><i>" . $value['descripcion'] . "</i></td>
							</tr>
							<tr>
								<td colspan='3'><b>Progreso</b></td>
							</tr>
							<tr>
								<td colspan='3'>
									<div class='progress mt-1' style='height: 20px'>
										<div class='progress-bar bg-success progress-bar-striped progress-bar-animated' style='width:" . $value['progreso'] . "%'>
										" . $value['progreso'] . "%	
										</div>
									</div>
								</td>
									<input type='hidden' name='archivo' value='" . $value['id'] . "'></input>
							</tr>
						</table>
						<button class='btn mt-2 btn-success btn-lg' id='Edit' name='Edit'><i class='bi bi-clipboard-check'></i> Realizar </button>";
				echo "</div>";
			}
		}

	}

	function Data($id, $idUser)
	{
		$enlace = $this->conectarDB();
		$consulta = "SELECT * FROM preguntas WHERE idprueba=" . $id . ";";
		if ($resultado = mysqli_query($enlace, $consulta) and ($value = mysqli_fetch_assoc($resultado))) {
			echo "<form class='form mt-4' action='../funciones/submit.php' method='POST'>";
			foreach ($resultado as $value) {
				$answ = $value['pregunta'];
				$idQ = $value['idprueba'];

				echo "
				<div class='form-page'>
					<label for='name'><h2>Pregunta</h2></label>
					<div class='container p-4 border'>
					<b>" . $answ . "</b>
					</div>
				
					<label for='valores[]'>Respuesta</label>
					<input type='text' class='form-control' id='valores[]' name='valores[]'>
				</div>
				<input type='hidden' name='idQuest' value='" . $idQ . "'></input>
				<input type='hidden' name='idUser' value='" . $idUser . "'></input>
				";
			}
			echo "<div class='form-navigation'>
				<button class='previous-button' type='button'>Anterior</button>
				<button class='next-button' type='button'>Siguiente</button>
			</div>
		</div>	
	</form>";
		}
	}
	
	function Listar($id){
		$enlace=$this->conectarDB();
		$sql="SELECT * FROM preguntas WHERE idprueba = ".$id." ;";
		if ($resultado = mysqli_query($enlace, $sql)and($value = mysqli_fetch_assoc($resultado))) { 
			$list="<table class='table table-bordered text-center'><thead><tr><td><b>Num</b></td><td><b>Pregunta</b></td><td><b>Modificar</b></td></tr></thead>";
			echo $list;
			$i=1;
			foreach($resultado as $value){
					echo "<tr><td>".$i."</td><td>".$value["pregunta"]."</td><td><button class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#modal".$i."'><i class='bi bi-pencil-square'></i></button></td>";
					echo " <div class='modal fade' id='modal".$i."'>";
					echo " <div class='modal-dialog'>" ;
					echo " <div class='modal-content'>" ;
					echo " <!--modal header-->" ;
					echo " <div class='modal-header'>" ;
					echo " <h2>Pregunta </h2>" ;
					echo " <button type='button' class='btn-close' data-bs-dismiss='modal'></button>" ;
					echo " </div>" ;
					echo " <div class='modal-body'>" ;
					echo " <form action='upload.php' method='post'>" ;
					echo "	<div class='form-group'>
								<label for='title'>Modificar</label>
								<textarea class='form-control is-valid' id='title' name='title' rows='4' cols='50'required>".$value['pregunta']."</textarea>
								<div class='invalid-feedback'>
									Doesn't Looks good!
								</div>
							</div>";									
					echo " <div class='container-fluid text-center'>" ;
					echo " <button type='button' class='btn btn-warning mt-2'>Modificar</button>" ;
					echo " </div>" ;
					echo " </form>" ;
					echo " </div>" ; 
					echo " </div>" ;
					echo " </div>" ;
				$i++;
				
			}
			echo "</table>";
		}		
	}

	function Prueba($id){
		$enlace = $this->conectarDB();
        $consulta = "SELECT * FROM prueba where id='".$id."';";
		if ($resultado = mysqli_query($enlace, $consulta)and($value = mysqli_fetch_assoc($resultado))) { 
            foreach ($resultado as $value){ 
				echo "<script>
						const  valor_tema = '".$value['tema']."';
						const valor_nivel = '".$value['nivel']."'
					  </script>";
				echo "<form action='../funciones/update.php' method='post'  class='was-validated' enctype='multipart/form-data'>
						<input type='hidden' name='idP' value='" . $id . "'></input>
						<input type='hidden' name='imgAct' value='" . $value['imagen'] . "'></input>
						<table class='table table-bordered text-center'>
								<div class='row'>
									<div class='col'>
										<div class='text-center' style='margin-left:12px;;height:262px;width:224px;border:1px dashed #000;'>
											<img id='preview' src='../../img/".$value['imagen']."'  style='max-height:262px;max-width:220px;' alt='Vista previa de la imagen'>
										</div>
										<div class='form-group mt-1 mb-3 custom-file'>
											<label class='custom-file-label' for='image'>Seleccionar portada</label>
                                            <input type='file' accept='.png, .jpg, .jpeg' class='custom-file-input form-control' id='image' name='image' onchange='previewImage();'>

											<span id='errorArchivo' style='display:none; color:red;'>Nada seleccionado</span>
										</div>	
										<div class='form-group'>
												<label for='tema'>Tema</label>
												<select class='form-control no-arrow' id='sel_tema' name='tema'> 
													<option value='Salud Mental'>Salud Mental</option>
													<option value='Matematicas'>Matematicas</option>
													<option value='P. Abstracto'>P. Abstracto</option>
													<option value='Logica'>Logica</option>
												</select>
										</div>
										<div class='form-group'>
												<label for='estado'>Estado</label>
												<input type='text' class='form-control is-valid' disabled id='estado' name='estado' value='".$value['estado']."' required>
												<div class='invalid-feedback'>
												Doesn't Looks good!
												</div>
										</div>										
									</div>	
									<div class='col'>
											<div class='form-group'>
												<label for='title'>Titulo</label>
												<textarea class='form-control is-valid' id='title' name='title' rows='4' cols='50'required>".$value['titulo']."</textarea>
												<div class='invalid-feedback'>
													Doesn't Looks good!
												</div>
											</div>
											<div class='form-group'>
												<label for='exampleInputPassword1'>Descripcion</label>
												<textarea class='form-control is-valid' id='desc' name='desc' rows='4' cols='50'required>".$value['titulo']."</textarea>
												<div class='invalid-feedback'>
													Doesn't Looks good!
												</div>
                                      		</div>
											<div class='form-group'>
												<label for='nivel'>Nivel</label>
													<select class='form-control no-arrow' id='sel_nivel' name='nivel'>
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														<option>5</option>
													</select>
											</div>
											<div class='form-group'>
												<label for='cant'>Cantidad de Preguntas</label>
												<input type='text' class='form-control is-valid' disabled id='cant' name='cant' value='".$value['cantidad_preguntas']."' required>
												<div class='invalid-feedback'>
												Doesn't Looks good!
												</div>
											</div>
									</div>
								</div>
								<div class='row'>
									<div class='col text-center'>
										<button class='btn mt-2 btn-success btn-lg' id='Edit' name='Edit'><i class='bi bi-clipboard-check'></i> Confirmar </button>	
									</div>
								</div>
							</table>
						</form>";
				}
				
			}	
 	}
	
 }
?>