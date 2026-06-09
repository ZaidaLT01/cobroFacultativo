<?php
/*
* Este archio muestra los productos en una tabla.
*/
session_start();
include "../controlador/conexion_bd.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Productos</h1>
			<a href="compraLista.php" class="btn btn-warning">Ver Carrito</a>
			<br><br>
<?php
/*
* Esta es la consula para obtener todos los productos de la base de datos.
*/
$products = $conexion->query("select * from producto");
?>
<table class="table table-bordered">
<thead>
	<th>Producto</th>
	<th>Precio</th>
	<th>Cantidad</th>
</thead>
<?php 
/*
* Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
*/
while($r=$products->fetch_object()):?>
<tr>
	<td><?php echo $r->nombre;?></td>
	<td><b>Bs.</b> <?php echo $r->costo_compra; ?></td>
	<td style="width:260px;">
		<?php
		$found = false;
		if(isset($_SESSION["compra"])){ foreach ($_SESSION["compra"] as $c) { if($c["id_producto"]==$r->id_producto){ $found=true; break; }}}
		?>
		<?php if($found):?>
			<a href="compraLista.php" class="btn btn-info">Listo</a>
		<?php else:?>
		<form class="form-inline" method="post" action="../modelo/adcompra.php">
		<input type="hidden" name="id_producto" value="<?php echo $r->id_producto; ?>">
		  <div class="form-group">
		    <input type="number" name="cantidad" value="1" style="width:100px;" min="1" class="form-control" placeholder="Cantidad">
		  </div>
		  <button type="submit" class="btn btn-primary">Comprar</button>
		</form>	
		<?php endif; ?>
	</td>
</tr>
<?php endwhile; ?>
</table>
<br><br><hr>
<p>Powered by <a href="http://evilnapsis.com/" target="_blank">Evilnapsis</a></p>

		</div>
	</div>
</div>
</body>
</html>