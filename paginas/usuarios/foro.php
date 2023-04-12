<?php /*
require('configuracion.php');
require('funciones.php');
include('header.php');
/* Pedimos todos los temas iniciales (identificador==0)
* y los ordenamos por ult_respuesta 
$sql = "SELECT id, autor, titulo, fecha, respuestas, ult_respuesta ";
$sql.= "FROM foro WHERE identificador=0 ORDER BY ult_respuesta DESC";
$rs = mysqli_query($con,$sql);
if(mysqli_num_rows($rs)>0)
{
	// Leemos el contenido de la plantilla de temas
	$template = implode("", file("temas.php"));
	include('titulos.php');
	while($row = mysqli_fetch_assoc($rs))
	{
		$color=($color==""?"#5b69a6":"");
		$row["color"] = $color;
		mostrarTemplate($template, $row);
	}
}
include('footer.php');*/
?>
<?php
session_start();
if(!isset($_SESSION["Usuario"])){
    header('Location: ../index.php');
} 

$_SESSION["Usuario"];
?>

<?php 
include ("../../modules/menu/menu_usuario.php");
?>

<?php
// Botón para agregar un nuevo tema
echo '<button id="btn" type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevoTemaModal">Agregar nuevo tema</button>';
?>
<h2>Lista de foros</h2>
              <table id="data_table" class="table table-striped mt-5">
                <thead>
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
                              <th>Ult_Respuesta</th>   
                          </tr>
                      </thead>
                      <tbody>
                          <?php 
                          $resultado = mysqli_query($con, "SELECT * FROM tema");
                          while( $fila = mysqli_fetch_assoc($resultado) ) {
                          ?>
                             <tr>
                             <td><?php echo $fila ['autor']; ?></td>
                             <td><?php echo $fila ['titulo']; ?></td>
                             <td><?php echo $fila ['mensaje']; ?></td>
                             <td><?php echo $fila ['fecha']; ?></td>
                             <td><?php echo $fila ['respuestas']; ?></td>
                             <td><?php echo $fila ['ult_respuesta']; ?></td>
                             <td><?php echo '<a class="btn btn-primary" href="../funciones/ver-tema.php?id='.$fila['id'].'">Ver tema</a>'?></td>
                            </tr>
                          <?php } ?>
                      </tbody>
                  </table>

<!-- Modal para agregar un nuevo tema -->
<div class="modal fade" id="nuevoTemaModal" tabindex="-1" role="dialog" aria-labelledby="nuevoTemaModalLabel" aria-hidden="true">
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
          <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
          </div>
          <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Agregar tema</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!--Abrir el modal-->
<script>
$('#btn').on('shown.bs.modal', function () {
  $('#nuevoTemaModal').trigger('focus')
})
</script>