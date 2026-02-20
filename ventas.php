<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Limones Piñateros</title>
    <link rel="stylesheet" href="estilos.css">
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

        <hr>

        <h2>Simular Pedido</h2>
        <form method="POST">
            <select name="producto">
                <option value="350">Piñata Spiderman - $350</option>
                <option value="400">Piñata Frozen - $400</option>
            </select>

            <input type="number" name="cantidad" placeholder="Cantidad" required>
            <button type="submit" name="pedido">Calcular Total</button>
        </form>

        <hr>


</body>
</html>