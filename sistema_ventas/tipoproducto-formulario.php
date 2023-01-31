<?php
include_once("entidades/producto.php");
include_once("config.php");
$pg = "Tipo de Productos";
include_once("header.php");
include_once("entidades/tipoproducto.php");

$tipoProducto = new TipoProducto();
$tipoProducto->cargarFormulario($_REQUEST);


if ($_POST) {
    //logica de guardar
    if (isset($_REQUEST["btnGuardar"])) {
        if (isset($_GET["id"]) && $_GET["id"] > 0) {
            $tipoProducto->actualizar();
            $msg["texto"]="Actualizado Correctamente";
        } else {
            $tipoProducto->insertar();
            $msg["texto"]="Insertado Correctamente";
        }
        $msg["codigo"]="alert-success";
    }
    //logica de borrar
    else if(isset($_REQUEST["btnBorrar"])){
        $producto = new Producto(); //para verificar que no hayan fk asociados
        if($producto ->obtenerPorTipo($tipoProducto->idtipoproducto)){
            $msg["texto"]="No se puede eliminar el tipo de producto porque es asociado a otra tabla";
            $msg["codigo"]="alert-danger";
        } else{
            $tipoProducto->eliminar();
            header("Location:tipoproducto-listado.php");

        }
        

     
    }
};

if (isset($_GET["id"]) && $_GET["id"] > 0) {
    $tipoProducto->obtenerPorId(); //trae el objeto por id

};



?>;

<body>
    <div class="container">

        <h1 class="my-4">Tipo de Productos</h1>
        <?php if (isset($msg)): ?>
            <div class="row">
                <div class="col-12">
                    <div class="alert <?php echo $msg["codigo"]; ?>" role="alert">
                        <?php echo $msg["texto"]; ?>
                    </div>
                </div>
            </div>
            <?php endif;?>
        <a href="tipoproducto-listado.php" class="btn btn-primary mb-2">Listado</a>
        <a href="tipoproducto-formulario.php" class="btn btn-primary mb-2">Nuevo</a>
        <button class="btn btn-success mb-2" id="btnGuardar" name="btnGuardar">Guardar</button>
        <button class="btn btn-danger mb-2" id="btnBorrar" name="btnBorrar">Borrar</button>
        <form action="POST">
            <div class="mb-3">
                <label for="txtUsuario" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="txtNombre" name="txtNombre" value="<?php echo $tipoProducto->nombre; ?>">
            </div>


        </form>

    </div>
</body>

</html>