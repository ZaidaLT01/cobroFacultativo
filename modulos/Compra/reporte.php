<?php 
 require ('../tcpdf/tcpdf.php');
 require("../controlador/conexion_bd.php");

 $pdf = new TCPDF('L','mm','Letter',true,'UTF-8',false);
 $pdf->SetTitle('Reporte Producto');
 $pdf->setPrintHeader(false);
 $pdf->setPrintFooter(false);
 $pdf->SetMargins(20,20,20,20);
 $pdf->SetAutoPageBreak(true,20);
 $pdf->addPage();


$html = '';
//Obtenemos la fecha del reporte
$fhsql = "SELECT NOW() AS fh, YEAR(NOW()) AS gestion";
//$res = mysql_query($fhsql);
//$dato = mysql_fetch_array($res);
//$fh = $dato['fh'];
//$gestion = $dato['gestion'];

$html .= '
&nbsp;<table cellpadding ="5">
	<tr>
		<td align = "left"><img src="../img/escudo-bolivia.jpg" width = "70px"></td>
		<td align = "center"><h1>COLEGIO PARTICULAR "OSCAR ALFARO"</h1>	
							<h2>SIE: 40730089</h2>						
							</td>
		<td align = "right"><img src="../img/escudoOA.png" width = "70px"></td>
	</tr>	
</table>

 <table border ="1" cellpadding ="5">
 			<tr align ="center" bgcolor="#E4E4E4">
				<td width = "5%"><b>N°</b></td>
				<td width = "30%"><b>NOMBRE Pructo</b></td>
				<td><b>cantidad</b></td>
				<td><b>RUDE</b></td>
				<td><b>CURSO</b></td>
				<td><b>NIVEL</b></td>
			</tr>';
$consulta="SELECT id_producto, id_proveedor, nombre, descripcion, costo_compra, costo_venta, stock, fecha FROM producto";

$res=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($res);

$numero = 1;
if($filas!=0)
{  
while($dato=mysqli_fetch_array($res))
 {  	
 	$nom=$dato['nombre'];
 	$cv=$dato['costo_venta'];
 	$cc=$dato['costo_compra'];
	$fe=$dato['fecha'];
			
	 $html .= '<tr align="center">
	 			<td>'.$nom.'</td>
			 	<td>'.$cv.'</td> 
			 	<td>'.$cc.'</td>
			 	<td>'.$fe.'</td> 
			    </tr>';		  
	$numero ++; 	 
 }
}
$html .= '</table>';

 $pdf->SetFont('Helvetica','',10);
 $pdf->writeHTML($html,true,0,true,0);
 $pdf->lastPage();
 $pdf->output('Reporte_producto.pdf','I');
 ?>