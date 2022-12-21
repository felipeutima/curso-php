
<?php

include_once('header.php');

function calcularneto($bruto)
{
    $neto = $bruto - ($bruto * 0.17);
    $neto=number_format($neto, 2,',', '.');
    return $neto;
}

$empleados = array(

    array('dni' => '33300012', 'nombre' => 'Ana Valle', 'edad' => 23, 'bruto'=>85000.30), //posicion 0
    array('dni' => '33300013', 'nombre' => 'Bernabe', 'edad' => 36, 'bruto'=>90000) //posicion 1 
);
?>

<h1 class="text-center">Base de datos de empleados</h1>

<table class="table">
        <thead>
            <tr>
                <th scope="col">DNI</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">EDAD</th>
                <th scope="col">BRUTO</th>
                <th scope="col">NETO</th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($empleados as $paciente) { ?>
               
            
            <tr>

                <td><?php echo $paciente["dni"]; ?></td>
                <td><?php $str = strtoupper($paciente["nombre"]);echo $str ; ?></td>
                <td><?php echo $paciente["edad"]; ?></td>
                <td><?php echo $paciente["bruto"]; ?></td>
                
                <td><?php echo calcularneto($paciente["bruto"]); ?></td>

            </tr>

            <?php 
            }
            ?>
        </tbody>
    </table>

?>
