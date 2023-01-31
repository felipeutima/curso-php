<?php

include_once("config.php");
$pg = "Listado de Productos";
include_once("header.php");
include_once("entidades/producto.php");

$producto = new Producto();
$aProductos = $producto->obtenerTodos();

?>;


<body>
    <div class="container">

        <h1 class="my-4">Listado De Productos</h1>
        <a href="producto-formulario.php" class="btn btn-primary mb-2">Nuevo</a>

        <table class='table table-bordered table-striped table-hover'>
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <?php foreach($aProductos as $producto ): ?>
            <tbody>
            
                <tr>
                    <td><?php echo $producto ->imagen  ?></td>
                    <td><?php echo $producto ->nombre  ?></td>
                    <td><?php echo $producto ->cantidad  ?></td>
                    <td><?php echo $producto ->precio  ?></td>
                    <td> <a href="producto-formulario.php?id=<?php echo $producto->idproducto; ?>">Editar</a></td>
                </tr>
            </tbody>
            <?php endforeach;?>

        </table>
    </div>
</body>

</html>