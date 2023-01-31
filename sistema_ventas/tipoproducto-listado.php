<?php

include_once("config.php");
$pg = "Listado de Tipo Productos";
include_once("header.php");

include_once "entidades/tipoproducto.php";
$tipoProducto = new TipoProducto();
$aTipoProducto = $tipoProducto->obtenerTodos();
?>;

<body>
    <div class="container">

        <title><?php echo $pg; ?></title>
        <h1 class="text-gray-800">Listado de tipo de Productos</h1>
        <a href="tipoproducto-formulario.php" class="btn btn-primary mb-2">Nuevo</a>
        <table class='table table-bordered table-striped table-hover'>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($aTipoProducto as $tipo) : ?>
                    <tr>
                        <td><?php echo $tipo->nombre; ?></td>
                        <td> <a href="tipoproducto-formulario.php?id=<?php echo $tipo->idtipoproducto; ?>">Editar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>


    </div>
</body>

</html>

<?php

include_once("footer.php");

?>