<?php 
include ("cabecera.php");
require("../controlador/conexion_bd.php");
?>

<html>
<head></head>
<body class="body1">
	<div class="col-lg-10">
        <div class="panel panel-default">
            <div class="panel-heading">VENTA</div>
			<div class="container-fluid" align="center">
	    		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-15" align="center">
					<h4><center>LISTA VENTA</center></h4>
					<hr>
					<table class = "table table-striped table-bordered table-hover" align="center">
						<tr class="info" align="center">
							<th>ID</th>
							<th>EMPLEADO</th>
							<th>CLIENTE</th>
							<th>FECHA</th>
							<th>MODIFICAR</th>
							<th>ELIMINAR</th>
						</tr>
		<?php
		//require("../modelo/conexion.php");
		$consulta="select * from compra";
		$res=mysqli_query($conexion,$consulta);
		$filas=mysqli_num_rows($res);
			if($filas!=0){  
				while($reg=mysqli_fetch_array($res)){
					$id_compra=$reg['id_compra'];
					$id_empleado=$reg['id_empleado'];
					$id_cliente=$reg['id_cliente'];
					$ap_materno=$reg['ap_materno'];
					$fecha=$reg['fecha'];
		
					$consulta1="select * from empleado where id_empleado=".$reg['id_empleado'];
							$resultado1=mysqli_query($conexion,$consulta1);
							$dato1=mysqli_fetch_array($resultado1);
					$consulta2="select * from cliente where id_cliente=".$reg2['id_cliente'];
							$resultado2=mysqli_query($conexion,$consulta2);
							$dato2=mysqli_fetch_array($resultado2);

					echo "
					<tr align=center>
						<td>$id_compra</td>";
					echo "<td>".$dato1['ap_paterno']."</td>";
					echo "<td>".$dato2['razon_social']."</td>";
					echo "<td>$ap_paterno</td>
						<td>$fecha</td>";
						echo "<td><a href='../modelo/modificarVenta.php?id_venta=".$id_venta."' ><img src=img/modificar.png height=20 align=center></a></td>";
						echo "<td><a href='../modelo/borrarVenta.php?id_venta=".$id_venta."' ><img src=img/delete1.png height=20></a></td></tr>";
				}
			}

		?>

<tfoot>
			<tr>
				<td colspan="13" align="center">
				<a href="formVenta.php" class="boton boton1"><img src="img/agregar.jpg" height="25"><input class = "btn btn-success" type="submit" value="AGREGAR"></a>
				</td>
			</tr>
</tfoot>
					</table><hr>
				</div>
			</div>
		</div>
	</div>
</body>
</html>