<?php

use Producto as GlobalProducto;

    class TipoProducto
    {
        private $idtipoproducto;
        private $nombre;


        function __construct()
        {
            
        }

        public function __get($atributo) {
            return $this->$atributo;
        }
    
        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
            return $this;
        }

        public function cargarTipoProducto($request)
        {
            $this->idtipoproducto = isset($request["id"]) ? $request["id"] : "";
            $this->nombre = isset($request["txtNombre"]) ? $request["txtNombre"] : "";
        }

        
        public function insertar()
      {
        //Instancia la clase mysqli con el constructor parametrizado
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        //Arma la query
        //si son numeros no tiene comillas
        $sql = "INSERT INTO tipo_productos (
                    nombre
                ) VALUES (
                    '$this->nombre'
                );";
        // print_r($sql);exit;
        //Ejecuta la query
        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        //Obtiene el id generado por la inserción
        $this->idtipoproducto = $mysqli->insert_id;
        //Cierra la conexión
        $mysqli->close();
    }

    
    public function cargarFormulario($request)
    {
        $this->idtipoproducto = isset($request["id"]) ? $request["id"] : "";
        $this->nombre = isset($request["txtNombre"]) ? $request["txtNombre"] : "";
    }

    public function actualizar()
    {

        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "UPDATE tipo_productos SET
                nombre = '$this->nombre'
                WHERE id_tipoproducto = $this->idtipoproducto";

        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        $mysqli->close();
    }


    public function eliminar()
    {
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "DELETE FROM tipo_productos WHERE id_tipoproducto = " . $this->idtipoproducto;
        //Ejecuta la query
        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        $mysqli->close();
    }

    public function obtenerPorId()
    {
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "SELECT id_tipoproducto,
                        nombre
                FROM tipo_productos
                WHERE id_tipoproducto = $this->idtipoproducto";
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }

        //Convierte el resultado en un array asociativo
        if ($fila = $resultado->fetch_assoc()) {
            $this->idtipoproducto = $fila["id_tipoproducto"];
            $this->nombre = $fila["nombre"];
        }
        $mysqli->close();

    }

    
    public function obtenerTodos(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "SELECT 
                    id_tipoproducto,
                    nombre
                FROM tipo_productos";
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }

        $aResultado = array();

        if($resultado){
            //Convierte el resultado en un array asociativo

            while($fila = $resultado->fetch_assoc()){ //fetchsoc carga la fila 
                $entidadAux = new TipoProducto();
                $entidadAux->idtipoproducto = $fila["id_tipoproducto"];
                $entidadAux->nombre = $fila["nombre"];
                $aResultado[] = $entidadAux;
            }
        }
        return $aResultado;//devuelve el array con los datos
    }

    

    }
