<!DOCTYPE html>
<html lang="en">

<?php

function calcularneto($bruto)
{
    $neto = $bruto - ($bruto * 0.17);
    return $neto;
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Document</title>
</head>

<body class="text-center">
    <h1>
        <?php
        echo 'El sueldo neto es ' . calcularneto(80000);
        ?>
    </h1>
</body>

</html>