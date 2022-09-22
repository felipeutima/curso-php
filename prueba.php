<!DOCTYPE html>
<html lang="en">

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$fecha = date("d/m/Y");
$nombre = 'Juan Felipe Tinjaca';
$edad = 23;

$peliculas = array();
$peliculas[0] = 'volver';
$peliculas[1] = 'titanic';
$peliculas[2] = 'dia despues de mañana';
$peliculas[]= 'otrooo';

// comentario  php // 
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
<div class="container">
    <div class="row">
    <h1> Array dentro de array (Matriz)</h1>
    </div>

</div>

    <div class="container">
        <div class="row">
            <div class="col-12 py-5 text-align-center">

            <h3>Otra forma es </h3>
            <?php
                $aLista=["Arroz", "Carne", "zanahoria"];

                print_r($aLista);
                ?>
                <br>
            <?php
                $aAgenda = [["Lu", "Ma", "Mi", "Ju", "Vi"],["Libre", "Cursan", "Libre", "Cursan", "Consulta"]];


                print_r($aAgenda);
                ?>
                <br>

            <h3>Concatenación</h3>
            <?php
               $aAuto = array();
               $aAuto["color"] = array("Negro", "Verde");
               $aAuto["marca"] = "Ford";
               $aAuto["anio"] = 1908;
               $aAuto["precio"] = "USD 800 a USD 1000";
               
               echo "El auto " . $aAuto["marca"] . " del año " . $aAuto["anio"] . " es de color " . $aAuto["color"][0] . " y su precio es " . $aAuto["precio"];
                ?>

            


                





        </div>
        </div>
    </div>
</div>

    <div class="container">
        <div class="row">
            <div class="col-12 py-5 text-align-center">

            <h1>Condicionales</h1>
            <?php
              $edad>=18;
              if ($edad>=18) {

                echo "Es mayor de edad";
              }
              else{
                echo "es menor de edad";

              }
                ?>
            <h2>Control de flujo
            </h2>
            <?php
                $stock = 50;
                $cantidad = '50';
                if($stock == $cantidad){
                    echo 'Hay stock'; 
                }
                $stock = 50; // I   nteger
                $cantidad = '“50”'; // String
                if($stock === $cantidad){
                    echo 'Hay stock';
                }
                var_dump($stock) //para saber el tipo de variable
                ?>
            <h3>Valor random</h3>
            <?php 
            

            $valor=rand(1,5);
            

            if ($valor%2==1){
                echo 'el numero '.$valor. " es impar";
            }
            else {
                echo 'El numero ' .$valor . " es par";

            }
            ?>

            

             





        </div>
        </div>
    </div>


</body>

</html>