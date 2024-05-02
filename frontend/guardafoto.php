<?php
    if (isset($_FILES['imagen_fichero'])) {
        $tempFile = $_FILES['imagen_fichero']['tmp_name'];
        $file_size = $_FILES['imagen_fichero']['size'];
        $file_name = $_FILES['imagen_fichero']['name'];
        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $targetPath = 'fotos/' . $_POST['nombre'].".jpg";

        // Validación por tipo de fichero
        if ($file_type != "jpg") {
            echo "Tipo de fichero invalido. Solo se aceptan JPG, JPEG, PNG y  GIF";
            exit;
        }

        // Validación por tamaño de fichero
        if ($file_size > 1000000) {
            echo "Fichero demasiado grande, el hosting no acepta ficheros de mas de 1 Mb";
            exit;
        }

        if (move_uploaded_file($tempFile, $targetPath)) {
            echo 'Imagen guardada con éxito';
        } else {
            echo 'Error al guardar la imagen';
        }
    } else {
        echo 'Error al recibir la imagen';
    }
?>