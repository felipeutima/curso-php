<?php

include_once("config.php");
$pg = "Productos";
include_once("header.php");
include_once("entidades/producto.php");
include_once("entidades/tipoproducto.php");
include_once("entidades/venta.php");
$producto = new Producto();
$producto->cargarFormulario($_REQUEST);

if ($_POST) {
    //logica de guardar
    if (isset($_REQUEST["btnGuardar"])) {
        if (isset($_GET["id"]) && $_GET["id"] > 0) {
            $producto->actualizar();
            $msg["texto"] = "Actualizado Correctamente";
        } else {
            $producto->insertar();
            $msg["texto"] = "Insertado Correctamente";
        }
    }
    //logica de borrar
};

if (isset($_GET["id"]) && $_GET["id"] > 0) {
    $producto->obtenerPorId(); //trae el objeto por id
  
};

//logica tipo de producto  pestaña Seleccionar
$tipoproducto = new TipoProducto();
$aTipoProductos = $tipoproducto->obtenerTodos();
?>;
<style>
    .select-chico {
        width: 100px;

    }

    .select-mediano {
        width: 150px;
    }
</style>
<script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>

<body>
    <div class="container">

        <h1 class="my-4">Productos</h1>
        <?php if (isset($msg)) : ?>
            <div class="row">
                <div class="col-12">
                    <div class="alert <?php echo $msg["codigo"]; ?>" role="alert">
                        <?php echo $msg["texto"]; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <a href="producto-listado.php" class="btn btn-primary mb-2">Listado</a>
        <button class="btn btn-primary mb-2">Nuevo</button>
        <button class="btn btn-success mb-2" id="btnGuardar" name="btnGuardar">Guardar</button>
        <button class="btn btn-danger mb-2" id="btnBorrar" name="btnBorrar">Borrar</button>
        <form action="POST">

            <div class="mb-3">
                <div class="row">
                    <div class="col-6">
                        <label for="txtNombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="txtNombre" name="txtNombre" required value="<?php echo $producto->nombre; ?>">
                    </div>
                    <div class="col-6">
                        <label for="txtTipoProducto" class="form-label">Tipo de Producto:</label>
                        <select name="lstTipoProducto" id="lstTipoProducto" class="form-control" require>
                            
                            <?php foreach ($aTipoProductos as $tproducto) : ?>
                                <option value="<?php echo $tproducto->idproducto ?>"selected><?php echo $tproducto->nombre ?></option>
                            <?php endforeach; ?>
                            <option value="" disabled selected>Seleccionar</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-6">
                        <label for="txtCantidad" class="form-label">Cantidad:</label>
                        <input type="number" class="form-control" id="txtCantidad" name="txtCantidad" required value="<?php echo $producto->cantidad ?>">
                    </div>
                    <div class="col-6">
                        <label for="txtPrecio" class="form-label">Precio:</label>
                        <input type="text" class="form-control" id="txtPrecio" name="txtPrecio" required value="<?php echo $producto->precio ?>">
                    </div>
                </div>

            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-12">
                        <label for="">Descripción:</label>
                        <textarea name="txtDescripcion" id="txtDescripcion" > <?php echo $producto->descripcion ?></textarea>
                        <script>
                            ClassicEditor
                                .create(document.querySelector('#txtDescripcion'))
                                .catch(error => {
                                    console.error(error);
                                })
                        </script>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div>
                        <label for="">Archivo adjunto</label>
                        <input type="file" name="archivo" id="archivo" accept=".jpg, .jpeg, .png">
                        <small class="d-block" require accept="">Archivos admitidos: .jpg, .jpeg, .png</small>
                    </div>
                </div>
            </div>
    </div>


    </form>

    </div>
</body>

</html>