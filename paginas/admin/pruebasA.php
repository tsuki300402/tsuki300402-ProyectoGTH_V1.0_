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
        $consulta = "SELECT * FROM prueba where estado != 'inactivo' ORDER by id ASC ";
        $table="<table class='table table-bordered'><thead class='text-center'><tr><td>Num</td><td>Nombre</td><td>Descripción</td><td>Preguntas</td><td>Tema</td><td>Nivel</td><td>Estado</td><td>Editar</td><td>Eliminar</td></tr></thead><tr>";
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
                echo "<td><button class='btn btn-danger' onclick='return Confirm()' name='btnDel' id='btnDel' value='prueba'><i class='bi bi-recycle'></i></button></td></tr>";
                echo "</form>";

                echo " <div class='modal fade' id='modal'>";
                echo " <div class='modal-dialog'>" ;
                echo " <div class='modal-content'>" ;
                echo " <!--modal header-->" ;
                echo " <div class='modal-header'>" ;
                echo " <h2>Pregunta </h2>" ;
                echo " <button type='button' class='btn-close' data-bs-dismiss='modal'></button>" ;
                echo " </div>" ;
                echo " <div class='modal-body'>" ;
                echo " <form action='upload.php' method='post'>" ;
                echo " <div class='container-fluid p-4 text-center'>" ;
                echo " <span></span>" ;
                echo " </div>" ;									
                echo " <div class='container-fluid p-4 text-center'>" ;
                echo " <input type='text' class='form-control' id='asnw' name='asnw' placeholder=''>" ;
                echo " <button type='button' class='btn btn-primary mt-2'>Subir</button>" ;
                echo " </div>" ;
                echo " </form>" ;
                echo " </div>" ; 
                echo " </div>" ;
                echo " </div>" ;
                

	        }
            echo "</table>";
	    }
 	}
 }
 $conexion = new Crear();
 $conexion->Pruebas();
?>