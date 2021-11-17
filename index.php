<?php
    $crearlista = null;
    $ignoreList = array('cgi-bin', '.', '..', '._', 'create.php');
    $directorio = opendir('./archivos');
    

    while($parte = readdir($directorio)){
        if($parte != '.' && $parte != '..' && $parte != 'crear_archivo.php'){
            if(is_dir("./files/".$parte)){
                $crearlista .= "<li><a href='./archivos/$parte' target'_blank' class='link-dark'>$parte/</a></li>";
            } else {
                $crearlista .= "<li><a href='./archivos/$parte' target'_blank' class='link-dark'>$parte/</a></li>";
            }
        }
    }

    //para las carpetas
    $crearlista2 = null;
    $directorio2 = opendir('./');

    while($parte2 = readdir($directorio2)){
        if($parte2 != '.' && $parte2 != '..' && $parte2 != 'index.php' && $parte2 != 'style.css' && $parte2 != 'archivos'){
            if(is_dir("./files/".$parte)){
                $crearlista2 .= "<li><a href='.//$parte2' target'_blank' class='link-dark'>$parte2/</a></li>";
            } else {
                $crearlista2 .= "<li><a href='.//$parte2' target'_blank' class='link-dark'>$parte2/</a></li>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>notitas express</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="titulo_main" class="text-center align-items-center pt-3 text-light">
        <h1 class="fs-1">notitas express <i class="bi bi-journal-text"></i></h1>
    </div>
    <div id="creando_archivo">
        <form action="archivos/crear_archivo.php" method="POST">
            <div class="poner_nombre">
                <label class="text-light fs-3" for="nombre_archivo">ingrese el nombre del archivo:</label>
                <br>
                <input type="text" placeholder="nombre del archivo" name="nombre_archivo" id="nombre_archivo" require>
            </div>

            <textarea name="descripcion" id="descripcion" placeholder="escriba lo quiera con libertad"></textarea>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-6">
                        <input class="col-12 btn-success" type="submit" name="btn" value="guardar">
                    </div>
                </div>
            </div>
        </form>
    </div>
    
    
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="mb-3 text-center align-items-center">
            <label  class="text-light fs-3 pt-4" for="exampleFormControlInput1" class="form-label">Crea una carpeta!</label>
            <input type="text" class="form-control" id="carpeta_texto" name="nombre_carpeta" placeholder="Nombre de la carpeta">
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6">
                <input class="col-12 btn-success" type="submit" value="Crear" name="crear" id="crear" class="btn btn-success">
                </div>
            </div>
        </div>
        
        <div id="area_btn">
            
        </div>
    </form>

    <?php
    
    if (isset($_POST['crear'])) {
        $nombre_carpeta = $_POST['nombre_carpeta'];

        if (!file_exists($nombre_carpeta)) {
            if (mkdir($nombre_carpeta)) {
                header("Refresh:1");
            } else {
                echo 'No se pudo crear carpeta';
            }
        }else {
            echo 'Carpeta ya existe';
        }
    }

    ?>
    <div class="lista_archi text-light pt-4">
        <hr>
        <h4 class= "text-center">Lista de archivos</h4>
        <hr>
        <ul>
            <?php echo $crearlista2 ?>
        </ul>
        <ul>
            <?php echo $crearlista ?>
        </ul>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>