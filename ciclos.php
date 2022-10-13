<?php
$contador = 0;
// imprimir numeros del 1 al 100
while ($contador < 100) {
    echo $contador;

    $contador++;
}
// imprimir numeros del 1 al 100 solo pares
while ($contador < 100) {

    if ($contador % 2 == 0) {
        echo $contador;
    }
    $contador++;
}

#cuando el numero llegue a 60 mostrarlo e interrumpir el codigo eon break

for ($i = 2; $i <= 100; $i += 2) {
    echo "$i <br>";
    if ($i == 60) {
        break;
    }
}

?>



<?php

//recorrer array par mostrar el subtotal
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aProductos = array();
$aProductos[] = array(
    "nombre" => "Smart TV 55\" 4K UHD",
    "marca" => "Hitachi",
    "modelo" => "554KS20",
    "stock" => 60,
    "precio" => 58000,
);
$aProductos[] = array(
    "nombre" => "Samsung Galaxy A30 Blanco",
    "marca" => "Samsung",
    "modelo" => "Galaxy A30",
    "stock" => 0,
    "precio" => 22000,
);
$aProductos[] = array(
    "nombre" => "Aire Acondicionado Split Inverter Frío/Calor Surrey 2900F",
    "marca" => "Surrey",
    "modelo" => "553AIQ1201E",
    "stock" => 5,
    "precio" => 45000,
);

//logica de stock//

function logic($array, $position)
{
    if ($array[$position]['stock'] == 0) {
        $valor = "sin stock";
    } else if ($array[$position]['stock'] > 0 && $array[$position]['stock'] <= 10) {
        $valor = "poco stock";
    } else if ($array[$position]['stock'] > 10) {
        $valor = "Hay stock";
    }
    return $valor;
}
$total = 0;
function suma($array, $position, $total)
{
    //sumar valores de  precio
    $total = $total + $array[$position]['precio'];
    return $total;
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Document</title>
</head>

<div class="container">
    <h1> Ejemplo Practico</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Marca</th>
                <th scope="col">Modelo</th>
                <th scope="col">Stock</th>
                <th scope="col">Precio</th>
                <th scope="col">Accion</th>
            </tr>
        </thead>
        <tbody>
            <tr>

                <td><?php echo $aProductos[0]["nombre"]; ?></td>
                <td><?php echo $aProductos[0]["marca"]; ?></td>
                <td><?php echo $aProductos[0]["modelo"]; ?></td>
                <td><?php echo logic($aProductos, 0) ?> </td>
                <td><?php echo $aProductos[0]["precio"];
                    $total=suma($aProductos, 0, $total) ?></td>
                <td><a href="" class="btn btn-primary">Comprar</a></td>
            </tr>
            <tr>
                <td><?php echo $aProductos[1]["nombre"]; ?></td>
                <td><?php echo $aProductos[1]["marca"]; ?></td>
                <td><?php echo $aProductos[1]["modelo"]; ?></td>
                <td><?php echo logic($aProductos, 1) ?></td>
                <td><?php echo $aProductos[1]["precio"]; $total=suma($aProductos, 1, $total)  ?></td>
                <td><a href="" class="btn btn-primary">Comprar</a></td>
            </tr>
            <tr>
                <td><?php echo $aProductos[2]["nombre"]; ?></td>
                <td><?php echo $aProductos[2]["marca"]; ?></td>
                <td><?php echo $aProductos[2]["modelo"]; ?></td>
                <td><?php echo logic($aProductos, 2) ?></td>
                <td><?php echo $aProductos[2]["precio"]; $total=suma($aProductos, 2, $total) ?></td>
                <td><a href="" class="btn btn-primary">Comprar</a></td>


            </tr>
        </tbody>
    </table>

    <h4>El subtotal es: <?php echo $total ?> </h4>
</div>


</body>