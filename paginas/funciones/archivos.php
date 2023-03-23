<?php
 class Traer {
	function conectarDB(){
        $servidor = "localhost";
        $user = "root";
        $password = "";
        $database = "gthumano";
        $con = new mysqli($servidor, $user, $password,$database);

        if($con->connect_error){
            
            $_SESSION["ErrorDB"]="No ha sido posible establecer la conexion con la base de datos";
            header('Location: config.php');
        }else{
            $status=1;
        }
        return $con;
    }
	
	function Archivos($id){
		$enlace = $this->conectarDB();
        $consulta = "SELECT * FROM prueba where id='".$id."';";
		if ($resultado = mysqli_query($enlace, $consulta)and($value = mysqli_fetch_assoc($resultado))) { 
            foreach ($resultado as $value){ 
				echo "<div class='container mt-2 text-center'>";
				echo " <table class='table table-bordered text-center'>
							<thead>
								<td><b>Portada</b></td>
								<td colspan='2'><b>Info</b</td>
							</thead>
							<tr>
								<td rowspan='2'><img src='../../../img/	".$value['imagen']."'></td>
								<td><b class='text-start '>Titulo</b></td>
								<td ><i class='text-end'>".$value['titulo']."</i></td>
							</tr>
							<tr >
								<td><b class='text-start'>Tema</b></td>
								<td><i class='text-end'> ".$value['tema']."</i></td>
								
							</tr>
							<tr>
								<td colspan='3'><b>Descripcion</b</td>
							</tr>
							<tr>
								
								<td colspan='3'><i>".$value['descripcion']."</i></td>
							</tr>
							<tr>
								<td colspan='3'><b>Progreso</b></td>
							</tr>
							<tr>
								<td colspan='3'>
									<div class='progress mt-1' style='height: 100%'>
										<div class='progress-bar bg-success progress-bar-striped progress-bar-animated' style='width:".$value['progreso']."%'>
										".$value['progreso']."%
										</div>
									</div>
								</td>
									<input type='hidden' name='archivo' value='".$value['id']."'></input>
							</tr>
						</table>
						<button class='btn mt-2 btn-success btn-lg' id='Edit' name='Edit'><i class='bi bi-clipboard-check'></i> Realizar </button>";
				echo "</div>";
	}
	}
	
 	}

	 function Data($id,$idUser){
        $enlace=$this->conectarDB();
        $consulta="SELECT * FROM preguntas WHERE prueba=".$id.";";
        if ($resultado = mysqli_query($enlace, $consulta)and($value = mysqli_fetch_assoc($resultado))) { 
            foreach ($resultado as $value){ 
                $answ=$value['pregunta'];
				$idQ=$value['idpregunta'];

				echo "<form class='form mt-4' action='../funciones/submit.php' method='POST'>
				<div class='text-start'>
					<h2>Pregunta #".$id."</h2>
				</div>
				<div class='container p-4 border'>
					<b>".$answ."</b>
					
				</div>
				<div class='form mt-2'>a
					<label for='answ'>Respuesta</label>
					<input type='text' class='form-control' id='res' name='res'>
				</div>
				<input type='hidden' name='idQuest' value='".$idQ."'></input>
				<input type='hidden' name='idUser' value='".$idUser."'></input>
				<div class='container text-center'>
				<button type='submit' class='btn btn-primary mt-2'>Subir</button>
				</div>
			</form>";
        }
        }
    }

	function Listar($id){
		$enlace=$this->conectarDB();
		$sql="SELECT * FROM prueba WHERE id = ".$id.";";
		if ($resultado = mysqli_query($enlace, $sql)and($value = mysqli_fetch_assoc($resultado))) { 
			$list="<table class='table table-bordered text-center'><thead><tr><td>Num</td><td>Pregunta</td><td colspan='2'>botones</td></tr></thead>";
			foreach($resultado as $value){
				echo $list;
				for($i=1;$i<5;$i++){
					echo "<tr><td></input>".$i."</td><td>".$value["pregunta ".$i]."</td><td><button class='btn btn-success' data-bs-toggle='modal' data-bs-target='#modal".$i."'><i class='bi bi-pencil-square'></i></button></td><td><form action='delete.php' method='post'><input type='hidden' name='pregunta' value='".$i."'></input><button type='submit' class='btn btn-danger'><i class='bi bi-trash3'></i></button></td></tr></form>";
					echo "<div class='row'>
					
					</div>
				</div>      ";
				}
				echo "</table>";

				echo "";
			}
		}
	}
 }
?>