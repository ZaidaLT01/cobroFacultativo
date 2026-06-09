

<div class="container">
	<h1 class="font-weight-bold text-uppercase " style="text-decoration: underline; text-decoration-color: midnightblue; color:midnightblue;" align="center">LISTA DE CARGOS</h1>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="table-responsive">
				<table class="table table-hover">
			<thead class="table">
				<tr class="bg-success text-white"><th>CARGO</th><th>ELIMINAR</th><th>MODIFICAR</th></tr>
			</thead>
			<tbody>
				<tr>	
	
	
		</tr>
		<?php
		
		$consulta="select * from cargo ";
		$res=mysqli_query($conexion,$consulta);
		while($reg=mysqli_fetch_array($res)){
			echo "<tr align='center'>";
			echo "<td>".$reg['cargo']."</td>";
			echo '<td><a href="modulos/cargo/eliminar.php?cod='.$reg['id_cargo'].'"class="btn btn-danger"><span><i class="fas fa-trash-alt "></i></span> </td>';
			echo '<td><a href="modulos/cargo/modificar.php?cod='.$reg['id_cargo'].'"class="btn btn-warning">'; 
			echo '<span><i class="fas fa-edit "></i></span></td>';
			echo "</tr>";
		}
		?>
<tr>
<td>
		    <a href="?mod=registrarCA" class=""><span class="badge badge-pill" style="font-size: 1em "><p class="font-weight-light"><i class="fas fa-clipboard-check"></i> NUEVO CARGO</p></span> </a></td></tr>
	</table>
	</div>
</body>
</html>