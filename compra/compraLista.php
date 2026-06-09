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
			<h1>Lista de Compras</h1>
			<a href="productoCompra.php" class="btn btn-default">Productos</a>
			<br><br>
<?php
/*
* Esta es la consula para obtener todos los productos de la base de datos.
*/
$products = $conexion->query("select * from producto");
if(isset($_SESSION["compra"]) && !empty($_SESSION["compra"])):
?>
<table class="table table-bordered">
<thead>
	<th>Cantidad</th>
	<th>Producto</th>
	<th>Precio Unitario</th>
	<th>Total</th>
	<th>Eliminar</th>
</thead>
<?php 
/*
* Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
*/
foreach($_SESSION["compra"] as $c):
$products = $conexion->query("select * from producto where id_producto=$c[id_producto]");
$r = $products->fetch_object();
	?>
<tr>
<th><?php echo $c["cantidad"];?></th>
	<td><?php echo $r->nombre;?></td>
	<td><b>Bs. </b><?php echo $r->costo_venta; ?></td>
	<?php $res=$c["cantidad"]*$r->costo_venta //porsi?>
	<td><b>Bs. </b><?php echo $res; ?></td>
	<td style="width:260px;">
	<?php
	$found = false;
	foreach ($_SESSION["compra"] as $c) { if($c["id_producto"]==$r->id_producto){ $found=true; break; }}
	?>
		<a href="../modelo/eliminarcompra.php?id_producto=<?php echo $c["id_producto"];?>" class="btn btn-danger">Borrar</a>
	</td>
</tr>
<?php endforeach; ?>
</table>

<form class="form-horizontal" method="post" action="../modelo/proceso.php">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">id ciente</label>
    <div class="col-sm-5">
      <input type="text" name="empleado" required class="form-control" id="empleado" placeholder="id empleado "> <!--revisar-->
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Procesar Venta</button>
    </div>
  </div>
</form>


<?php else:?>
	<p class="alert alert-warning">El carrito esta vacio.</p>
<?php endif;?>
<br><br><hr>
<p></p>

		</div>
	</div>
</div>
</body>
</html>