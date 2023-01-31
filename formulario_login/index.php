<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if ($_POST) {
    $bError = FALSE;
    if ($_POST['txtUsuario'] && $_POST["txtClave"] ) {
        header("Location:acceso.php");
    } else {
        $bError = TRUE;
    }
}


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <div class="container py-3">

        <form action="" method="POST">
            <div class="mb-3">
                <label for="txtUsuario" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="txtUsuario" name="txtUsuario" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="txtClave" class="form-label">Clave</label>
                <input type="password" class="form-control" id="txtClave" name="txtClave"></input>
            </div>
            <div class="mb-3">
                <button type="submit" name="btnEnviar" id="btnEnviar">ENVIAR</button>
            </div>
    </div>
    </form>

    <?php

    if (isset($bError) && $bError) { ?>
        <div class="alert alert-danger" role="alert">
            Valido para usuarios registrados
        </div>
    <?php
    }

    ?>
</body>

</html>