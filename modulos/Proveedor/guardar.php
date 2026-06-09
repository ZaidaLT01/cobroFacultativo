<?php
require_once("motor/conexion.php");

// Obtener datos del formulario
$em = $_POST['empresa'];
$co = $_POST['contacto'];
$ma = $_POST['mail'];
$te = $_POST['telefono'];
$di = $_POST['direccion'];

$logo = null; // Inicializamos la variable

// Verificar si se subió un archivo
if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == UPLOAD_ERR_OK) {
    $a = $_FILES['imagen']['name']; // Nombre del archivo
    $b = $_FILES['imagen']['tmp_name']; // Ubicación temporal
    $c = $_FILES['imagen']['size']; // Tamaño del archivo

    $upload_dir = "../modulos/Proveedor/img/"; // Directorio destino
    $logo = uniqid() . "_" . basename($a); // Renombrar archivo para evitar duplicados
    $upload_path = $upload_dir . $logo; // Ruta completa

    // Mover el archivo a la carpeta destino
    if (move_uploaded_file($b, $upload_path)) {
        // Archivo subido correctamente
    } else {
        $logo = null; // Si hay error en la subida, no guardar nombre de archivo
    }
}

// Construir la consulta SQL
if ($logo) {
    $q = "INSERT INTO proveedor (empresa, contacto, mail, telefono, direccion, logo) 
          VALUES ('$em', '$co', '$ma', '$te', '$di', '$logo')";
} else {
    $q = "INSERT INTO proveedor (empresa, contacto, mail, telefono, direccion) 
          VALUES ('$em', '$co', '$ma', '$te', '$di')";
}

// Ejecutar la consulta
$r = mysqli_query($conexion, $q);

if ($r) {
    echo "<script>
            alert('Proveedor registrado correctamente');
            location.href='./inicio.php?mod=proveedores';
          </script>";
} else {
    echo "<script>
            alert('Error al registrar proveedor');
            location.href='./inicio.php?mod=proveedores';
          </script>";
}
?>

