
<div class="container">
	<h1 class="font-weight-bold text-uppercase " style="text-decoration: underline; text-decoration-color: midnightblue; color:midnightblue;" align="center"><center>LISTADO DE PROVEEDOR</center></h1>
	<div name="contenido">
		
	
	<table border="1" width="80%" align="center">
		<tr align="center">


			<th>Empresa:</th>
			<th>Contacto:</th>
			<th>Email:</th>
			<th>Telefono:</th>
			<th>Direccion:</th>
			<th>Logo imagen:</th>
		</tr>
		<?php

		
		$consulta="select *from proveedor ";
		$res=mysqli_query($conexion,$consulta);
		while($reg=mysqli_fetch_array($res)){
			echo "<tr align='center'>";
			echo "<td>".$reg['empresa']."</td>";
			echo "<td>".$reg['contacto']."</td>";
			echo "<td>".$reg['mail']."</td>";
			echo "<td>".$reg['telefono']."</td>";
			echo "<td>".$reg['direccion']."</td>";
			echo "<td><img width='100' src='modulos/proveedor/img/".$reg['logo']."''</td>";
			
			echo '<td><a href="eliminarproveedor.php?cod='.$reg['id_proveedor'].'"class="btn btn-danger">';
			echo "<i class='glyphicon-trash'></i></a></td>";
	echo '<td><a href="modulos/proveedor/eliminar.php?cod='.$reg['id_proveedor'].'"class="btn btn-danger"><span><i class="fas fa-trash-alt "></i></span> </td>';
			echo '<td><a href="modulos/proveedor/modificar.php?cod='.$reg['id_proveedor'].'"class="btn btn-warning">'; 
			echo '<span><i class="fas fa-edit "></i></span></td>';
			echo "</tr>";
		}
		?>



 	</table><a href="?mod=registrarP" class=""><span class="badge badge-pill" style="font-size: 1em "><p class="font-weight-light"><i class="fas fa-clipboard-check"></i> NUEVO PROVEEDOR</p></span> </a></td></tr>

	</div>
	<div class="col-md-1"></div>
</div>
</body>
</html>