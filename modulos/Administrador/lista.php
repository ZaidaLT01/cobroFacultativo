<html>
<head><link rel=StyleSheet href="../css/bootstrap.css" type="text/css" media=screen></head>
<body>
	<h1><center>LISTADO DE EMPLEADO</center></h1>
	<div name="contenido">
		
	
	<table border="1" width="80%" align="center">
		<tr align="center">
			<th>Tipo:</th>
			<th>Apellido Paterno:</th>
			<th>Apellido Materno:</th>
			<th>Nombres:</th>
			<th>Ci:</th>
			<th>Genero:</th>
			<th>Movil de Trabajo</th>
			<th>Movil de Personal</th>
		</tr>
		<?php
		require("../conexion.php");
		$consulta="SELECT * FROM administrador"
		$res=mysqli_query($con,$consulta);
		while($reg=mysqli_fetch_array($res)){
			echo "<tr align='center'>";
			echo "<td>".$reg['tipo']."</td>";
			echo "<td>".$reg['ap_paterno']."</td>";
			echo "<td>".$reg['ap_materno']."</td>";
			echo "<td>".$reg['nombres']."</td>";
			echo "<td>".$reg['ci']."</td>";
			echo "<td>".$reg['genero']."</td>";
			echo "<td>".$reg['movil_trabajo']."</td>";
			echo "<td>".$reg['movil_personal']."</td>";
			echo '<td><a href="eliminarEmpleado.php?cod='.$reg['id_administrador'].'"class="btn btn-danger">';
			echo "<i class='glyphicon-trash'></i></a></td>";
			echo '<td><a href="modificarEmpleado.php?cod='.$reg['id_administrador'].'"class="btn btn-success">'; 
			echo "<i class='glyphicon glyphicon-edit'></i ></a></td>";
			echo "</tr>";
		}
		?>

	</table>
	</div>
	<div class="col-md-1"></div>
</div>
</body>
</html>