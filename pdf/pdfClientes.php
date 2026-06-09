<?php
require_once('fpdf186/fpdf.php'); // Incluir FPDF
require_once('../motor/conexion.php'); // Conexión a la base de datos

// Crear instancia de FPDF
$pdf = new FPDF('L', 'mm', 'A4'); // Formato horizontal (L), tamaño A4
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);

// Título centrado
$pdf->Cell(0, 10, 'Lista de Clientes', 0, 1, 'C');
$pdf->Ln(5);

// Definir ancho de las columnas para centrar la tabla
$column_widths = [40, 30, 50, 30, 35, 30]; // Anchos de cada columna
$table_width = array_sum($column_widths); // Ancho total de la tabla
$center_x = (297 - $table_width) / 2; // Centrar en un documento A4 horizontal (297mm)

// Mover a la posición centrada
$pdf->SetX($center_x);

// Encabezado de la tabla
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(200, 200, 200);
foreach (['Usuario', 'Nit/Ci', 'Razon Social', 'Telefono', 'Puntos Totales', 'Estado'] as $i => $col_name) {
    $pdf->Cell($column_widths[$i], 7, $col_name, 1, 0, 'C', 1);
}
$pdf->Ln();

// Obtener datos de la base de datos
$consulta = "SELECT * FROM cliente";
$resultado = mysqli_query($conexion, $consulta);

// Agregar datos a la tabla
$pdf->SetFont('Arial', '', 9);
while ($fila = mysqli_fetch_array($resultado)) {
    $estado = ($fila['estado'] == "activo") ? "Activo" : "Inactivo";

    // Centrar cada fila de datos
    $pdf->SetX($center_x);

    $pdf->Cell(40, 6, utf8_decode($fila['usuario']), 1, 0, 'C');
    $pdf->Cell(30, 6, $fila['nit_ci'], 1, 0, 'C');
    $pdf->Cell(50, 6, utf8_decode($fila['rz']), 1, 0, 'C');
    $pdf->Cell(30, 6, $fila['telefono'], 1, 0, 'C');
    $pdf->Cell(35, 6, $fila['sumapuntos'], 1, 0, 'C');
    $pdf->Cell(30, 6, utf8_decode($estado), 1, 1, 'C');
}

// Generar el PDF y mostrar en el navegador
$pdf->Output('Reporte_Clientes.pdf', 'I'); // 'I' para mostrar, 'D' para descargar
?>
