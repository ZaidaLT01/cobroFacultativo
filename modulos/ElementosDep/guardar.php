<?php
require_once("motor/conexion.php"); // Incluir la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nom']);
    $alto = trim($_POST['alto']);
    $ancho = trim($_POST['ancho']);
    $color = trim($_POST['color']);
    $estado = trim($_POST['estado']);
    $descripcion = trim($_POST['desc']);

    // Validar que los campos no estén vacíos
    if (empty($nombre) || empty($alto) || empty($ancho) || empty($color) || empty($estado) || empty($descripcion)) {
        echo "<script>
                alert('Todos los campos son obligatorios.');
                window.history.back();
              </script>";
        exit();
    }

 

    // Insertar datos en la base de datos
    $query = "INSERT INTO ambientes (nombre, m_alto, m_ancho, color, estado, descripcion) 
              VALUES ('$nombre', '$alto', '$ancho', '$color', '$estado', '$descripcion')";
    $resultado = mysqli_query($conexion, $query);

    if ($resultado) {
        echo "<script>
                alert('Registro exitoso.');
                window.location.href='./inicio.php?mod=ambientes';
              </script>";
    } else {
        echo "<script>
                alert('Error al registrar.');
                window.history.back();
              </script>";
    }
}
?>
