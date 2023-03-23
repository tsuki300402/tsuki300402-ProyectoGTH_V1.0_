<?php
  session_start();
    if(!isset($_SESSION["Usuario"])){
        header ('Location: ../index.php');
    }
    $_SESSION["Usuario"];
      ?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <title>Hello, nombre del usuario</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--<link rel="stylesheet" href="styles.css">-->
  <!--<link href="../../libs/bootstrap-icons/bootstrap-icons.css"  rel="stylesheet">-->
  <style>
    #sidebar {
      width: 20%;
      height: 100vh;
      background: #343a40;
    }
  </style>
</head>

<body>
<?php include "../../modules/menu/menu_usuario.php" ?>
    
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <?php 
              include "../../configuracion/controller/conexion.php";
                $conexion = new Conexion();
                $con = $conexion->conectarDB();
                $user_id = $_GET['id']; // Obtener el ID del usuario de la URL
                $query = "SELECT * FROM usuario ";// WHERE id = $user_id
                $resultado = mysqli_query($con, $query); // Ejecutar la consulta SQL
                while($row = mysqli_fetch_assoc($resultado)){ 

                  ?>
                <div>
                  <p>Nombre:<?php echo $row['nombre']  ?></p>
                  <p>Apellido:<?php echo $row['apellido'] ?></p>
                  <p>Correo Electronico<?php echo $row['email'] ?></p>
                  <p>Rol:<?php echo $row['rol'] ?></p>
                </div>
                <?php }?>
          </div>
        </div>
      </section>
    </div>
  </div> 
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
  </script>
</body>

</html>