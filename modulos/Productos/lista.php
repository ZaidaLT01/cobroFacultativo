<html>
<head><link rel=StyleSheet href="../css/bootstrap.css" type="text/css" media=screen></head>
<body>
	<h1><center>LISTADO DE PRODUCTOS</center></h1>
	<div name="contenido">
	<table border="1" width="80%" align="center">
		<tr align="center">
			<th>Categoria:</th>
			<th>Empresa:</th>
			<th>Nombre:</th>
			<th>Descripcion:</th>
			<th>Costo Venta:</th>
			<th>Costo Compra:</th>
			<th>Stock:</th>
			<th>Fecha de vencimiento:</th>
			<th>Fecha de ingreso:</th>
		</tr>
		<?php
		$consulta="SELECT o.id_producto as id_producto,c.nombre as cat, p.empresa as empresa, o.nombre as nombre, o.descripcion as descripcion, o.costo_venta as cc ,o.costo_compra as cv,o.stock as stock, o.fecha_v as ven, o.fecha_i as ing FROM proveedor p ,producto o ,categoriaP c WHERE o.proveedor_id_proveedor = p.id_proveedor and o.categoriap_id_categoria = c.id_categoria ";
		$res=mysqli_query($conexion,$consulta);
if ($res) {
	# code...

		while($reg=mysqli_fetch_array($res)){

			echo "<tr align='center'>";
			echo "<td>".$reg['cat']."</td>";
			echo "<td>".$reg['empresa']."</td>";
			echo "<td>".$reg['nombre']."</td>";
			echo "<td>".$reg['descripcion']."</td>";
			echo "<td>".$reg['cv']."</td>";
			echo "<td>".$reg['cc']."</td>";
			echo "<td>".$reg['stock']."</td>";
			echo "<td>".$reg['ven']."</td>";
			echo "<td>".$reg['ing']."</td>";
			
			echo '<td><a href="modulos/productos/eliminar.php?cod='.$reg['id_producto'].'"class="btn btn-danger"><span><i class="fas fa-trash-alt "></i></span> </td>';
			echo '<td><a href="modulos/productos/modificar.php?cod='.$reg['id_producto'].'"class="btn btn-warning">'; 
			echo '<span><i class="fas fa-edit "></i></span></td>';
			echo "</tr>";
		}

		}
		?>

	</table>
	</div>
	<div class="col-md-1"></div>
</div>
</body>
</html>