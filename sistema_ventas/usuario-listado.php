<?php

include_once("config.php");
$pg = "Listado Usuarios";
include_once("header.php");
include_once("entidades/usuario.php");

$usuario=new Usuario();
$aUsuarios= $usuario->obtenerTodos() ;


?>;


<body>
    <div class="container">

        <h1 class="my-4">Listado de usuarios</h1>
        <a href="usuario-formulario.php" class="btn btn-primary mb-2">Nuevo</a>
        <table class='table table-bordered table-striped table-hover'>
            <thead>
                <tr>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($aUsuarios as $usuario) : ?>
                    <tr>
                        <td><?php echo $usuario->usuario; ?></td>
                        <td><?php echo $usuario->nombre; ?></td>
                        <td><?php echo $usuario->apellido; ?></td>
                        <td><?php echo $usuario->correo; ?></td>       
                        <td> <a href="usuario-formulario.php?id=<?php echo $usuario->idusuario; ?>">Editar</a></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>


    </div>
</body>

</html>