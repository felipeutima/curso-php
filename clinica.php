<!DOCTYPE html>
<html lang="en">


<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aClientes = ['Juan', 'María', 'Miguel', 'Andrés'];

// comentario  php // 

$miauto = array(

    'Patente' => "AA123HB",
    'Marca' => "Ford"
);


$pacientes = array(

    array('dni' => '33300012', 'nombre' => 'Ana Valle', 'edad' => 23), //posicion 0
    array('dni' => '33300013', 'nombre' => 'Bernabe', 'edad' => 36) //posicion 1 
);
?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Document</title>
</head>

<body class="text-center">

    <h1>Estos son los clientes</h1>
    <p>
        <?php

        foreach ($aClientes as $cliente) {
            echo ($cliente) . '<br>';
        }
        ?>
    </p>
    <h1>Estos son los autos</h1>
    <p>
        <?php

        foreach ($miauto as $auto) {
            echo ($auto) . '<br>';
        }
        ?>
    </p>

    <h1>Estos son los autos</h1>
    <p>
        <?php

        foreach ($miauto as $clave => $valor) {
            echo 'la clave es :' . $valor . '<br>';
        }
        ?>
    </p>

    <h1>ACTIVIDAD PHP</h1>
    <p>
        <?php

        foreach ($pacientes as $pos => $paciente) {
            echo $paciente['nombre'] . '<br>';
        }
        ?>

    </p>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">DNI</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">EDAD</th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($pacientes as $paciente) { ?>
               
            
            <tr>

                <td><?php echo $paciente["dni"]; ?></td>
                <td><?php echo $paciente["nombre"]; ?></td>
                <td><?php echo $paciente["edad"]; ?></td>

            </tr>

            <?php 
            }
            ?>
        </tbody>
    </table>




</body>

</html>