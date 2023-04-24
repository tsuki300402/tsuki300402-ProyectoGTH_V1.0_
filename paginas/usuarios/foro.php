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



<h2>Lista de foros</h2>
<table class="table table-striped mt-5">
  <thead>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mymodal">Agregar nuevo
      tema</button>
    <?php include("../../configuracion/controller/conexion.php");
    $conexion = new Conexion();
    $con = $conexion->conectarDB();
    ?>
    <tr>
      <th>Autor</th>
      <th>Titulo</th>
      <th>Mensaje</th>
      <th>Fecha</th>
      <th>Respuestas</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $resultado = mysqli_query($con, "SELECT * FROM tema");
    while ($fila = mysqli_fetch_assoc($resultado)) {
      ?>
      <tr>
        <td>
          <?php echo $fila['autor']; ?>
        </td>
        <td>
          <?php echo $fila['titulo']; ?>
        </td>
        <td>
          <?php echo $fila['mensaje']; ?>
        </td>
        <td>
          <?php echo $fila['fecha']; ?>
        </td>
        <td>
          <?php echo $fila['respuestas']; ?>
        </td>
        <td>
          <?php echo '<a class="btn btn-primary" href="../funciones/ver-tema.php?id=' . $fila['id'] . '">Ver tema</a>' ?>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
<!-- Modal para agregar un nuevo tema -->
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="nuevoTemaModalLabel">Nuevo tema</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../funciones/agregar-tema.php">
          <input type='hidden' id="identificador" name='identificador' value="">
          <div class="form-group">
            <label for="autor">Autor</label>
            <input type="text" class="form-control" id="autor" name="autor" required>
          </div>
          <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
          </div>
          <div class="form-group">
            <label for="mensaje">Descripción</label>
            <textarea class="form-control" id="mensaje" name="mensaje" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Agregar tema</button>
        </form>
      </div>
    </div>
  </div>
</div>


</body>

</html>