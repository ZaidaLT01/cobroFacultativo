<html>
<head>
	<script type="text/javascript" src="js.boostrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="cold-md-4">	
			</div>
			<div class="cold-md-4">	


				<h1>REGISTRO PRODUCTO</h1>
				<form id="formulario" name="formulario" method="post" action="?mod=guardarPd" enctype="multipart/form-data">
					<label>Categoria:</label>
					<?php 
						$consulta="SELECT *FROM categoriaP";
						$r=mysqli_query($conexion,$consulta) or die(mysql_error());
						$menu="<select name='nombreCatg'>\n<option selected>Selecciona:</option>"; 
						while($registro=mysqli_fetch_row($r)) 
						{ 
						$menu.="\n<option value='".$registro[0]."'>".$registro[1]."</option>"; 
						} 
						$menu.="\n</select>"; 
						echo $menu; 
					?>
						<label>Proveedor:</label>
					<?php 
						$consulta="SELECT id_proveedor,empresa FROM proveedor";
						$r=mysqli_query($conexion,$consulta) or die(mysql_error());
						$menu="<select name='empresa'>\n<option selected>Selecciona:</option>"; 
						while($registro=mysqli_fetch_row($r)) 
						{ 
						$menu.="\n<option value='".$registro[0]."'>".$registro[1]."</option>"; 
						} 
						$menu.="\n</select>"; 
						echo $menu; 
					?>
						
					<br><br>
					<label>Nombre:</label>
					<input type="text" id="nom" name="nom" class="form-control">
					<br><br>
					<label>Descripcion:</label>
					<input type="text" id="des" name="des" class="form-control">
					<br><br>
					<label>Costo Venta:</label>
					<input type="float" id="costouv" name="costouv" class="form-control">
					<br><br>
					<label>Costo Compra:</label>
					<input type="float" id="costouc" name="costouc" class="form-control">
					<br><br>
					<label>Stock:</label>
					<input type="number" id="stock" name="stock" class="form-control">
					<br><br>
					<label>Fecha_vencimiento:</label>
					<input type="date" id="fech_v" name="fech_v" class="form-control">
					<br><br>
					<label>Fecha_ingreso:</label>
					<input type="date" id="fech_i" name="fech_i" class="form-control">
					<br><br>
					<input type="submit" name="registrarproducto" id="registrarproducto" value="Registrar Producto">

				</form>

			</div>
			<div class="cold-md-4">
				
			</div>

		</div>		
	</div>
</body>
</html>