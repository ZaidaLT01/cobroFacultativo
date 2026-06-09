<?php
# Cargamos la librería dompdf.
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
	include("seguridad.php");
	include("conexion.php");	
	$products = $conexion->query("select * from producto");
	if(isset($_SESSION["compra"]) && !empty($_SESSION["compra"])):
# Contenido HTML del documento que queremos generar en PDF.
$html='
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">

	<div class="row">
		<div class="col-md-12">
			<h1>Lista de Compras</h1>
		<div class="panel panel-primary">
    	<div class="panel-heading">
    Lista Compra de Productos
    </div>
    	<div class="panel-body">
		<table class="table table-bordered">
		<tr>
		<td class="primary">Cantidad</td>
		<td class="primary">Producto</td>
		<td class="primary">Precio Unitario</td>
		<td class="primary">Total</td>
		</tr>
		';
	foreach($_SESSION["compra"] as $c):
	$products = $conexion->query("select * from producto where id_producto=".$c['id_producto']);
	$r = $products->fetch_object();
	$res=$c["cantidad"]*$r->costo_compra;
	$html.='<tr>
			<td>'.$c["cantidad"].'</td>
			<td>'.$r->nombre.'</td>
			<td><b>Bs. </b>'.$r->costo_compra.'</td>
			<td><b>Bs. </b>'.$res.'</td>
		</tr>';
	endforeach;

	$html.='</table>
			</div>
				<div class="panel-footer" align="right">
					<span class="fa fa-shopping-cart">&nbsp;</span>
					SUPERMARKET LA PAZ 
				</div>
			</div>';
else:
endif;
	$html.='<br><hr>
				</div>
			</div>
		</div>
	</div>';
# Instanciamos un objeto de la clase DOMPDF.
$mipdf = new DOMPDF();

# Definimos el tamaño y orientación del papel que queremos.
# O por defecto cogerá el que está en el fichero de configuración.
$mipdf ->set_paper("A4", "portrait");

# Cargamos el contenido HTML.
$mipdf ->load_html(utf8_decode($html));

# Renderizamos el documento PDF.
$mipdf ->render();

# Enviamos el fichero PDF al navegador.
$mipdf ->stream('VentaProducto.pdf');
?>