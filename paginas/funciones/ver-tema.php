<?php
session_start();
if (($_SESSION['rol'] == 'Administrador')){
    //header('Location: ../index.php');
    include("../../modules/menu/menu_admin.php");
}else{
    include("../../modules/menu/menu_usuario.php");
}
// Conexión a la base de datos y consulta del tema
include("../../configuracion/controller/conexion.php");
$conexion = new Conexion();
$con = $conexion->conectarDB();
$id = $_GET['id'];
$resultado = mysqli_query($con, "SELECT * FROM tema WHERE id=$id");
$fila = mysqli_fetch_assoc($resultado);

// Mostrar el título y la descripción del tema
echo '<h1>' . $fila['titulo'] . '</h1>';
echo '<p>' . $fila['mensaje'] . '</p>';

// Mostrar los comentarios existentes
$resultado = mysqli_query($con, "SELECT * FROM comentarios WHERE id_tema=$id");
while ($fila = mysqli_fetch_assoc($resultado)) {
    echo '<div class="card">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title">' . $fila['nombre'] . '</h5>';
    echo '<p class="card-text">' . $fila['comentario'] . '</p>';
    echo '</div>';
    echo '</div>';
}

// Formulario para agregar un comentario
echo '<div class="container">';
echo '<form method="POST" action="agregar-comentario.php">';
echo '<div class="form-group">';
echo '<label for="autor">Nombre</label>';
echo '<input type="text" class="form-control" id="autor" name="autor" required>';
echo '</div>';
echo '<div class="form-group">';
echo '<label for="comentario">Comentario</label>';
echo '<textarea class="form-control" id="comentario" name="comentario" required></textarea>';
echo '</div>';
echo '<input type="hidden" name="id_tema" value="' . $id . '">';
echo '<button type="submit" class="btn btn-primary">Agregar comentario</button>';
echo '</form>';
echo '</div>';
// Cerrar la conexión a la base de datos
mysqli_close($con);
?>