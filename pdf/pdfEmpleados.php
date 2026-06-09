<?php
require_once('fpdf186/fpdf.php'); // Incluir FPDF
require_once('../motor/conexion.php'); // Incluir la conexión a la base de datos

// Crear instancia de FPDF
$pdf = new FPDF('L', 'mm', 'A4'); // Formato horizontal (L) y tamaño A4
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'Lista de Empleados', 0, 1, 'C');
$pdf->Ln(5);

// Encabezado de la tabla
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(200, 200, 200);
$pdf->Cell(30, 7, 'Turno', 1, 0, 'C', 1);
$pdf->Cell(30, 7, 'Cargo', 1, 0, 'C', 1);
$pdf->Cell(30, 7, 'Paterno', 1, 0, 'C', 1);
$pdf->Cell(30, 7, 'Materno', 1, 0, 'C', 1);
$pdf->Cell(40, 7, 'Nombres', 1, 0, 'C', 1);
$pdf->Cell(25, 7, 'CI', 1, 0, 'C', 1);
$pdf->Cell(40, 7, 'Dirección', 1, 0, 'C', 1);
$pdf->Cell(25, 7, 'Teléfono', 1, 0, 'C', 1);
$pdf->Cell(20, 7, 'Estado', 1, 1, 'C', 1);

// Obtener datos de la base de datos
$consulta = "SELECT t.turno, c.cargo, e.* FROM turno t, cargo c, empleado e WHERE t.id_turno = e.turno_id_turno AND c.id_cargo = e.cargo_id_cargo";
$resultado = mysqli_query($conexion, $consulta);

// Agregar datos a la tabla
$pdf->SetFont('Arial', '', 9);
while ($fila = mysqli_fetch_array($resultado)) {
    $pdf->Cell(30, 6, utf8_decode($fila['turno']), 1, 0, 'C');
    $pdf->Cell(30, 6, utf8_decode($fila['cargo']), 1, 0, 'C');
    $pdf->Cell(30, 6, utf8_decode($fila['ap_paterno']), 1, 0, 'C');
    $pdf->Cell(30, 6, utf8_decode($fila['ap_materno']), 1, 0, 'C');
    $pdf->Cell(40, 6, utf8_decode($fila['nombres']), 1, 0, 'C');
    $pdf->Cell(25, 6, $fila['ci'], 1, 0, 'C');
    $pdf->Cell(40, 6, utf8_decode($fila['direccion']), 1, 0, 'C');
    $pdf->Cell(25, 6, $fila['telefono'], 1, 0, 'C');
    $pdf->Cell(20, 6, ucfirst($fila['estado']), 1, 1, 'C'); // Estado con mayúscula inicial
}

// Generar el PDF y mostrar en el navegador
$pdf->Output('Reporte_Empleados.pdf', 'I'); // 'I' para mostrar, 'D' para descargar
?>