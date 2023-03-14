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
  <div class="d-flex">
    <div id="sidebar">
      <div class="p-2">
        <a href="#" class="navbar-brand text-center text-light w-100 p-4 border-bottom">
          Logo de la empresa
        </a>
      </div>
      <div id="sidebar-accordion" class="accordion">
        <div class="list-group">
          <a href="#dashboard-items" data-toggle="collapse" aria-expanded="false"
            class="list-group-item list-group-item-action bg-dark text-light">
            <i class="fa fa-tachometer mr-3" aria-hidden="true"></i>Dashboard
          </a>
          <a href="perfil.php" data-toggle="collapse" aria-expanded="false"
            class="list-group-item list-group-item-action bg-dark text-light">
            <i class="fa fa-user mr-3" aria-hidden="true"></i>Perfil
          </a>
          <a href="#profile-items" data-toggle="collapse" aria-expanded="false"
            class="list-group-item list-group-item-action bg-dark text-light">
            <i class="fa fa-user mr-3" aria-hidden="true"></i>Prueba
          </a>
          <a href="#setting-items" data-toggle="collapse" aria-expanded="false"
            class="list-group-item list-group-item-action bg-dark text-light">
            <i class="fa fa-cog mr-3" aria-hidden="true"></i>Configuración
          </a>
          <div id="setting-items" class="collapse" data-parent="#sidebar-accordion">
            <div class="d-flex flex-row text-center">
              <a href="#" class="list-group-item list-group-item-action bg-dark text-light">
              <i class="fa fa-window-close mr-3"></i>Cerrar Sesion
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content w-100">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-xl">
          <div class="text-white text-center">Bienvenido nombre del usuario a la empresa nombre de empresa</div>
        </div>
      </nav>
      <section class="p-3">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <?php 
              include "../configuracion/configuracion.php";
                //$user_id = $_GET['id']; // Obtener el ID del usuario de la URL
                $query = "SELECT * FROM usuario "; /*WHERE id = $user_id*/
                $resultado = mysqli_query($conn, $query); // Ejecutar la consulta SQL
              ?>
                <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        
                        
                        
                    </tr>
                    <tr>
                        <th>Nombre</th>
                    </tr>
                    <tr>
                        <th>Email</th>
                    </tr>
                    <tr>
                        <th>Fecha de registro</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        
                        
                        
                    </tr>
                    <tr>
                        <td><?php echo $row['nombre']; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $row['email']; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $row['fecha_registro']; ?></td>
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