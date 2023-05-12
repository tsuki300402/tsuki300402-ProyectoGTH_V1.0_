<?php
    class RediM{

        function Img_Guardar($img,$tema){
            $files = glob('uploads/*');
            foreach($files as $file){
                if(is_file($file))
                    unlink($file);
            }
            if (!file_exists('uploads')) {
                mkdir('uploads', 0777, true);
            }
            if (isset($img)) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($img["name"]);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                
                // Comprobamos si el archivo subido es una imagen
                if($imageFileType == "jpg" || $imageFileType == "jpeg" || $imageFileType == "png") {
                
                // Movemos la imagen subida a la carpeta de destino
                move_uploaded_file($img["tmp_name"], $target_file);
                
                // Ruta de la imagen original
                $original_image = $target_file;
            
                // Ruta donde se guardará la imagen modificada
                $destination = "../../img/";
            
                // Tamaño deseado de la imagen modificada
                $new_width = 224;
                $new_height = 260;
            
                // Obtener información de la imagen original
                list($original_width, $original_height) = getimagesize($original_image);
                
                // Obtener el tipo de imagen
                $image_type = exif_imagetype($original_image);

                // Crear la imagen modificada
                    switch ($image_type) {
                        case IMAGETYPE_JPEG:
                            $original_image = imagecreatefromjpeg($original_image);
                            break;
                        case IMAGETYPE_PNG:
                            $original_image = imagecreatefrompng($original_image);
                            break;
                        // Agregar más casos para otros tipos de imagen si es necesario
                    }
                    if (!$original_image) {
                        // No se pudo abrir la imagen, lanzar un error o hacer algo al respecto
                        return false;
                    }
            
                // Crear la imagen modificada
                $new_image = imagecreatetruecolor($new_width, $new_height);
            
               // Redimensionar la imagen original a las nuevas dimensiones
                imagecopyresampled($new_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);
            
                // Generar un nombre único para la imagen
                $new_filename =uniqid().".png";
                
                // Guardar la nueva imagen en la carpeta de destino con el nombre único generado
                imagepng($new_image, $destination . $new_filename, 9);

                // Devolver el nombre de la imagen guardada
                return $new_filename;
            }
          }
          
    }
}

?>
        

    
        

