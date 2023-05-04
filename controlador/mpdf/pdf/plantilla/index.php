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
    <div><span>Apellido</span> Mayo 03, 2023</div>
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
          <td class="service">Design</td>
          <td class="desc">Creating a recognizable design solution based on the companys existing visual identity</td>

          </tr>
          <tr>
          <td class="service">Development</td>
          <td class="desc">Developing a Content Management System-based Website</td>

          </tr>
          <tr>
          <td class="service">SEO</td>
          <td class="desc">Optimize the site for search engines (SEO)</td>

          </tr>
          <tr>
          <td class="service">Training</td>
          <td class="desc">Initial training sessions for staff responsible for uploading web content</td>

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
          
            