<?php 
	include("seguridad.php");
	if ($_SESSION['nivel']==1) 
		include("cabeza01.php");
	if ($_SESSION['nivel']==2) 
		include("cabeza02.php");
	if ($_SESSION['nivel']==3) 
		include("cabeza03.php");
	include("conexion.php");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-md-12">
			<h1>Productos</h1>
			<a href="compraLista.php" class="btn btn-warning"><i class="fa fa-shopping-cart"></i> Ver Compras</a>
			<br><br>
<?php
/*
* Esta es la consula para obtener todos los productos de la base de datos.
*/
$products = $conexion->query("select * from producto");
?>
<div class="panel panel-primary">
     <div class="panel-heading">
    Lista Compra de Productos
                </div>
                <div class="panel-body">
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
			<a href="compraLista.php" class="btn btn-info"><i class="fa fa-thumbs-o-up"></i> Listo</a>
		<?php else:?>
		<form class="form-inline" method="post" action="adcompra.php">
		<input type="hidden" name="id_producto" value="<?php echo $r->id_producto; ?>">
		  <div class="form-group">
		    <input type="number" name="cantidad" value="1" style="width:100px;" min="1" class="form-control" placeholder="Cantidad">
		  </div>
		  <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Comprar</button>
		</form>	
		<?php endif; ?>
	</td>
</tr>
<?php endwhile; ?>
</table>
</div>
			    <div class="panel-footer" align="right">
			    	<span class="fa fa-shopping-cart">&nbsp;</span>
			         SUPERMARKET LA PAZ 
			    </div>
			</div>
<br><br><hr>
		</div>
	</div>
</div>
</div>
</body>
</html> f