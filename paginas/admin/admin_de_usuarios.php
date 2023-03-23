<?php
    session_start();
    if(!isset($_SESSION["Usuario"])){
        header ('Location: ../index.php');
    }
    $_SESSION["Usuario"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Pagina de inicio">
	<link href="http://localhost/ProyectoGTH_V1.0_/css/custom.css"  rel="stylesheet">
	<link href="http://localhost/ProyectoGTH_V1.0_/libs/bootstrap-icons/bootstrap-icons.css"  rel="stylesheet">
	<script src="http://localhost/ProyectoGTH_V1.0_/js/bootstrap.bundle.min.js"></script>
  <script src="http://localhost/ProyectoGTH_V1.0_/jq/jquery-3.6.1.min.js"></script>
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <title>Administracion de usuarios</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    #sidebar {
      width: 20%;
      height: 100vh;
      background: #343a40;
    }
  </style>
</head>

<body>
<div class="d-flex">
    <div id="sidebar">
      <div class="p-2">
        <a href="#" class="navbar-brand text-center text-light w-100 p-4 border-bottom">
          Logo de la empresa
        </a>
      </div>
      <div id="sidebar-accordion" class="accordion">
        <div class="list-group">
          <a href="" data-toggle="collapse" aria-expanded="false"
            class="list-group-item list-group-item-action bg-dark text-light">
            <i class="fa fa-tachometer mr-3" aria-hidden="true"></i>Dashboard
          </a>
          <a href="categoriaAdmin.php" data-toggle="collapse" aria-expanded="false"
            class="list-group-item list-group-item-action bg-dark text-light">
            <i class="fa fa-tachometer mr-3" aria-hidden="true"></i>Pruebas
          </a>
          <a href="#setting-items" data-toggle="collapse" aria-expanded="false"
            class="list-group-item list-group-item-action bg-dark text-light">
            <i class="fa fa-cog mr-3" aria-hidden="true"></i>Configuración
          </a>
          
              <a href="#" class="list-group-item list-group-item-action bg-dark text-light">
              <i class="fa fa-window-close mr-3"></i>Cerrar Sesion
              </a>
        </div>
      </div>
    </div>
    <div class="content w-100">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-xl">
          <div class="text-white text-center">Bienvenido <?php $_SESSION['Usuario'] ?> a la empresa nombre de empresa</div>
          
            <form class="form-inline my-2 my-md-0">
              <input class="form-control" type="text" placeholder="Search" aria-label="Search">
            </form>
          
        </div>
      </nav>
      <section class="p-3">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2>Lista de los aspirantes que realizaron las pruebas psicotecnicas</h2>
              <table id="data_table" class="table table-striped mt-5">
                <thead>
                        <?php include("../../configuracion/controller/conexion.php");
                                          $conexion = new Conexion();
                                          $con = $conexion->conectarDB();
                          ?>
                          <tr>
                              <th>Id</th>
                              <th>Nombre</th>
                              <th>Apellido</th>
                              <th>Nivel de prueba</th>   
                          </tr>
                      </thead>
                      <tbody>
                          <?php 
                          $sql_query = "SELECT * FROM resultados";
                          $resultset = mysqli_query($con, $sql_query) or die("error base de datos:". mysqli_error($con));
                          while( $libro = mysqli_fetch_assoc($resultset) ) {
                          ?>
                             <tr id="<?php echo $libro ['id']; ?>">
                             <td><?php echo $libro ['id']; ?></td>
                             <td><?php echo $libro ['nombre']; ?></td>
                             <td><?php echo $libro ['apellido']; ?></td>
                             <td><?php echo $libro ['nivel de prueba']; ?></td>
                             <td><a class="btn btn-primary fa fa-download" href="../../controlador/pdf.php"></a></td>   
                             <td><a class="btn btn-primary fa fa-eye" href="../../controlador/mpdf/pdf/index.php"></a></td>   
                             <td><a class="btn btn-primary fa fa-share-square" href="../../controlador/phpmailer/enviarC.php"></a></td>   
                            </tr>
                          <?php } ?>
                      </tbody>
                  </table>    
            </div>
          </div>
        </div>
      </section>
    </div>
</div>
</body>
</html>