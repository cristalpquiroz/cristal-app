<?php
require_once("conexion.php");
require_once("clases.php");

$mensaje = "";

/* REGISTRAR CLIENTE */
if(isset($_POST['registrar'])){

    $cliente = new Cliente(
        $_POST['nombre'],
        $_POST['telefono'],
        $_POST['email'],
        $_POST['direccion']
    );

    $id_cliente = $cliente->guardar($conn);
    $mensaje = "Cliente guardado con ID: " . $id_cliente;
}

/* REGISTRAR PEDIDO */
if(isset($_POST['pedido'])){

    $id_cliente = 1;  // temporal

    $id_pinata = $_POST['producto'];
    $cantidad = $_POST['cantidad'];

    $consulta = $conn->query("SELECT precio FROM pinata WHERE id_pinata = $id_pinata");
    $fila = $consulta->fetch_assoc();
    $precio = $fila['precio'];

    $pedido = new Pedido($id_cliente);
    $total = $pedido->calcularTotal($precio, $cantidad);

    $id_pedido = $pedido->guardar($conn);

    $conn->query("INSERT INTO detalle_pedido (id_pedido, id_pinata, cantidad, subtotal)
                  VALUES ('$id_pedido', '$id_pinata', '$cantidad', '$total')");

    $mensaje = "Pedido registrado. Total: $" . $total;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Limones Piñateros</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

<h1> Limones Piñateros</h1>

<?php
if($mensaje != ""){
    echo "<p><strong>$mensaje</strong></p>";
}
?>

<h2>Registrar Cliente</h2>
<form method="POST">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="text" name="telefono" placeholder="Teléfono" required>
    <input type="email" name="email" placeholder="Correo" required>
    <input type="text" name="direccion" placeholder="Dirección" required>
    <button type="submit" name="registrar">Registrar</button>
</form>

<hr>

<h2>Registrar Pedido</h2>
<form method="POST">

<select name="producto">
<?php
$resultado = $conn->query("SELECT * FROM pinata");
while($fila = $resultado->fetch_assoc()){
    echo "<option value='".$fila['id_pinata']."'>
            ".$fila['nombre']." - $".$fila['precio']."
          </option>";
}
?>
</select>

<input type="number" name="cantidad" placeholder="Cantidad" required>
<button type="submit" name="pedido">Guardar Pedido</button>

</form>

</body>
</html>