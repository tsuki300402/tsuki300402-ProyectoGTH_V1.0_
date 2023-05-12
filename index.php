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
  <!-- -->
  <div class=" mt-5 container">
    <div class="row justify-content-center">
      <div class="col-6">
      <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
  <!-- Indicadores -->
  
  <!-- Slides -->
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="./img/misión.jpg" alt="Imagen 1" class="d-block w-100" style="height:450px; ">
      <div class="carousel-caption bg-white">
        <h3 class="text-dark">Mision</h3>
        <p class="text-dark text-break text-start">Proporcionar soluciones tecnológicas innovadoras y personalizadas para optimizar los procesos de gestión de talento humano de nuestros clientes. A través de nuestro conocimiento técnico y experiencia en desarrollo web, nos esforzamos por ofrecer una plataforma robusta y fácil de usar que permita a las organizaciones atraer, reclutar, seleccionar y gestionar de manera eficaz a su talento humano.</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="10000">
      <img src="./img/vision.jpg" alt="Imagen 2" class="d-block w-100" style="height:450px; ">
      <div class="carousel-caption bg-white">
        <h3 class="text-dark">Vision</h3>
        <p class="text-dark text-break text-start"> Nuestra visión es ser la plataforma líder a nivel mundial en el ámbito del talento humano, brindando soluciones innovadoras y tecnológicas que transformen la forma en que las organizaciones reclutan, gestionan y desarrollan a su talento. Nos esforzamos por ser reconocidos como el socio estratégico preferido por las empresas, al ofrecer una experiencia única y personalizada para todos los profesionales y candidatos que utilizan nuestra plataforma.</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="10000">
      <img src="./img/nosotros.jpg" alt="Imagen 3" class="d-block w-100" style="height:450px; ">
      <div class="carousel-caption bg-white">
        <h3 class="text-dark">Nosotros</h3>
        <p class="text-dark text-break text-start"> En nuestra empresa de desarrollo, estamos dedicados a crear soluciones innovadoras y tecnológicas en el ámbito del talento humano. Nuestro equipo apasionado y altamente capacitado se esfuerza por transformar la forma en que las organizaciones reclutan, gestionan y desarrollan a su talento.</p>
      </div>
    </div>
  </div>
  
  <!-- Controles -->
  <a class="carousel-control-prev" data-bs-target="#myCarousel" type="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only"></span>
  </a>
  <a class="carousel-control-next" data-bs-target="#myCarousel" type="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only"></span>
  </a>
</div>
      </div>
    </div>
  </div>
    <hr>  
    <!--Ubicacion-->
  
    <!--Fin -->
    <hr>
  <!-- -->
  <!--CARRUSEL-->
  <div class="container">
   <div class="row justify-content-center">
    <div class="col-6">
      <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="10000">
            <img src="./img/img4.jpg" class="d-block w-100">
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
    
    <!--INICIO DE SESION-->
    <div class="mt-5 col-6 w-25 text-center mx-auto">
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
   </div>
  </div>
  </div>

  <!--row-->
  <div class="container-fluid">
    <div class="row justify-content-center">

      <?php include("./modules/footer.php") ?>
</body>

</html>