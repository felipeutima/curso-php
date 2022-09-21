<!DOCTYPE html>
<html lang="en">

<?php

$fecha = date("d/m/Y");
$nombre = 'Juan Felipe Tinjaca';
$edad = 23;

$peliculas = array();
$peliculas[0] = 'volver';
$peliculas[1] = 'titanic';
$peliculas[2] = 'dia despues de mañana';
$peliculas[]= 'otrooo';


?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
<div class="container">
    <div class="row">
    <h1> Ficha personal</h1>
    </div>

</div>

    <div class="container">
        <div class="row">
            <div class="col-12 py-5 text-align-center">
        <table class="table table-dark table-striped">
            <tr >
                <th>fecha</th>
                <td><?php echo $fecha ?></td>
            </tr>

            <tr >
                <th>Nombre: </th>
                <td><?php echo $nombre ?></td>

            </tr>
            <tr >
                <th>Edad: </th>
                <td><?php echo $edad ?></td>

            </tr>
            <tr>
                <th>Peliculas: </th>
                <td>
                    <?php echo $peliculas[0]; ?><br>
                    <?php echo $peliculas[1]; ?><br>
                    <?php echo $peliculas[2]; ?>
                </td>

            </tr>
        </table>
        </div>
        </div>
    </div>


</body>

</html>