<?php

    class Seguridad{
        private $password;
        
        function limpiarP($password){
            $this->$password = htmlspecialchars($password);
            return $this->$password;
        }

        function encriptarP($password){
            $clean=$this->limpiarP($password);
            $cifrado = "AES-128-CTR";
            $options = 0;
            $iv_longitud = openssl_cipher_iv_length($cifrado);
            $encryption_iv ="1234567891011121";
            $encryption_key ="AdSi";
            $encriptado = openssl_encrypt($clean,$cifrado,$encryption_key,$options,$encryption_iv);
            return $encriptado;
        }
    }
    /*
    $limpieza = new Seguridad();
    //echo $limpieza-> limpiarP('<a href="test.php">texto</a>');
    //$texto = '<a href="test.php">texto</a>';
    $password = $limpieza->encriptarP($password); 
    //echo "La contraseña limpia sería: ".$password;
    */
?>