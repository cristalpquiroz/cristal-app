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
// Crear cliente
$cliente1 = new Cliente(1, "María López", "555-1234", "maria@email.com", "Ciudad de México");

// Crear piñatas
$pinata1 = new Pinata(1, "Piñata Spiderman", 350, 10);
$pinata2 = new Pinata(2, "Piñata Frozen", 400, 5);

// Crear detalles
$detalle1 = new DetallePedido(1, $pinata1, 2);
$detalle2 = new DetallePedido(2, $pinata2, 1);

// Crear pedido
$pedido1 = new Pedido(1, $cliente1, "2026-02-20", "2026-02-25");

// Agregar detalles al pedido
$pedido1->agregarDetalle($detalle1);
$pedido1->agregarDetalle($detalle2);

// Mostrar pedido
$pedido1->mostrarPedido();

?>
