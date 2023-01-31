<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Cliente
{
  private $dni;
  private $nombre;
  private $correo;
  private $telefono;
  private $descuento;

  public function __construct()
  {
    $this->descuento = 0.0;
  }

  public function __get($propiedad)
  { //solo en php en otros lenguajes toca setear uno a uno
    return $this->$propiedad;
  }

  public function __set($propiedad, $valor)
  {
    $this->$propiedad = $valor;
  }

  function imprimir()
  {
    echo "DNI: " . $this->dni . "<br>";
    echo "Nombre: " . $this->nombre . "<br>";
    echo "Correo: " . $this->correo . "<br>";
    echo "Telefono: " . $this->telefono . "<br>";
    echo "Descuento: " . $this->descuento . "<br>";
  }
}



class Producto
{
  private $cod;
  private $nombre;
  private $precio;
  private $descripcion;
  private $iva;

  public function __construct()
  {
    $this->precio = 0.0;
    $this->iva = 0.0;
  }

  public function __get($propiedad)
  { //solo en php en otros lenguajes toca setear uno a uno
    return $this->$propiedad;
  }

  public function __set($propiedad, $valor)
  {
    $this->$propiedad = $valor;
  }

  function imprimir()
  {
    echo "Cod: " . $this->cod . "<br>";
    echo "Nombre: " . $this->nombre . "<br>";
    echo "Descripcion: " . $this->descripcion . "<br>";
    echo "Precio: " . $this->precio . "<br>";
    echo "Iva: " . $this->iva . "<br>";
  }
}

class Carrito
{
  private $cliente;
  private $aProductos;
  private $subtotal;
  private $total;



  public function __construct()
  {
    $this->subtotal = 0.0;
    $this->total = 0.0;
    $this->aProductos = array();
  }


  public function __get($propiedad)
  { //solo en php en otros lenguajes toca setear uno a uno
    return $this->$propiedad;
  }

  public function __set($propiedad, $valor)
  {
    $this->$propiedad = $valor;
  }

  public function cargarProducto($producto)
  {
    $this->aProductos[] = $producto;
  }

  public function imprimirTicket()
  {
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
      $this->subtotal += $producto->precio;
      $this->total += $producto->precio * (($producto->iva / 100) + 1);
    }

    echo "<tr>
                <th>Subtotal s/IVA:</th>
                <td>$ " . number_format($this->subtotal, 2, ",", ".") . "</td>
              </tr>
            <tr>
                <th>TOTAL:</th>
                <td>$ " . number_format($this->total, 2, ",", ".") . "</td>
              </tr>
        </table>";
  }
}

$cliente1=new Cliente();
$cliente1->dni="4856780";
$cliente1->nombre="Juan";
$cliente1->correo="ff@gmail.com";
$cliente1->telefono="3201564848";
$cliente1->descuento=0.05;
$cliente1->imprimir();


$producto1=new Producto();
$producto1->cod="6780";
$producto1->nombre="Celular";
$producto1->descripcion="Esta es la descripcion";
$producto1->precio=12000;
$producto1->iva=0.19;
$producto1->imprimir();


$producto2=new Producto();
$producto2->cod="677770";
$producto2->nombre="LCDDD";
$producto2->descripcion="Esta es la descripcion";
$producto2->precio=1111111;
$producto2->iva=0.19;
$producto2->imprimir();



$carrito1=new Carrito();
$carrito1->cliente=$cliente1;
print_r($carrito1);
$carrito1->cargarProducto($producto1);
$carrito1->cargarProducto($producto2);
print_r($carrito1);
$carrito1->imprimirTicket($carrito1);





