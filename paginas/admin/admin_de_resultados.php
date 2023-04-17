<?php
    session_start();
    if(!isset($_SESSION["Usuario"])&&($_SESSION['rol']!='administrador')){
      header ('Location: ../index.php');
  }
    $_SESSION["Usuario"];
?>
<?php
        include "../../modules/menu/menu_admin.php"
    ?>
        <div class="container text-center">
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
                      <tbody class="text-center">
                          <?php

                          $sql_query = "SELECT * FROM resultados ";//join usuario on usuario.email
                          $resultset = mysqli_query($con, $sql_query) or die("error base de datos:". mysqli_error($con));
                          while( $libro = mysqli_fetch_assoc($resultset) ) {
                         
                          ?>
                             <tr id="<?php echo $libro ['id_usuario']; ?>">
                             <td><?php echo $libro['id']; ?></td>
                             <td><?php echo $libro['nombre']; ?></td>
                             <td><?php echo $libro['apellido']; ?></td>
                             <td><?php echo $libro['nivel de prueba']; ?></td>
                             <td><a class="btn btn-primary fa fa-download" href="../../controlador/pdf.php"> Descarga de pdf</a></td>   
                             <td><a class="btn btn-primary fa fa-eye" href="../../controlador/mpdf/pdf/index.php"> Ver el pdf</a></td>   
                             <td><a class="btn btn-success fa fa-share-square" href="../../controlador/phpmailer/enviarC.php?CorreoA='<?php echo $libro ['id_usuario']; ?>'"> Enviar correo contratado</a></td>   
                             <td><a class="btn btn-danger fa fa-share-square" href="../../controlador/phpmailer/enviarCNO.php?CorreoA='<?php echo $libro ['id_usuario']; ?>'"> Enviar correo no contratado</a></td>   
                            </tr>
                          <?php } ?>
                          <?php  ?>
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