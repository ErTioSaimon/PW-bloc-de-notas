<?php

if(isset($_POST['btn']) && $_POST['btn'] == 'guardar'){

    if (isset($_POST['nombre_archivo']) && !empty($_POST['nombre_archivo'])){
        $nombre_archivo = $_POST['nombre_archivo'].'.txt';
        $descripcion = $_POST['descripcion'];
        $archivo_ruta = '../archivos/'.$nombre_archivo;

        $escritura = fopen($nombre_archivo, 'w+');
        fwrite($escritura, $descripcion);

        if(file_exists($archivo_ruta)){
            $fn = basename($nombre_archivo);
            $fs = filesize($archivo_ruta);

            //Output headers.
            header('Cache-Control: private');
            header('Content-Type: application/stream');
            header("Content-Length: ".$fs);
            header("Content-Disposition: attachment; filename=".$fn);

            // Output file.
            readfile ($archivo_ruta);  
            exit();                 
            }
        else {
            die('The provided file path is not valid.');
        }
    } else{
        $nombre_archivo ='archivo.txt';
        $descripcion = $_POST['descripcion'];
        $archivo_ruta = '../archivos/'.$nombre_archivo;

        $escritura = fopen($nombre_archivo, 'w+');
        fwrite($escritura, $descripcion);

        if(file_exists($archivo_ruta)){
            $fn = basename($nombre_archivo);
            $fs = filesize($archivo_ruta);

            //Output headers.
            header('Cache-Control: private');
            header('Content-Type: application/stream');
            header("Content-Length: ".$fs);
            header("Content-Disposition: attachment; filename=".$fn);

            // Output file.
            readfile ($archivo_ruta);  
            exit();                 
            }
        else {
            die('The provided file path is not valid.');
        }
    }

    header('Refresh:1');

}
?>