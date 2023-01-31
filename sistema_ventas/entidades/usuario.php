<?php

class Usuario
{
    private $idusuario;
    private $nombre;
    private $apellido;
    private $correo; 
    private $usuario;
    private $clave;

    public function __construct()
    {

    }

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
        return $this;
    }

    public function cargarFormulario($request)
    {
        $this->idusuario = isset($request["id"]) ? $request["id"] : "";
        $this->nombre = isset($request["txtNombre"]) ? $request["txtNombre"] : "";
        $this->apellido = isset($request["txtApellido"]) ? $request["txtApellido"] : "";
        $this->correo = isset($request["txtCorreo"]) ? $request["txtCorreo"] : "";
        $this->usuario = isset($request["txtUsuario"]) ? $request["txtUsuario"] : "";
        $this->clave = isset($request["txtClave"]) ? password_hash($request["txtClave"],PASSWORD_DEFAULT) : "";

    }

    public function insertar()
    {
        //Instancia la clase mysqli con el constructor parametrizado
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        //Arma la query
        //si son numeros no tiene comillas
        $sql = "INSERT INTO usuarios(
                    nombre,
                    apellido,
                    correo,
                    usuario,
                    clave
                ) VALUES (

                    '$this->nombre',
                    '$this->apellido',
                    '$this->correo',
                    '$this->usuario',
                    '$this->clave'
                );";
        // print_r($sql);exit;
        //Ejecuta la query
        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        //Obtiene el id generado por la inserción
        $this->idusuario = $mysqli->insert_id;
        //Cierra la conexión
        $mysqli->close();
    }

    public function actualizar()
    {

        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "UPDATE usuarios SET
                nombre = '$this->nombre',
                apellido = '$this->apellido', 
                usuario =  '$this->usuario',";
                if($this -> clave !=""){
                    $sql .= "clave = '$this->clave',";
                }
                $sql .="correo = '$this->correo'
                WHERE idusuario= ". $this ->idusuario;

        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        $mysqli->close();
    }

    public function eliminar()
    {
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "DELETE FROM usuarios WHERE idusuario = " . $this->idusuario;
        //Ejecuta la query
        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        $mysqli->close();
    }
    

    public function obtenePorUsuario($nombreUsuario)
    {
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "SELECT idusuario,
                        nombre,
                        apellido,
                        correo,
                        usuario,
                        clave
                FROM usuarios
                WHERE usuario = '$nombreUsuario' ";
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }

        //Convierte el resultado en un array asociativo
        if ($fila = $resultado->fetch_assoc()) {
            $this->idusuario = $fila["idusuario"];
            $this->nombre = $fila["nombre"];
            $this->apellido = $fila["apellido"];
            $this->correo = $fila["correo"];
            $this->usuario = $fila["usuario"];
            $this->clave = $fila["clave"];
        }
        $mysqli->close();

    }

     public function obtenerTodos(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "SELECT 
                    idusuario,
                    nombre,
                    apellido,
                    correo,
                    usuario,
                    clave
                FROM usuarios";
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }

        $aResultado = array();

        if($resultado){
            //Convierte el resultado en un array asociativo

            while($fila = $resultado->fetch_assoc()){ //fetchsoc carga la fila 
                $entidadAux = new Usuario();
                $entidadAux->idusuario = $fila["idusuario"];
                $entidadAux->nombre = $fila["nombre"];
                $entidadAux->apellido = $fila["apellido"];
                $entidadAux->correo = $fila["correo"];
                $entidadAux->usuario = $fila["usuario"];
                $entidadAux->clave = $fila["clave"];
                $aResultado[] = $entidadAux;
            }
        }
        return $aResultado;//devuelve el array con los datos
    }

    public function obtenerPorId()
    {
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "SELECT 
            	idusuario,
                usuario,
                nombre,
                apellido,
                correo,
                usuario,
                clave
                FROM usuarios
                WHERE idusuario = $this->idusuario";
         
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }

        //Convierte el resultado en un array asociativo
        if ($fila = $resultado->fetch_assoc()) {
            $this->idusuario = $fila["idusuario"];
            $this->nombre = $fila["nombre"];
            $this->apellido = $fila["apellido"];
            $this->correo = $fila["correo"];
            $this->usuario = $fila["usuario"];
            $this->clave = $fila["clave"];
        }
        $mysqli->close();

    }

}
?>