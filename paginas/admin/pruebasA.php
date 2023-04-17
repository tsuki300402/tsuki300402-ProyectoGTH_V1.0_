<?php
 class Crear {
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
	function Pruebas(){
		$enlace = $this->conectarDB();
        $consulta = "SELECT * FROM prueba ORDER by id ASC ";
        $table="<table class='table table-bordered'><thead class='text-center'><tr><td>No.</td><td>Nombre</td><td>Descripción</td><td>Preguntas</td><td>Tema</td><td>Nivel</td><td>Estado</td><td>Editar</td><td>Cambiar Estado</td></tr></thead><tr>";
		if ($resultado = mysqli_query($enlace, $consulta)and($value = mysqli_fetch_assoc($resultado))) { 
            echo $table;
            foreach ($resultado as $value){ 
                echo "<td>".$value['id']."</td>";
                echo "<td>".$value['titulo']."</td>";
                echo "<td>".$value['descripcion']."</td>";
                echo "<td>".$value['cantidad_preguntas']."</td>";
                echo "<td>".$value['tema']."</td>";
                echo "<td>".$value['nivel']."</td>";
                echo "<td>".$value['estado']."</td>";
                echo "<form action='mod.php' method='post'>";
                echo "<input type='hidden' name='idBtnMod' value='".$value['id']."'>";
                echo "<td><button class='btn btn-success'  name='btnMod'><i class='bi bi-pencil-square'></i></button></td>";
                echo "</form>";
                echo "<form action='../funciones/estado.php' method='post'>";
                echo "<input type='hidden' name='idBtnDel' value='".$value['id']."'>";
                echo "<td class='text-center'><button class='btn btn-danger' onclick='return Confirm()' name='btnDel' id='btnDel' value='prueba'><i class='bi bi-recycle'></i></button></td></tr>";
                echo "</form>";               
	        }
            echo "</table>";
	    }
 	}
 }
 $conexion = new Crear();
 $conexion->Pruebas();
?>