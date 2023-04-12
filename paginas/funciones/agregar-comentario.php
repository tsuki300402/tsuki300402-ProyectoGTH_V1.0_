<?php
    include('../../configuracion/controller/conexion.php');
    $conexion = new Conexion();
    $con = $conexion->conectarDB();

    $nombre = $_POST['autor'];
    $id = $_POST['id_tema'];
    $comentario = $_POST['comentario'];
    $fecha = date("Y-m-d H:i:s");

    $query = "INSERT INTO comentarios (id_tema,nombre,comentario, fecha_creacion) VALUES ('$id','$nombre','$comentario', '$fecha')";
    mysqli_query($con, $query);

    mysqli_close($con);

    header("Location: ver-tema.php?id=$id");
?>