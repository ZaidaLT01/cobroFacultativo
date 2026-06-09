

<div class="container">
	<h1 class="font-weight-bold text-uppercase " style="text-decoration: underline; text-decoration-color: midnightblue; color:midnightblue;" align="center">LISTA DE CATEGORIAS DE PRODUCTOS</h1>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="table-responsive">
				<table class="table table-hover">
			<thead class="table">
				<tr class="bg-success text-white"><th>Categoria</th><th>ELIMINAR</th><th>MODIFICAR</th></tr>
			</thead>
			<tbody>
				<tr>	
	
	
		</tr>
		<?php
		
		$consulta="select * from categoriaP ";
		$res=mysqli_query($conexion,$consulta);
		while($reg=mysqli_fetch_array($res)){
			echo "<tr align='center'>";
			echo "<td>".$reg['nombre']."</td>";
			echo '<td><a href="modulos/categoriaP/eliminar.php?cod='.$reg['id_categoria'].'"class="btn btn-danger"><span><i class="fas fa-trash-alt "></i></span> </td>';
			echo '<td><a href="modulos/categoriaP/modificar.php?cod='.$reg['id_categoria'].'"class="btn btn-warning">'; 
			echo '<span><i class="fas fa-edit "></i></span></td>';
			echo "</tr>";
		}
		?>
<tr>
<td>
		    <a href="?mod=registrarCAT" class=""><span class="badge badge-pill" style="font-size: 1em "><p class="font-weight-light"><i class="fas fa-clipboard-check"></i> NUEVA CATEGORIA</p></span> </a></td></tr>
	</table>
	</div>
</body>
</html>