<?php
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Limones Piñateros</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

<header>
    <h1> Limones Piñateros</h1>
    <p>Sistema de Gestión de Pedidos</p>
</header>

<section class="contenedor">

<h2>Registrar Cliente</h2>
<form method="POST">
    <input type="text" name="nombre" placeholder="Nombre del Cliente" required>
    <input type="text" name="telefono" placeholder="Teléfono" required>
    <input type="email" name="email" placeholder="Correo" required>
    <input type="text" name="direccion" placeholder="Dirección" required>
    <button type="submit" name="registrar">Registrar</button>
</form>

</section>

</body>
</html>
<?php
/**
 * Clase Cliente
 * Representa un cliente de la tienda
 */
class Cliente {

    // Atributos
    private $id_cliente;
    private $nombre;
    private $telefono;
    private $email;
    private $direccion;

    // Constructor
    public function __construct($id_cliente, $nombre, $telefono, $email, $direccion) {
        $this->id_cliente = $id_cliente;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->direccion = $direccion;
    }

    // Método para mostrar información
    public function mostrarCliente() {
        echo "Cliente: $this->nombre <br>";
        echo "Teléfono: $this->telefono <br>";
        echo "Email: $this->email <br>";
        echo "Dirección: $this->direccion <br><hr>";
    }
}
class Pinata {

    private $id_pinata;
    private $nombre;
    private $precio;
    private $stock;

    public function __construct($id_pinata, $nombre, $precio, $stock) {
        $this->id_pinata = $id_pinata;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock = $stock;
    }

    public function mostrarPinata() {
        echo "Piñata: $this->nombre <br>";
        echo "Precio: $$this->precio <br>";
        echo "Stock: $this->stock <br><hr>";
    }

    public function getPrecio() {
        return $this->precio;
    }
}
 class DetallePedido {

    private $id_detalle;
    private $pinata;
    private $cantidad;
    private $subtotal;

    public function __construct($id_detalle, $pinata, $cantidad) {
        $this->id_detalle = $id_detalle;
        $this->pinata = $pinata;
        $this->cantidad = $cantidad;
        $this->subtotal = $pinata->getPrecio() * $cantidad;
    }

    public function mostrarDetalle() {
        echo "Cantidad: $this->cantidad <br>";
        echo "Subtotal: $$this->subtotal <br><hr>";
    }

    public function getSubtotal() {
        return $this->subtotal;
    }
}
class Pedido {

    private $id_pedido;
    private $cliente;
    private $fecha_pedido;
    private $fecha_entrega;
    private $detalles = [];
    private $total = 0;

    public function __construct($id_pedido, $cliente, $fecha_pedido, $fecha_entrega) {
        $this->id_pedido = $id_pedido;
        $this->cliente = $cliente;
        $this->fecha_pedido = $fecha_pedido;
        $this->fecha_entrega = $fecha_entrega;
    }

    public function agregarDetalle($detalle) {
        $this->detalles[] = $detalle;
        $this->total += $detalle->getSubtotal();
    }

    public function mostrarPedido() {
        echo "<h3>Pedido #$this->id_pedido</h3>";
        $this->cliente->mostrarCliente();
        echo "Fecha Pedido: $this->fecha_pedido <br>";
        echo "Fecha Entrega: $this->fecha_entrega <br>";
        echo "<h4>Detalles:</h4>";

        foreach ($this->detalles as $detalle) {
            $detalle->mostrarDetalle();
        }

        echo "<strong>Total: $$this->total</strong><br><hr>";
    }
}

// Mostrar pedido
$pedido1->mostrarPedido();

?>
