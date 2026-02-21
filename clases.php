<?php

/* ========= CLASE CLIENTE ========= */
class Cliente {

    private $id;
    private $nombre;
    private $telefono;
    private $email;
    private $direccion;

    public function __construct($nombre, $telefono, $email, $direccion) {
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->direccion = $direccion;
    }

    public function guardar($conn) {
        $sql = "INSERT INTO clientes (nombre, telefono, email, direccion)
                VALUES ('$this->nombre', '$this->telefono',
                        '$this->email', '$this->direccion')";
        $conn->query($sql);
        return $conn->insert_id;
    }
}

/* ========= CLASE PINATA ========= */
class Pinata {

    private $id;
    private $nombre;
    private $precio;

    public function __construct($id, $nombre, $precio) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getId() {
        return $this->id;
    }
}

/* ========= CLASE PEDIDO ========= */
class Pedido {

    private $cliente_id;
    private $fecha_pedido;
    private $fecha_entrega;
    private $total = 0;

    public function __construct($cliente_id) {
        $this->cliente_id = $cliente_id;
        $this->fecha_pedido = date("Y-m-d");
        $this->fecha_entrega = date("Y-m-d", strtotime("+5 days"));
    }

    public function agregarDetalle($subtotal) {
        $this->total += $subtotal;
    }

    public function guardar($conn) {
        $sql = "INSERT INTO pedido (fecha_pedido, fecha_entrega, total, id_cliente)
                VALUES ('$this->fecha_pedido', '$this->fecha_entrega',
                        '$this->total', '$this->cliente_id')";
        $conn->query($sql);
        return $conn->insert_id;
    }

    public function getTotal() {
        return $this->total;
    }
}
?>