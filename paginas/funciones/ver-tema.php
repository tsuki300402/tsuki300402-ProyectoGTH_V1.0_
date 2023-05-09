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
echo '<div class="container shadow-lg">';
echo '<div class="row justify-content-center">';
echo '<div class="col-sm-9">';
echo '<h1 class="mb-3">'.'<i class="bi bi-card-text me-2"></i>'. $fila['titulo'] . '</h1>';
echo '<p>'.'<i class="bi bi-justify me-1"></i>' . $fila['mensaje'] . '</p>';

// Mostrar los comentarios existentes
$resultado = mysqli_query($con, "SELECT * FROM comentarios WHERE id_tema=$id");
while ($fila = mysqli_fetch_assoc($resultado)) {
    echo '<div class="card mt-2">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title">'."<i class='bi bi-person me-1'></i>" . $fila['nombre'] . '</h5>';
    echo '<p class="card-text">' . $fila['comentario'] . '</p>';
    echo '</div>';
    echo '</div>';
}

// Formulario para agregar un comentario
if ($_SESSION['rol'] == 'Administrador'){
echo '<div class="container d-none mt-3">';
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
}else{
    echo '<div class="container mt-3">';
    echo '<form method="POST" action="agregar-comentario.php">';
    echo '<div class="form-group">';
    echo '<label for="autor">Nombre</label>';
    echo '<input type="text" class="form-control" id="autor" name="autor" value="'.$_SESSION['Usuario'].'" required disabled>';
    echo '</div>';
    echo '<div class="form-group">';
    echo '<label for="comentario">Comentario</label>';
    echo '<textarea class="form-control" id="comentario" name="comentario" required></textarea>';
    echo '</div>';
    echo '<input type="hidden" name="id_tema" value="' . $id . '">';
    echo '<button type="submit" class="btn btn-primary mb-3">Agregar comentario</button>';
    echo '</form>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
// Cerrar la conexión a la base de datos
mysqli_close($con);
?>