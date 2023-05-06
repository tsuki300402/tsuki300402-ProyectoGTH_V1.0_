<?php include "../../modules/menu/menu.php" ?>
  <style>
    /* Cubo */
#pool{
    width: 100%;
    height: 339px;
}
#cube{
    transform-style: preserve-3d;
    width: 200px;
    height: 200px;
    margin-left: auto;
    margin-right: auto;
    position: relative;
    animation: loop 10s linear infinite;
}
#cube img{
    margin-top: 20%;
    position: absolute;
    width: 200px;
    height: 200px;
    opacity: 0.9;
    width: inherit;
}
#cube img:nth-child(1){
    transform: rotateY(0deg) translateZ(100px);
}
#cube img:nth-child(2){
    transform: rotateY(90deg) translateZ(100px);
}
#cube img:nth-child(3){
    transform: rotateY(180deg) translateZ(100px);
}
#cube img:nth-child(4){
    transform: rotateY(-90deg) translateZ(100px);
}
@keyframes loop{
    0%{
        transform: rotateX(0deg) rotateY(0deg);
        }
        100%{
            transform: rotateY(360deg);
        }
}
</style>
<div class="row featurette mt-2">
  <div class="col-md-7 order-md-2">
    <h2 class="featurette-heading fw-normal lh-1">MISION</h2>
    <p class="lead">
        Somos una empresa dedicada al desarrollo y analisis de sistemas informaticas. Contamos con una gran cantidad de conocimientos especializados en diferentes areas para brindar el mejor servicio y sistema posible.
    </p>
  </div>
  <div class="col-5 bg-success p-4">
                <div class="container bg-white">
                    <div id="cont">
                        <div id="pool">
                            <div id="cube">
                                <img src="../../img/1.png" alt="">
                                <img src="../../img/1.png" alt="">
                                <img src="../../img/1.png" alt="">
                                <img src="../../img/1.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
  <div class="col-md-5 order-md-1">
  <img src="../../img/icono3.png" alt="" class="img-fluid"  style="width: 400px; height: 300px">

  </div>
</div>

<hr class="featurette-divider">

<div class="row featurette">
  <div class="col-md-7">
    <h2 class="featurette-heading fw-normal lh-1">VISION</h2>
    <p class="lead">Tener una perspectiva estratégica la cual busca aprovechar al máximo de la parte de talento humano de Nielroqui para lograr nuestros objetivos empresariales y garantizar su éxito a largo plazo. Implica el desarrollo de políticas y prácticas de gestión de personas que permitan a Nielroqui atraer, retener y motivar a los mejores talentos, así como fomentar su crecimiento y desarrollo profesional.

En general, la visión de Nielroqui se enfoca en el fortalecimiento de la cultura organizacional y la construcción de un entorno de trabajo colaborativo, inclusivo y diverso, en el que los empleados se sientan valorados, respetados y comprometidos con los objetivos de la empresa.</p>
  </div>
  <div class="col-md-5">
  <img src="../../img/1.png" alt="" class="img-fluid "  style="width: 400px; height: 300px">

  </div>
</div>


<?php include("../../modules/footer.php") ?>
</body>
</html>