<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Pagina de inicio">
  <link rel="Website Icon" href="http://localhost/ProyectoGTH_V1.0_/img/empresa/NielRoo_logo.png"  type="png">
  <title>hola,
    <?php echo $_SESSION['Usuario'] ?>
  </title>
  <link href="http://localhost/ProyectoGTH_V1.0_/css/custom.css" rel="stylesheet">
  <link href="http://localhost/ProyectoGTH_V1.0_/libs/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <script src="http://localhost/ProyectoGTH_V1.0_/js/bootstrap.bundle.min.js"></script>
  <script src="http://localhost/ProyectoGTH_V1.0_/jq/jquery-3.6.1.min.js"></script>
  <!-- Bootstrap CSS -->
  <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">-->

  <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
  <!--<link rel="stylesheet" href="styles.css">-->
  <!--<link href="../../libs/bootstrap-icons/bootstrap-icons.css"  rel="stylesheet">-->
  <!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
  integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
  integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
  </script>-->
  <style>
    #sidebar {
      width: 20%;
      height: 100vh;
      background: #343a40;
    }
  </style>
</head>

<body>
  <div class="content w-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-xl">
        <div class="text-white text-center">Bienvenido
          <?php echo $_SESSION['Usuario'] ?> a la empresa NielRooQui
          </div>
        </div>
      </nav>
      <div id="sidebar">

        <ul class="nav flex-column">
          <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Active</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled">Disabled</a>
      </li>
      </ul>
    </div>




      <section class="p-3">
        <div class="container">
          <div class="row">
            <div class="col-md-12">