<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$bError = false;
if ($_POST && isset($_POST['btnSalir'])){
    header("Location:index.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
    <H1>ACCESO CONFIRMADO</H1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus quis quas magnam cumque alias? Architecto fuga autem commodi alias quae animi, ipsam molestiae maxime sapiente vel optio, doloremque, asperiores porro.</p>
    <button type="submit" name="btnSalir" id="btnSalir">SALIR</button>
    </form>
</body>
</html>