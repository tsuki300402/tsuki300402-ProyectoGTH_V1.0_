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
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2>Lista de los usuarios registrados en el sistema</h2>
              <table id="data_table" class="table table-striped mt-5">
                <thead>
                <button class="btn btn-primary mt-3" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mymodal">
                Agregar un nuevo usuario</button>
                        <?php include("../../configuracion/controller/conexion.php");
                                          $conexion = new Conexion();
                                          $con = $conexion->conectarDB();
                          ?>
                          <tr>
                              <th>Id</th>
                              <th>Nombre</th>
                              <th>Apellido</th>
                              <th>Email</th>
                              <th>Estado</th>
                              <th>Ultimo ingreso</th>   
                              <th>Cambiar Estado</th>   
                          </tr>
                      </thead>
                      <tbody>
                          <?php 
                          $sql_query = "SELECT * FROM usuario where rol='usuario'";
                          $resultset = mysqli_query($con, $sql_query) or die("error base de datos:". mysqli_error($con));
                          while( $libro = mysqli_fetch_assoc($resultset) ) {
                          ?>
                             <tr>
                             <td><?php echo $libro ['idUsuario']; ?></td>
                             <td><?php echo $libro ['nombre']; ?></td>
                             <td><?php echo $libro ['apellido']; ?></td>
                             <td><?php echo $libro ['email']; ?></td>
                             <td><?php echo $libro ['estado']; ?></td>
                             <td><?php echo $libro ['ultimo_ingreso']; ?></td>
                             <?php
                             echo "<form action='../funciones/estado.php' method='post'>";
                              echo "<input type='hidden' name='idBtnDel' value='".$libro['idUsuario']."'>";
                              echo "<td class='text-center'><button class='btn btn-danger' onclick='return Confirm()' name='btnDel' id='btnDel' value='usuario'><i class='bi bi-recycle'></i></button></td>";
                              echo "</form>";  ?>
                            </tr>
                          <?php } ?>
                      </tbody>
                  </table>  
                  <!--Modal-->
                  <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="nuevoTemaModalLabel">Nuevo Usuario</h5>
                          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <?php include_once ("../../configuracion/config/config.php"); ?>
                        </div>
                      </div>
                    </div>
                  </div>  
            </div>
          </div>
        </div>
      </section>
    </div>
</div>
<script>
      function Confirm() {
        if(confirm("¿Está seguro que desea realizar esta acción?")) {
        } else {
          event.preventDefault(); 
          return false;
        }
       
      }
//controlador de Evento submit
      document.getElementById("btnDel").addEventListener("submit", Confirm);
    </script>
</body>
</html>