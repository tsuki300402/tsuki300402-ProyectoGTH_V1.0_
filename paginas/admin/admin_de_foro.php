<?php   ?>
<?php
session_start();
if (!isset($_SESSION["Usuario"]) && ($_SESSION['rol'] != 'administrador')) {
    header('Location: ../index.php');
}
$_SESSION["Usuario"];
?>
<?php include_once("../../modules/menu/menu_admin.php");
?>
<?php
//conexion
include_once("../../configuracion/controller/conexion.php");
$conexion = new Conexion;
$con = $conexion->conectarDB();
//fin de la conexion 
//para borrar el foro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accion = $_POST["borrarForo"];
    $dato = $_POST['idF'];
    if ($accion == "borrar") {
        // Código para borrar los datos
        $sql = " DELETE FROM tema WHERE id = $dato ";
        if ($con->query($sql) === TRUE) {
            echo "<script> alert('Foro borrado exitosamente');</script>";
          } else {
            echo "Error al borrar el registro: " . $con->error;
          }
          
          // Cerrar la conexión
          $con->close();          
    }
}
//fin
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Lista de los foros disponibles</h2>
                <table id="data_table" class="table table-striped mt-5">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Autor</th>
                            <th>Titulo</th>
                            <th>Mensaje</th>
                            <th>Fecha</th>
                            <th>Respuestas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            //inicio de la busqueda de los foros 
                            $sql = "SELECT * FROM tema";
                            $resultset = mysqli_query($con, $sql) or die("error base de datos" . mysqli_error($con));
                            while ($foro = mysqli_fetch_assoc($resultset)) {
                            
                            ?>
                            <td>
                                <?php echo $foro['id']; ?>
                            </td>
                            <td>
                                <?php echo $foro['autor']; ?>
                            </td>
                            <td>
                                <?php echo $foro['titulo']; ?>
                            </td>
                            <td>
                                <?php echo $foro['mensaje']; ?>
                            </td>
                            <td>
                                <?php echo $foro['fecha']; ?>
                            </td>
                            <td>
                                <?php echo $foro['respuestas']; ?>
                            </td>
                            <?php
                            echo "<form method='POST' action= '".$_SERVER['PHP_SELF']."' >";
                            echo "<td><button class='btn btn-danger' type='submit' name='borrarForo' value='borrar'>Eliminar</button></td>";
                            echo "<input type='hidden' name='idF' value='".$foro['id']."'>";
                            echo "</form>"; ?>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </section>
    </div>
    </div>