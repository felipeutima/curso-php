<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

 class Cliente {
    public $dni;
    public $nombre;
    public $correo;
    public $telefono;
    public $descuento;
    
    public function __construct(){ 
        $this->descuento= 0.0;
    }
    
    public function setDni($dni){ $this->dni = $dni; }
    public function getDni(){ return $this->dni; }

    public function setNombre($nombre){ $this->nombre = $nombre; }
    public function getNombre(){ return $this->nombre; }

    public function setCorreo($correo){ $this->correo = $correo; }
    public function getCorreo(){ return $this->correo; }

    public function setTelefono($telefono){ $this->telefono = $telefono; }
    public function getTelefono(){ return $this->telefono; }
       
   
    function imprimir(){
        echo "DNI: " . $this->dni . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Correo: " . $this->correo . "<br>";
        echo "Telefono: " . $this->telefono . "<br>";
        echo "Descuento: " . $this->descuento . "<br>";
    }
}



class Producto {
    public $cod;
    public $nombre;
    public $precio;
    public $descripcion;
    public $iva;

    public function __construct(){ 
        $this->precio= 0.0;
        $this->iva= 0.0;
    }

    public function setCod($cod){ $this->cod = $cod; }
    public function getCod(){ return $this->cod; }

    public function setNombre($nombre){ $this->nombre = $nombre; }
    public function getNombre(){ return $this->nombre; }

    public function setDescripcion($descripcion){ $this->descripcion = $descripcion; }
    public function getDescripcion(){ return $this->descripcion; }

    function imprimir(){
        echo "Cod: " . $this->cod . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Descripcion: " . $this->descripcion. "<br>";
        echo "Precio: " . $this->precio . "<br>";
        echo "Iva: " . $this->iva . "<br>";

    }
}

class Carrito {
    public $cliente;
    public $aProductos;
    public $subtotal;
    public $total;
    
        

    public function __construct(){ 
        $this->subTotal= 0.0;
        $this->total= 0.0;
        $this->aProductos = array();
    }

    public function setCliente($cliente){ $this->cliente = $cliente; }
    public function getCliente(){ return $this->cliente; }



    public function cargarProducto($producto){
        $this->aProductos[] = $producto;
    }

    public function imprimirTicket() {
        echo "<table class='table table-hover border' style='width:400px'>";
        echo "<tr><th colspan='2' class='text-center'>ECO MARKET</th></tr>
              <tr>
                <th>Fecha</th>
                <td>" . date("d/m/Y H:i:s") . "</td>
              </tr>
              <tr>
                <th>DNI</th>
                <td>" . $this->cliente->dni . "</td>
              </tr>
              <tr>
                <th>Nombre</th>
                <td>" . $this->cliente->nombre . "</td>
              </tr>
              <tr>
                <th colspan='2'>Productos:</th>
              </tr>";
              foreach ($this->aProductos as $producto) {
                echo "<tr>
                            <td>" . $producto->nombre . "</td>
                            <td>$ " . number_format($producto->precio, 2, ",", ".") . "</td>
                        </tr>";
                $this->subTotal += $producto->precio;
                $this->total += $producto->precio * (($producto->iva / 100)+1);
              }
             
        echo "<tr>
                <th>Subtotal s/IVA:</th>
                <td>$ " . number_format($this->subTotal, 2, ",", ".") . "</td>
              </tr>
            <tr>
                <th>TOTAL:</th>
                <td>$ " . number_format($this->total, 2, ",", ".") . "</td>
              </tr>
        </table>";
    }
}


$cliente1 = new Cliente();
$cliente1->dni = "34765456";
$cliente1->nombre = "Bernabé";
$cliente1->correo = "bernabe@gmail.com";
$cliente1->telefono = "+541188598686";
$cliente1->descuento = 0.05;
$cliente1->imprimir();

$producto1 = new Producto();
$producto1->cod = "AB8767";
$producto1->nombre = "Notebook 15\" HP";
$producto1->descripcion = "Esta es una computadora HP";
$producto1->precio = 30800;
$producto1->iva = 21;
$producto1->imprimir();


$producto2 = new Producto();
$producto2->cod = "JBGH678";
$producto2->nombre = "TV Samsung 42\"";
$producto2->descripcion = "Televisor HD";
$producto2->precio = 60800;
$producto2->iva = 10.5;
$producto2->imprimir();

$carrito = new Carrito();
$carrito->cliente = $cliente1;
$carrito->cargarProducto($producto1);
$carrito->cargarProducto($producto2);
$carrito->imprimirTicket();