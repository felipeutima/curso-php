<?php

class Localidad{
    private $idlocalidad;
    private $nombre;
    private $fk_idprovincia;
    private $cod_postal;

    public function __construct(){

    }

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
        return $this;
    }
    
    public function obtenerPorProvincia($idProvincia){
        $aLocalidades = null;
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "SELECT 
            idlocalidad,
            nombre, 
            cod_postal
            FROM localidades 
            WHERE fk_idprovincia = $idProvincia
            ORDER BY idlocalidad ASC";
        $resultado = $mysqli->query($sql);

        //cargar filas en array
        while ($fila = $resultado->fetch_assoc()) {
            $aLocalidades[] = array(
                "idlocalidad" => $fila["idlocalidad"],
                "nombre" => $fila["nombre"],
                "cod_postal" => $fila["cod_postal"]);
       
        }
        return $aLocalidades;
    }
    
    public function obtenerTodos(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "SELECT 
                idlocalidad,
                nombre,
                cod_postal,
                fk_idprovincia
                FROM localidades";
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }

        $aResultado = array();

        if($resultado){
            //Convierte el resultado en un array asociativo

            while($fila = $resultado->fetch_assoc()){ //fetchsoc carga la fila 
                $entidadAux = new Venta();
                $entidadAux->idlocalidad = $fila["idlocalidad"];
                $entidadAux->nombre = $fila["nombre"];
                $entidadAux->fk_idprovincia = $fila["fk_idprovincia"];
                $entidadAux->cod_postal= $fila["cod_postal"];
                $aResultado[] = $entidadAux;
            }
        }
        return $aResultado;//devuelve el array con los datos
    }

}


?>