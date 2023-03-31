<<<<<<< HEAD
<?php
  session_start();
  require '../../configuracion/controller/conexion.php';
$idUsuario = $_SESSION['email']; //el cual debes tener al validar el login
echo $_SESSION['email'];
//realizo la consulta
$sql= "SELECT * FROM usuario WHERE id = :id"; 
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $idUsuario, PDO::PARAM_INT); 
$stmt->execute();
$row = $stmt->fetchObject();
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
                ?>
                <form method="POST" action="actualizarPerfil.php">
                <table>
                <tr>
                <td>Usuario:</td>
                <td><input type="text" name="usuario" value="<?=$row->usuario;?>"></td>
                </tr>
                <tr>
                <td>Correo:</td>
                <td><input type="text" name="correo" value="<?=$row->correo;?>"></td>
                </tr>
                ...

                </table>
                <button type="submit">Grabar Datos</button>
                </form>
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

=======
<?php
  session_start();
  require '../../configuracion/controller/conexion.php';
$idUsuario = $_SESSION['email']; //el cual debes tener al validar el login
//realizo la consulta
$sql= "SELECT * FROM usuario WHERE id = :id"; 
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $idUsuario, PDO::PARAM_INT); 
$stmt->execute();
$row = $stmt->fetchObject();
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
                ?>
                <form method="POST" action="actualizarPerfil.php">
                <table>
                <tr>
                <td>Usuario:</td>
                <td><input type="text" name="usuario" value="<?=$row->usuario;?>"></td>
                </tr>
                <tr>
                <td>Correo:</td>
                <td><input type="text" name="correo" value="<?=$row->correo;?>"></td>
                </tr>
                ...

                </table>
                <button type="submit">Grabar Datos</button>
                </form>
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

>>>>>>> d99c54bf9fd1770b22bd84ebea4c8fddb1207142
</html>