<?php
// Conexión a la base de datos
$conexion = mysqli_connect('localhost', 'usuario', 'contraseña', 'basededatos');

// Agregar el nuevo tema a la base de datos
$titulo = mysqli_real_escape_string($conexion, $_POST['titulo']);
$descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);
mysqli_query($conexion, "INSERT INTO temas (titulo, descripcion) VALUES ('$titulo', '$descripcion')");

// Redirigir de vuelta a la página principal
header('Location: ../usuarios/foro.php');
?>

<p>El tema se ha agregado correctamente.</p>