<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//si ya existe el archivo.txt para almacenar los datos previos y almacenarlos en la variable aclientes
if (file_exists('tareas.txt')) {
    $jsonTareas = file_get_contents("tareas.txt"); //este json solo existe dentro de este if
    //de json a array
    $aTareas = json_decode($jsonTareas, true); //true para que sea un array asociativo
    print_r($aTareas);
} else {
    $aTareas = array();
}



if ($_POST) {

    //Almacenar los valores del formulario enviado en variables
    $prioridad = $_REQUEST["lstPrioridad"]; //trim elimina espacios 
    $usuario = $_REQUEST["lstUsuario"];
    $estado = $_REQUEST["lstEstado"];
    $titulo = trim($_REQUEST["txtTitulo"]);
    $descripcion = $_REQUEST["txtDescripcion"];

    $id = isset($_GET['id']) && $_GET['id'] >= 0 ? $_GET['id'] : ""; //para obtener la idicion dentro de la tabla

    if ($id >= 0) {
        //si id es mayor a cero quiere decir que estoy actualizando
        $aTareas[$id] = array(
            "fecha" => date("d/m/Y"),
            "lstPrioridad" => $prioridad,
            "lstUsuario" => $usuario,
            "lstEstado" => $estado,
            "txtTitulo" => $titulo,
            "txtDescripcion" => $descripcion
        );
    } else {
        //sino almanceno en el array en nuevo espacio
        $aTareas[] = array(
            "fecha" => date("d/m/Y"),
            "lstPrioridad" => $prioridad,
            "lstUsuario" => $usuario,
            "lstEstado" => $estado,
            "txtTitulo" => $titulo,
            "txtDescripcion" => $descripcion
        );
    };

    //convertir de array a JSON 
    $jsonTareas = json_encode($aTareas);

    //de  json a archivo.txt 

    file_put_contents("tareas.txt", $jsonTareas);
};




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">
    <title>Document</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-12 py-5 text-center">
                <h1>Gestor de Tareas</h1>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <form action="" method="POST">
            <div class="row">
                <div class="col-4 mb-3">
                    <label for="lstPrioridad" class="form-label">Prioridad</label>
                    <select name="lstPrioridad" id="lstPrioridad" class="form-control">
                        <option value="" disabled selected>Seleccionar</option>
                        <option value="Alta" <?php echo isset($aTareas[$id]) && $aTareas[$id]['lstPrioridad'] == "Alta" ? "selected" : ""; ?>>Alta</option>
                        <option value="Media"><?php echo isset($aTareas[$id]) && $aTareas[$id]['lstPrioridad'] == "Media" ? "selected" : ""; ?>Media</option>
                        <option value="Baja" <?php echo isset($aTareas[$id]) && $aTareas[$id]['lstPrioridad'] == "baja" ? "selected" : ""; ?>>Baja</option> 
                    </select>

                </div>
                <div class="col-4 mb-3">
                    <label for="lstUsuario" class="form-label">Usuario</label>
                    <select name="lstUsuario" id="lstUsuario" class="form-control">
                        <option value="" disabled selected>Seleccionar</option>
                        <option value="Daniel" <?php echo isset($aTareas[$id]) && $aTareas[$id]['lstUsuario'] == "Daniel" ? "selected" : ""; ?> >Daniel</option>
                        <option  value="Andres"<?php echo isset($aTareas[$id]) && $aTareas[$id]['lstUsuario'] == "Andres" ? "selected" : ""; ?>>Andres</option>
                        <option value="María"<?php echo isset($aTareas[$id]) && $aTareas[$id]['lstUsuario'] == "María" ? "selected" : ""; ?> >María</option>
                    </select>
                </div>

                <div class="col-4 mb-3">
                    <label for="lstEstado" class="form-label">Estado</label>
                    <select name="lstEstado" id="lstEstado" class="form-control">
                        <option value="" disabled selected>Seleccionar</option>
                        <option value="Sin Asignar"<?php echo isset($aTareas[$id]) && $aTareas[$id]['lstEstado'] == "Sin Asignar" ? "selected" : ""; ?>  value="Sin Asignar">Sin Asignar</option>
                        <option value="Asignado" <?php echo isset($aTareas[$id]) && $aTareas[$id]['lstEstado'] == "Asignado" ? "selected" : ""; ?> >Asignado</option>
                        <option value="En Proceso"><?php echo isset($aTareas[$id]) && $aTareas[$id]['lstEstado'] == "En Proceso" ? "selected" : ""; ?>En Proceso</option>
                        <option <?php echo isset($aTareas[$id]) && $aTareas[$id]['lstEstado'] == "Terminado" ? "selected" : ""; ?> value="Terminado">Terminado</option>
                    </select>
                </div>

            </div>
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="txtTitulo" class="form-label">Titulo</label>
                    <input type="text" class="form-control" id="txtTitulo" name="txtTitulo" placeholder="Título" value="<?php echo (isset($aTareas[$id]) && $aTareas[$id]['txtTitulo']) ? $aTareas[$id]["txtTitulo"] : ""; ?> ">
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="txtDescripcion" class="form-label">Descripcion</label>
                        <textarea name="txtDescripcion" id="txtDescripcion" class="form-control" value="<?php echo (isset($id) && $id >= 0) ? $aTareas[$id]["txtDescripcion"] : ""; ?> "></textarea>

                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <button type="submit" name="btnEnviar" id="btnEnviar" class="btn btn-primary">ENVIAR</button>
                        <a href="index.php" class="btn btn-secondary">CANCELAR</a>
                    </div>

                </div>
        </form>

        <div class="row">
            <div class="col-12 pt-4">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>FECHA</th>
                            <th>Titulo</th>
                            <th>Prioridad</th>
                            <th>Usuario</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($aTareas as $id => $tarea) : ?>
                            <tr>
                                <td><?php echo $id ?></td>
                                <td><?php echo $tarea["fecha"] ?></td>
                                <td> <?php echo $tarea["txtTitulo"] ?></td>
                                <td> <?php echo $tarea["lstPrioridad"] ?></td>
                                <td> <?php echo $tarea["lstUsuario"] ?></td>
                                <td> <?php echo $tarea["lstEstado"] ?></td>
                                <td>
                                    <a href="?id=<?php echo $id ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a href="?eliminar=<?php echo $id ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            <?php print_r($id. "HOLAAAA")?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>

</body>

</html>