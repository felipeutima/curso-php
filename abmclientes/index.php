<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//si ya existe el archivo.txt para almacenar los datos previos y almacenarlos en la variable aclientes
if(file_exists('archivo.txt')){
    $jsonClientes=file_get_contents("archivo.txt"); //este json solo existe dentro de este if
    

    //de json a array
    $aClientes=json_decode($jsonClientes,true); //true para que sea un array asociativo
    print_r($aClientes);

}else{
    $aClientes=array();
}


if ($_FILES['archivo']['error'] ===UPLOAD_ERR_OK){
    $nombreAleatorio= date("Ymdhmsi");
    $archivo_tmp= $_FILES['archivo']["tmp_name"];
    $extension=strtolower(pathinfo($_FILES['archivo']['name']), PATHINFO_EXTENSION);
    if($extension=='jpg'|| $extension=='jpeg'|| $extension=='png'){
        move_uploaded_file($archivo_tmp, "files/$nombreAleatorio.$extension");
    } else {
        header("Location: index.php");
    }
};

if($_POST){

    //Almacenar los valores del formulario enviado en variables
    $dni = trim($_REQUEST["txtDni"]); //trim elimina espacios 
    $nombre = trim($_REQUEST["txtNombre"]);
    $correo = trim($_REQUEST["txtCorreo"]);
    $telefono = trim($_REQUEST["txtTelefono"]);
    $nombreImagen = "";

        //Actualizando
        $aClientes[] = array("dni" => $dni,
                                "nombre" => $nombre,
                                "correo" => $correo,
                                "telefono" => $telefono,
                                "imagen" =>''
        );
    print_r($aClientes);

    //convertir de array a JSON 
    $jsonClientes=json_encode($aClientes);

    //de  json a archivo.txt 

    file_put_contents("archivo.txt", $jsonClientes);
    
};



if(isset($_GET['pos'])&& $_GET['pos']>=0) //para obtener la posicion dentro de la tabla
{  
    $pos=$_GET['pos'];

};

if(isset($_GET['eliminar'])&& $_GET['eliminar']>=0) //para obtener la posicion dentro de la tabla
{  
    $pos=$_GET['eliminar'];
    unset($aClientes[$pos]);

    //para actualizar el archivo.txt (de json a txt) 
    $jsonClientes=json_encode($aClientes);
    file_put_contents("archivo.txt", $jsonClientes);

    //redireccionar a index para borrar
    header("Location: index.php");



}
 

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABM Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-5 text-center">
                <h1>Registro de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div>
                        <label for="">DNI: *</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control" required value="<?php echo (isset($pos) && $pos >= 0)? $aClientes[$pos]["dni"]: ""; ?>">
                    </div>
                    <div>
                        <label for="">Nombre: *</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control" required value="<?php echo (isset($pos) && $pos >= 0)? $aClientes[$pos]["nombre"]: ""; ?>">
                    </div>
                    <div>
                        <label for="">Teléfono:</label>
                        <input type="text" name="txtTelefono" id="txtTelefono" class="form-control" value="<?php echo (isset($pos) && $pos >= 0)? $aClientes[$pos]["telefono"]: ""; ?>">
                    </div>
                    <div>
                        <label for="">Correo: *</label>
                        <input type="text" name="txtCorreo" id="txtCorreo" class="form-control" required value="<?php echo (isset($pos) && $pos >= 0)? $aClientes[$pos]["correo"]: ""; ?>">
                    </div>
                    <div>
                        <label for="">Archivo adjunto</label>
                        <input type="file" name="archivo" id="archivo" accept=".jpg, .jpeg, .png">
                        <small class="d-block">Archivos admitidos: .jpg, .jpeg, .png</small>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="index.php" class="btn btn-danger my-2">NUEVO</a>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <table class="table table-hover border">
                    <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($aClientes as $pos=>$cliente  ): ?>
                            <tr>
                                <td></td>
                                <td> <?php echo $cliente["dni"] ?></td>
                                <td> <?php echo $cliente["nombre"] ?></td>
                                <td> <?php echo $cliente["correo"] ?></td>
                                <td>
                                    <a href="?pos=<?php echo $pos ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                                    <a href="?eliminar=<?php echo $pos ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                                
                                
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>
</html>