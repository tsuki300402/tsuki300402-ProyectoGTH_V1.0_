<?php echo $_SERVER["REQUEST_METHOD"] == "POST"; echo $_POST['borrarForo']; echo $idForo ?>
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
    if ($accion == "'borrar?idforo=" . $foro['id'] . "'") {
        $idForo = $foro['id'];
        // Código para borrar los datos
        $sql = "DELETE tema WHERE id = $idForo ";
        if ($con->query($sql) === TRUE) {
            echo "<script> alert('".$con->error."');</script>";
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
                            echo "<form method='post' action= '$_SERVER[PHP_SELF];' >";
                            echo "<td><button class='btn btn-danger' type='hidden' name='borrarForo' value='borrar?idforo=" . $foro['id'] . "'>Eliminar</button></td>";
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