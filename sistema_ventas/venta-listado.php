<?php

include_once("config.php");
$pg = "Listado de ventas";
include_once("header.php");
include_once("entidades/venta.php");


$venta = new Venta();
$aVentas = $venta->obtenerTodos();


?>;

<body>
    <div class="container">

        <title><?php echo $pg; ?></title>
        <h1 class="text-gray-800">Listado de Ventas</h1>
        <a href="venta-formulario.php" class="btn btn-primary mb-2">Nuevo</a>
        <table class='table table-bordered table-striped table-hover'>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Cantidad</th>
                    <th>Producto</th>
                    <th>Cliente</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($aVentas as $venta): ?>
                <tr>
                
                    <td> <?php echo date_format(date_create($venta->fecha), "d/m/Y H:i") ?></td>
                    <td> <?php echo $venta ->cantidad  ?></td>
                    <td> <?php echo $venta ->nombre_producto  ?></td>
                    <td> <?php echo $venta ->nombre_cliente  ?></td>
                    <td> <?php echo number_format($venta ->total, 2, ",",". " ) ?></td>
                    <td> <a href="venta-formulario.php?id=<?php echo $venta->idventa; ?>">Editar</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>

    </div>
</body>

</html>

<?php

include_once("footer.php");

?>