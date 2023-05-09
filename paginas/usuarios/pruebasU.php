<?php
class Crear
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
	function Pruebas()
	{
		$enlace = $this->conectarDB();
		$consulta = "SELECT * FROM prueba ORDER by id ASC ";
		if ($resultado = mysqli_query($enlace, $consulta)) {
		}
		$num_filas = mysqli_num_rows($resultado);
		$total_pag = ceil($num_filas / 4);
		$pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
		$inicio = ($pagina_actual - 1) * 4;
		$sql = "SELECT * FROM prueba where estado!='inactivo' ORDER BY id ASC LIMIT $inicio, 4";
		$resultado_paginado = mysqli_query($enlace, $sql);
		while ($value = mysqli_fetch_assoc($resultado_paginado)) {
			echo "<form action='./arc.php' class='col-3' name='" . $value['tema'] . "' id='" . $value['id'] . "' method='POST'>
				<div class='container bg-dark text-start p-3' style='height:270px; background-image: url(../../img/1.png);'>
					<div class='container text-white' style='background-color: rgba(31, 30, 30, 0.311);'>
						<b class='fs-5' name='" . $value['id'] . "' >" . $value['titulo'] . "</b>
					</div>
					<div class='deta container text-center mt-1' name='" . $value['id'] . "' style='border:1px solid grey; background-color: #f8f2f281;'>
						
							<p class='mt-3' style='font-size:12px;'>" . $value['descripcion'] . "</p>
						
						<button type='submit' class='btn btn-sm btn-success'> Detalles <i class='bi-bookmark-plus'></i></button>
						<div class='d-grid text-end' style='font-size: 12px; color:#FFFFFF;'>
										<em><b> Nivel " . $value['nivel'] . "</b></em>
						</div>
						<input type='hidden' name='archivo' value='" . $value['id'] . "'></input>
						<input type='hidden' value='selected' name='lo'><i class='bi bi-chevron-down' id='" . $value['id'] . "'></i></input>
					</div>
				</div>
				
			  </form>";
		}
		echo "<div class='conPag'>
				   <div class='pagination'>
				   <button class='btn1' onclick='BtnPrev()'>prev</button>
					 <ul>";
		for ($i = 1; $i <= $total_pag; $i++) {
			if ($i == $pagina_actual) {
				echo "<li class='link active' value='$i'><a style='text-decoration none' href='categoriaUser.php?pagina=$i' onclick='activeLink()'>$i</a></li> ";
			} else {
				echo "<li class='link' value='$i'><a href='categoriaUser.php?pagina=$i'>$i</a></li> ";
			}

		}
		echo "</ul>
					<button class='btn2' onclick='BtnNext()'>next</button>
					</div>
		 		</div>";
	}

}
$conexion = new Crear();
$conexion->Pruebas();
?>