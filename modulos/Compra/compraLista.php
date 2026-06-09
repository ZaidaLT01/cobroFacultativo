	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-md-12">
			<h1>Lista de Compras</h1>
				<a href="pdfListaCompra.php" class="btn btn-danger"><i class="fa fa-coffee"></i> Reporte</a>
			<br><br>
<?php
//Esta es la consula para obtener todos los productos de la base de datos.
	$products = $conexion->query("select * from producto");
	if(isset($_SESSION["compra"]) && !empty($_SESSION["compra"])):
?>
<div class="panel panel-primary">
    <div class="panel-heading">
    Lista Compra de Productos
    </div>
    <div class="panel-body">
	<table class="table table-bordered">
	<thead>
		<th class="primary">Cantidad</th>
		<th class="primary">Producto</th>
		<th class="primary"> Precio Unitario</th>
		<th class="primary">Total</th>
		<th class="primary">Eliminar</th>
	</thead>
<?php 
	//Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
	foreach($_SESSION["compra"] as $c):
	$products = $conexion->query("select * from producto where id_producto=$c[id_producto]");
	$r = $products->fetch_object();
?>
		<tr>
		<th><?php echo $c["cantidad"];?></th>
			<td><?php echo $r->nombre;?></td>
			<td><b>Bs. </b><?php echo $r->costo_compra; ?></td>
			<?php $res=$c["cantidad"]*$r->costo_compra //porsi?>
			<td><b>Bs. </b><?php echo $res; ?></td>
			<td style="width:260px;">
<?php
	$found = false;
	foreach ($_SESSION["compra"] as $c) { if($c["id_producto"]==$r->id_producto){ $found=true; break; }}
?>
<a href="eliminarcompra.php?id_producto=<?php echo $c["id_producto"];?>" class="btn btn-danger"><i class="fa fa-trash-o"></i> Borrar</a>
			</td>
		</tr>
<?php endforeach; ?>
	</table>
</div>
	<div class="panel-footer" align="right">
		<span class="fa fa-shopping-cart">&nbsp;</span>
			SUPERMARKET LA PAZ 
	</div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        Datos de la Compra
    </div>
    <div class="panel-body">
		<form class="form-horizontal" method="post" action="proceso.php">
		<div class="col-sm-5 col-lg-10 col-md-5">
			<div class="col-lg-4" >
			    <label for="inputEmail3" class="control-label">Empleado</label>
<?php
	include("conexion.php");
	$consulta1="select * from empleado order by ap_paterno";
	$resultado1=mysqli_query($conexion,$consulta1);	
	echo "<select id='empleado' name='empleado' class='form-control'> ";
	while ($registro1=mysqli_fetch_array($resultado1)) {
	echo "<option value='".$registro1['id_empleado']."'> ".$registro1['ap_paterno']." </option>";
}
	echo "</select>";
?>
	</div>
	<div class="col-lg-4">
		<label for="inputEmail3" class="control-label">Cliente</label>
<?php
	include("conexion.php");
	$consulta2="select * from cliente order by razon_social";
	$resultado2=mysqli_query($conexion,$consulta2);	
	echo "<select id='cliente' name='cliente' class='form-control'> ";
	while ($registro2=mysqli_fetch_array($resultado2)) {
	echo "<option value='".$registro2['id_cliente']."'> ".$registro2['razon_social']." </option>";
	}
	echo "</select>";
?>
	</div>
</div>
<br><br><br><br>
	<div class="col-sm-5 col-lg-10 col-md-5">
		<div class="col-sm-offset-3 col-sm-10">
		 	<button type="submit" class="btn btn-primary">Procesar Venta</button>
		</div>
	</div>
</form>
</div>
<div class="panel-footer" align="right">
	<span class="fa fa-shopping-cart">&nbsp;</span>
	SUPERMARKET LA PAZ 
	</div>
</div>
<?php else:?>
	<p class="alert alert-warning">Seleccione un producto para la compra...</p>
<?php endif;?>
<br><br><hr>
		</div>
	</div>
</div>
</div>
