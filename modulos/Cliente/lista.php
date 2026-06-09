<html>
<head><link rel=StyleSheet href="../estilos/estilo.css" type="text/css" media=screen></head>
<body>
	<h1><center>LISTADO DE CLIENTES</center></h1>
	<div name="contenido">
		
	
	<table border="1" width="80%" align="center">
		<tr align="center">
			<th>Usario/Nombre</th>
			<th>Nit/Ci</th>
			<th>Razon Social</th>
			<th>Telefono</th>
			<th>Puntos</th>
			<th>Estado</th>
		</tr>
		<?php

		
		$consulta="select *from cliente ";
		$res=mysqli_query($conexion,$consulta);
		while($reg=mysqli_fetch_array($res)){
			echo "<tr align='center'>";
			echo "<td>".$reg['usuario']."</td>";
			echo "<td>".$reg['nit_ci']."</td>";
			echo "<td>".$reg['rz']."</td>";
			echo "<td>".$reg['telefono']."</td>";
			echo "<td>".$reg['sumapuntos']."</td>";
			echo "<td>".$reg['estado']."</td>";
			echo '<td><a href="modulos/cliente/eliminar.php?cod='.$reg['id_cliente'].'"class="btn btn-danger"><span><i class="fas fa-trash-alt "></i></span> </td>';
			echo '<td><a href="modulos/cliente/modificar.php?cod='.$reg['id_cliente'].'"class="btn btn-warning">'; 
			echo '<span><i class="fas fa-edit "></i></span></td>';
			echo "</tr>";
		}
		?>

	</table>
	</div>
</body>
</html>