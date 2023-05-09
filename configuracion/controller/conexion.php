<?php

class Conexion
{
    private $servidor;
    private $user;
    private $password;
    private $database;
    function conectarDB()
    {
        $servidor = "localhost";
        $user = "root";
        $password = "";
        $database = "gthumano";
        $con = new mysqli($servidor, $user, $password, $database);

        if ($con->connect_error) {

        } else {
            $status = 1;
        }
        return $con;
    }
}
?>