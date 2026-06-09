

<?php
require_once("../../motor/conexion.php"); // Incluir la conexión

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id']) && isset($_POST['estado'])) {
    $id = intval($_POST['id']); // ID del empleado
    $nuevoEstado = $_POST['estado'] === "activo" ? "activo" : "inactivo"; // Validar el estado

    // Actualizar el estado en la base de datos
    $query = "UPDATE cliente SET estado = '$nuevoEstado' WHERE id_cliente = $id";
    $resultado = mysqli_query($conexion, $query);

    if ($resultado) {
        echo "Estado actualizado correctamente.";
    } else {
        echo "Error al actualizar el estado.";
    }
}
?>
