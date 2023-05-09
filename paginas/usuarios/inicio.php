<?php
session_start();
if (!isset($_SESSION["Usuario"])) {
  header('Location: ../index.php');
}

$_SESSION["Usuario"];
?>

<?php
include("../../modules/menu/menu_usuario.php");
?>

<div class="main-content">
<h2 class="text-break">En la siguiente tabla vera las respuestas de sus pruebas en un PDF o de lo contraria podra verlas directamente en la pagina</h2>
<table class="table table-striped mt-5 text-center">
  <thead>

    <?php include("../../configuracion/controller/conexion.php");
    $conexion = new Conexion();
    $con = $conexion->conectarDB();
    ?>
    <tr>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Nivel</th>
      <th>Tema</th>
      <th>Descarga</th>
      <th>Respuestas</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql_query = "SELECT * FROM resultados WHERE id_usuario = '".$_SESSION['idUsuario']."'";//join usuario on usuario.email
    $resultset = mysqli_query($con, $sql_query) or die("error base de datos:". mysqli_error($con));
    while( $libro = mysqli_fetch_assoc($resultset) ) {
      $sql = "SELECT * FROM usuario WHERE idUsuario = '".$libro ['id_usuario']."'";
      $resultset1 = mysqli_query($con,$sql) or die("error base de datos:". mysqli_error($con));
      $Usuario = mysqli_fetch_assoc($resultset1);
      $sql2 = "SELECT * FROM prueba WHERE id = '".$libro["id_prueba"]."'";
      $resultset2 = mysqli_query($con,$sql2) or die("error base de datos:". mysqli_error($con));
      $Prueba = mysqli_fetch_assoc($resultset2);
    ?>
       <tr id="<?php echo $libro ['id_usuario']; ?>">
       <td><?php echo $Usuario ['nombre']; ?></td>
       <td><?php echo $Usuario ['apellido']; ?></td>
       <td><?php echo $Prueba ['nivel']; ?></td>
       <td><?php echo $Prueba ['tema']; ?></td>
       <td><a class="btn btn-outline-primary fa fa-download" href="../../controlador/pdf.php?id='<?php echo $libro ['id_usuario'] ?>'"> Descarga de la prueba</a></td>   
       <td><a class="btn btn-outline-primary fa fa-eye" href="../../controlador/mpdf/pdf/index.php?id='<?php echo $libro ['id_usuario'] ?>'"> Ver el pdf</a></td>   
      </tr>
    <?php } ?>
  </tbody>
</table>



</body>

</html>