<html>
<head><link rel=StyleSheet href="../estilos/estilo.css" type="text/css" media=screen></head>
<body>
	<h1><center>LISTADO DE CARGOS</center></h1>
	<div name="contenido">
		
	
	<table border="1" width="80%" align="center">
		<tr align="center">
			<th>Turno</th>
			<th>Ingreso</th>
			<th>Salida</th>
		</tr>
		<?php
		require("../conexion.php");
		
		$consulta="select *from turno ";
		$res=mysqli_query($con,$consulta);
		while($reg=mysqli_fetch_array($res)){
			echo "<tr align='center'>";
			echo "<td>".$reg['turno']."</td>";
			echo "<td>".$reg['ingreso']."</td>";
			echo "<td>".$reg['salida']."</td>";
			echo '<td><a href="eliminarCargo.php?cod='.$reg['id_turno'].'"class="btn btn-danger">e';
			echo "<i class='glyphicon-trash'></i></a></td>";
			echo '<td><a href="modificarCargo.php?cod='.$reg['id_turno'].'"class="btn btn-success">m'; 
			echo "<i class='glyphicon glyphicon-edit'></i></a></td>";
			echo "</tr>";
		}
		?>

	</table>
	</div>
</body>
</html>