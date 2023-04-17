<?php
// Conexión a la base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'gthumano');

// Agregar el nuevo tema a la base de datos
$autor = mysqli_real_escape_string($conexion, $_POST['autor']);
$titulo = mysqli_real_escape_string($conexion, $_POST['titulo']);
$descripcion = mysqli_real_escape_string($conexion, $_POST['mensaje']);
mysqli_query($conexion, "INSERT INTO tema (autor,titulo, mensaje) VALUES ('$autor','$titulo', '$descripcion')");

// Redirigir de vuelta a la página principal
header('Location: ../usuarios/foro.php');
?>

<p>El tema se ha agregado correctamente.</p>