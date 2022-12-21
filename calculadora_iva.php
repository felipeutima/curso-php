<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


function sinIva($iva,$coniva){

    $siniva=$coniva/($iva/100+1);
    return $siniva;
};

function conIva ($iva,$siniva){

    $coniva=$siniva/($iva/100-1);
    return $coniva;
};

if ($_POST) {
$siniva=($_POST['siniva'])>0 ? floatval( $_POST['siniva']):0; 
$coniva=($_POST['coniva'])>0 ? floatval( $_POST['coniva']):0; 
$iva=intval($_POST['iva']); 

if($siniva>0){
    $coniva=$siniva*($iva/100+1);
};

if($coniva>0){
    $siniva=$coniva/($iva/100+1);
};

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

    <h1 class="text-center"> CALCULADORA DE IVA</h1>

    <div class="container">
        <div class="row">


            <div class='col-md-6'>
                <form action="" method="POST">

                    <div class="mb-3">
                    <label for="iva"> IVA </label>
                    <input type="text" id="iva" name="iva" class="form-control" ></input>
                    </div>

                    <div class="mb-3">
                    <label for="coniva"> PRECIO CON IVA </label>
                    <input type="text" id="coniva" name="coniva" class="form-control"> </input>
                    </div>

                    <div class="mb-3">
                    <label for="siniva"> PRECIO SIN IVA</label>
                    <input type="text" id="siniva" name="siniva" class="form-control"> </input>
                    </div>

                    <div class="mb-3">
                    <button class="btn-primary" type="submit" name="btnEnviar" id="btnEnviar">CALCULAR</button>
                    </div>


                </form>
            </div>

            <div class='col-md-6'>
                <table class="table">
                    <tbody>
                        <tr>
                        <td>IVA:</td>
                        <td><?php echo $iva ?></td>
                        </tr>
                        <tr>
                        <td>PRECIO CON IVA:</td>
                        <td><?php echo $coniva ?></td>
                        </tr>
                        <tr>
                        <td>PRECIO SIN IVA:</td>
                        <td><?php echo $siniva ?></td>
                        </tr>
 
                    </tbody>
                </table>

            </div>
        </div>

    </div>

</body>

</html>