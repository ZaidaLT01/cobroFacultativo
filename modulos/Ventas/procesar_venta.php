<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_SESSION["usuario"];
    $nivel = $_SESSION["tipo_usuario_id_tipo"];
    $productos = $_POST["productos"];

    // Determinar si el usuario es empleado o cliente
    if ($nivel == 1) { // Nivel 1: Empleado
        $query = "SELECT id_empleado FROM empleado WHERE usuario = '$usuario'";
    } else { // Nivel 2: Cliente
        $query = "SELECT id_cliente FROM cliente WHERE usuario = '$usuario'";
    }

    $result = mysqli_query($conexion, $query);
    $data = mysqli_fetch_assoc($result);

    // Verificar si el usuario existe en la base de datos
    if (!$data) {
        echo "<script>alert('Error: Usuario no encontrado en la base de datos.'); window.history.back();</script>";
        exit();
    }

    // Asignar los valores correctos
    if ($nivel == 1) {
        $empleado_id = $data['id_empleado'];
        $cliente_id = "NULL"; // NULL en SQL, no en PHP
    } else {
        $cliente_id = $data['id_cliente'];
        $empleado_id = "NULL"; // NULL en SQL, no en PHP
    }

    // Validar que al menos un producto tenga cantidad > 0
    $productosSeleccionados = array_filter($productos, fn($cantidad) => $cantidad > 0);
    if (empty($productosSeleccionados)) {
        echo "<script>alert('Debe seleccionar al menos un producto.'); window.history.back();</script>";
        exit();
    }

    // Insertar en la tabla venta
    $query = "INSERT INTO venta (cliente_id_cliente, empleado_id_empleado, fecha) 
              VALUES ($cliente_id, $empleado_id, NOW())";
    $result = mysqli_query($conexion, $query);

    if ($result) {
        $venta_id = mysqli_insert_id($conexion); // Obtener el ID de la venta recién creada

        // Insertar productos en la tabla intermedia venta_producto
        foreach ($productosSeleccionados as $id_cafeteria => $cantidad) {
            $query = "INSERT INTO venta_producto (id_venta, id_cafeteria, cantidad) 
                      VALUES ('$venta_id', '$id_cafeteria', '$cantidad')";
            mysqli_query($conexion, $query);
        }

        echo "<script>
                alert('Venta registrada correctamente.');
                window.location.href = '../../inicio.php?mod=ventas';
              </script>";
    } else {
        echo "<script>
                alert('Error al registrar la venta.');
                window.history.back();
              </script>";
    }
}
?>

