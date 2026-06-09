<?php
require_once("../../motor/conexion.php"); // Incluir la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']); // Obtener el ID del cliente

    // Actualizar los puntos sumando 1
    $query = "UPDATE cliente SET sumapuntos = sumapuntos + 1 WHERE id_cliente = $id";
    $resultado = mysqli_query($conexion, $query);

    if ($resultado) {
        // Obtener el nuevo total de puntos
        $consulta = "SELECT sumapuntos FROM cliente WHERE id_cliente = $id";
        $res = mysqli_query($conexion, $consulta);
        $fila = mysqli_fetch_assoc($res);
        echo $fila['sumapuntos']; // Enviar el nuevo valor a la tabla
    } else {
        echo "Error";
    }
}
?>

