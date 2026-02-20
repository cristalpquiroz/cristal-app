>?php
$conexion=mysqli_connect("localhost","root","","limones_db");
if($conexion->connect_error){
    die("Error de conexión: " . $conexion->connect_error);
}
?>
