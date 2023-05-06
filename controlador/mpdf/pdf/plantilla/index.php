<?php




function getplantilla(){
  
  include("../../../configuracion/controller/conexion.php");
  $conexion = new Conexion();
  $con = $conexion->conectarDB();
  
  $_GET['id'];
  $usuario = $_GET['id'];

  
  $sql = "SELECT * FROM usuario where idUsuario = $usuario";
  $resultset = mysqli_query($con, $sql) or die("error base de datos:". mysqli_error($con));
  $dato=mysqli_fetch_assoc($resultset);
   
  $nombre = $dato ['nombre'];
  $apellido = $dato ['apellido'];
  $id = $dato['idUsuario'];

  $sql1= "SELECT * FROM respuestas WHERE idUsuario = '".$id."'";
  $resultset1 = mysqli_query($con,$sql1) or die("error base de datos:". mysqli_error($con));
  $respuestas = mysqli_fetch_assoc($resultset1);

  $idP = $respuestas ['idprueba'];
  $array = $respuestas ['respuesta'];
  $R = unserialize($array, ['allowed_classes' => false]);

  $sql2 = "SELECT * FROM preguntas WHERE idprueba = '".$idP."'";
  $resultset2 = mysqli_query($con,$sql2) or die("error base de datos:". mysqli_error($con));
  $preguntas = mysqli_fetch_assoc($resultset2);

  $array1 = mysqli_fetch_array($resultset2,MYSQLI_BOTH); 
  //$P = unserialize($array1, ['allowed_classes' => false]);
  $plantilla = '<body>
  <header class="clearfix">
  <div id="logo">
  <img src="../../../img/empresa/NielRoo_logo.png">
  </div>
    <h1>Resultado de la prueba del usuario '.$nombre.'</h1>
    <div id="company" class="clearfix">
    <div>NielRoo</div>
    <div>calle 26 #15-24 Tunja</div>
      <div>316-2657240 - 302-2196510</div>
      <div><a href="mailto:">proyectoGTH2022@gmail.com</a></div>
    </div>
    <div id="project">
    <div><span>Proyecto</span> Pagina de talento humano</div>
    <div><span>Nombre</span> '.$nombre.'</div>
    <div><span>Apellido</span> '.$apellido.'</div>
    <div><span>Fecha</span> Mayo 03, 2023</div>
    </div>
    </header>
    <main>
    <table>
      <thead>
        <tr>
          <th class="service">Pregunta</th>
          <th class="desc">Respuesta</th>
          </tr>
          </thead>
          <tbody>
          <tr>
          <td class="service">'.$array1['0'].'</td>
          <td class="desc">'.$R['0'].'</td>

          </tr>
          <tr>
          <td class="service">'.$array1['1'].'</td>
          <td class="desc">'.$R['1'].'</td>

          </tr>
          <tr>
          <td class="service">'.$array1['2'].'</td>
          <td class="desc">'.$R['2'].'</td>

          </tr>
          <tr>
          <td class="service">'.$array1['3'].'</td>
          <td class="desc">'.$R['3'].'</td>

        </tr>
          </tbody>
          </table>
          <div id="notices">
          <div>NOTICE:</div>
          <div class="notice">Estos son resultados dado por un experto psicologo empleando sus conocimientos en el departamento de talento humano</div>
          </div>
          </main>
          <footer>
          Invoice was created on a computer and is valid without the signature and seal.
          </footer>
          </body>';

            return $plantilla;
          }
          
            