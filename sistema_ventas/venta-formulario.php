<?php

include_once("config.php");
$pg = "Venta";
include_once("header.php");
include_once("entidades/cliente.php");
include_once("entidades/producto.php");
include_once("entidades/venta.php");


//para opciones desplegables
$cliente = new Cliente();
$aCliente = $cliente->obtenerTodos();

$producto = new Producto();
$aProductos = $producto->obtenerTodos();

$venta = new Venta();
$venta->cargarFormulario($_REQUEST);


if ($_POST) {
    //logica de guardar
    if (isset($_REQUEST["btnGuardar"])) {
        if (isset($_GET["id"]) && $_GET["id"] > 0) {
            $venta->actualizar();
            $msg["texto"] = "Actualizado Correctamente";
        } else {
            $venta->insertar();
            $msg["texto"] = "Insertado Correctamente";
        }
    }
    //logica de borrar
    else if (isset($_REQUEST["btnBorrar"])) {
        //para verificar que no hayan fk asociados

        $venta->eliminar();
        $msg["texto"] = "Eliminado Correctamente";
    }
    $msg["codigo"] = "alert-success";
}

if (isset($_GET["id"]) && $_GET["id"] > 0) {
    $venta->obtenerPorId(); //trae el objeto por id
    print_r($venta);
};

?>;
<style>
    .select-chico {
        width: 100px;

    }

    .select-mediano {
        width: 150px;
    }
</style>

<body>
    <div class="container">

        <h1 class="my-4">Venta</h1>
        <?php if (isset($msg)) : ?>
            <div class="row">
                <div class="col-12">
                    <div class="alert <?php echo $msg["codigo"]; ?>" role="alert">
                        <?php echo $msg["texto"]; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <a href="venta-listado.php" class="btn btn-primary mb-2">Listado</a>
        <button class="btn btn-primary mb-2">Nuevo</button>
        <button class="btn btn-success mb-2" id="btnGuardar" name="btnGuardar">Guardar</button>
        <button class="btn btn-danger mb-2" id="btnBorrar" name="btnBorrar">Borrar</button>
        <form action="POST">
            <div class="mb-3">
                <div class="row">
                    <div class="col-6">
                        <label for="lstDia" class="d-block">Fecha y hora:</label>
                        <select name="lstDia" id="lstDia" class="form-control d-inline select-chico" require>
                            <option value="" option selected>DD</option>
                            <?php for ($i = 1; $i <= 31; $i++) { ?>
                                <?php if($i== date_format(date_create($venta->fecha),"d")):?> 
                                    <option selected value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php else:?> 
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endif;?> 

                            
                            <?php } ?>
                        </select>
                        <select name="lstMes" id="lstMes" class="form-control d-inline select-chico" require>
                            <option value="" option selected>MM</option>
                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                <?php if($i== date_format(date_create($venta->fecha),"m")):?> 
                                    <option selected value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php else:?> 
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endif;?> 
                            <?php } ?>
                        </select>
                        <select name="lstAnio" id="lstAnio" class="form-control d-inline select-chico" required>
                            <option value="" option selected>YYYY</option>
                            <?php for ($i = 1980; $i <= 2023; $i++) { ?>
                                <?php if($i== date_format(date_create($venta->fecha),"Y")):?> 
                                    <option selected value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php else:?> 
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>\
                                    
                                <?php endif;?> 

                            <?php } ?>
                        </select>
                        <input type="time" name="txtHora" id="txtHora" class="form-control d-inline select-mediano" required value="<?php echo date_format(date_create($venta->fecha),"H:m");?> ">
                    </div>

                </div>
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col-6">
                        <label for="lstCliente" class="d-block">Cliente:</label>
                        <select name="lstCliente" id="lstCliente" class="form-control" require>
                        <option value="" disabled selected>Seleccionar</option>
                            <?php foreach ($aCliente as $cliente) : ?>
                                <?php if ($cliente->idcliente == $venta->idventa) : ?>
                                    <option selected value="<?php echo $cliente->idcliente ?>" selected><?php echo $cliente->nombre ?></option>
                                <?php else : ?>
                                    <option value="<?php echo $cliente->idcliente ?>" selected><?php echo $cliente->nombre ?></option>
                                    
                                <?php endif; ?>
                            <?php endforeach; ?>
                            
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="lstProducto" class="d-block">Producto:</label>
                        <select name="lstProducto" id="lstProducto" class="form-control" require>
                        <option value="" disabled selected>Seleccionar</option>
                            
                            <?php foreach ($aProductos as $producto) : ?>
                                <?php if($producto->idproducto==$venta->idventa):?>
                                    <option selected value="<?php echo $producto->idproducto ?>" selected><?php echo $producto->nombre ?></option>
                                <?php else:?>
                                    <option value="<?php echo $producto->idproducto ?>" selected><?php echo $producto->nombre ?></option>
                                    
                                <?php endif;?>
                                
                            <?php endforeach; ?>
                            
                        </select>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-6">
                        <label for="txtPrecioUnitario" class="form-label">Precio Unitario:</label>
                        <input type="text" class="form-control" id="txtPrecioUnitario" name="txtPrecioUnitario" require value="<?php echo $venta->preciounitario ?>">
                    </div>
                    <div class="col-6">
                        <label for="txtCantidad" class="form-label">Cantidad:</label>
                        <input type="number" class="form-control" id="txtCantidad" name="txtCantidad" require value="<?php echo $venta->cantidad ?>">
                    </div>
                </div>

            </div>
            <div class="mb-3">
                <div class="row">

                    <div class="col-6">
                        <label for="txtTotal" class="form-label">Total:</label>
                        <input type="text" class="form-control" id="txtTotal" name="txtTotal" require value="<?php echo $venta->total ?>">
                    </div>
                </div>
            </div>
    </div>


    </form>

    </div>
</body>

</html>