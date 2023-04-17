<?php
session_start();
session_unset();
session_destroy();
header("location: http://localhost/ProyectoGTH_V1.0_/index.php");
?>