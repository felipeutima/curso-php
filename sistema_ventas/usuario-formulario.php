<?php

include_once("config.php");
$pg = "Usuario";
include_once("header.php");
include_once("entidades/usuario.php");

$usuario=new Usuario();
$usuario->cargarFormulario($_REQUEST);

if ($_POST) {
    //logica de guardar
    if (isset($_REQUEST["btnGuardar"])) {
        if (isset($_GET["id"]) && $_GET["id"] > 0) {
            $usuario->actualizar();
            $msg["texto"] = "Actualizado Correctamente";
        } else {
            $usuario->insertar();
            $msg["texto"] = "Insertado Correctamente";
        }
    }
    //logica de borrar
    else if (isset($_REQUEST["btnBorrar"])) {
        //para verificar que no hayan fk asociados

        $usuario->eliminar();
        $msg["texto"] = "Eliminado Correctamente";
    }
    $msg["codigo"] = "alert-success";
}

if (isset($_GET["id"]) && $_GET["id"] > 0) {
    $usuario->obtenerPorId(); //trae el objeto por id
    print_r($usuario);
}

?>;

<body>
    <div class="container">

        <h1 class="my-4">Usuario</h1>
        <?php if (isset($msg)) : ?>
            <div class="row">
                <div class="col-12">
                    <div class="alert <?php echo $msg["codigo"]; ?>" role="alert">
                        <?php echo $msg["texto"]; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <a href="usuario-listado.php" class="btn btn-primary mb-2">Listado</a>
        <button class="btn btn-primary mb-2">Nuevo</button>
        <button class="btn btn-success mb-2" id="btnGuardar" name=btnGuardar>Guardar</button>
        <button class="btn btn-danger mb-2" id="btnBorrar" name="btnBorrar">Borrar</button>
        <form action="POST">
            <div class="mb-3">
                <div class="row">
                    <div class="col-6">
                        <label for="txtUsuario" class="form-label">Usuario:</label>
                        <input type="text" class="form-control" id="txtUsuario" name="txtUsuario" required value="<?php echo $usuario->usuario?>">
                    </div>
                    <div class="col-6">
                        <label for="txtNombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="txtNombre" name="txtNombre" required value="<?php echo $usuario->nombre  ?>">
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col-6">
                        <label for="txtApellido" class="form-label">Apellido:</label>
                        <input type="text" class="form-control" id="txtApellido" name="txtApellido" required value="<?php echo $usuario->apellido ?>">
                    </div>
                    <div class="col-6">
                        <label for="txtCorreo" class="form-label">Correo:</label>
                        <input type="text" class="form-control" id="txtCorreo" name="txtCorreo" required value="<?php echo $usuario->correo ?>">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-6">
                        <label for="txtClave" class="form-label">Clave:</label>
                        <input type="password" class="form-control" id="txtClave" name="txtClave" required >
                    </div>
                </div>
            </div>


        </form>

    </div>
</body>

</html>