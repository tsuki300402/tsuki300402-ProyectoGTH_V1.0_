<?php session_start();
//$_SESSION["email"] = $_POST['email'];
?>
  <?php include "./modules/menu/menu.php" ?>
  <?php
  if (isset($_SESSION["Error"])) {
    echo '<div class="alert alert-danger m-0"><i class="bi bi-x-octagon-fill"></i>';
    echo $_SESSION["Error"];
    echo '</div>';
    session_unset();
    session_destroy();
  }

  ?>
  <!--CARRUSEL-->
  <div class="container">
   <div class="row justify-content-center">
    <div class="col-4">
      <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="10000">
            <img src="./img/img.jpg" class="d-block w-100">
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="./img/img2.jpg" class="d-block w-100">
          </div>
          <div class="carousel-item">
            <img src="./img/img3.jpg" class="d-block w-100">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
   </div>
  </div>
  <hr>
  <!--row-->
  <div class="container-fluid">
    <div class="row justify-content-center">


      <!--INICIO DE SESION-->
      <div class="mt-5 col-4 w-25 text-center mx-auto">
        <div class="mt-5 d-grid mx-auto  ">
          <p>
            <a class="btn btn-block btn-primary btn-lg" data-bs-toggle="collapse" href="#usu" role="button"
              aria-expanded="false" aria-controls="collapseExample">
              INICIO DE SESION ASPIRANTE/EMPLEADO
            </a>

          </p>
          <div class="collapse" id="usu">
            <?php include "./configuracion/index.php" ?>
          </div>

          <p class="mt-2">
            <a class="btn btn-block btn-primary btn-lg" data-bs-toggle="collapse" href="#admin" role="button"
              aria-expanded="false" aria-controls="collapseExample">
              INICIO DE SESION ADMINISTRADOR
            </a>
          </p>
          <div class="collapse" id="admin">
            <?php include "./configuracion/index.php" ?>
          </div>
        </div>
      </div>

      <!--GRUPO DE BOTONES-->
      <div class="mt-5 col-4 w-25 text-center mx-auto">
        <div class="mt-5 d-grid mx-auto ">
          <a class="btn btn-block btn-primary btn-lg mb-3"
            href="http://localhost/ProyectoGTH_V1.0_/paginas/visitantes/misionvision.php">Mision/vision</a>
          <a class="btn btn-block btn-primary btn-lg mb-3"
            href="http://localhost/ProyectoGTH_V1.0_/paginas/visitantes/nosotros.php">Nosotros</a>
          <a class="btn btn-block btn-primary btn-lg mb-3"
            href="http://localhost/ProyectoGTH_V1.0_/paginas/visitantes/ubicacion.php">Ubicacion</a>
        </div>
      </div>
      <!--Fin del grupo de botones-->


      <?php include("./modules/footer.php") ?>
</body>

</html>