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

				<h1>REGISTRO ADMINISTRADOR</h1>
				<form id="formulario" name="formulario" method="post" action="grabarProveedor.php" enctype="multipart/form-data">
					<label>Tipo:</label>
					<select name="tipo">
						<option>General</option>
						<option>Seccion</option>
					</select>
					<br><br>
					<label>Ap. Paterno:</label>
					<input type="text" id="apPat" name="apPat" class="form-control">
					<br><br>
					<label>Ap. Materno:</label>
					<input type="text" id="apMat" name="apMat" class="form-control">
					<br><br>
					<label>Nombres:</label>
					<input type="text" id="nombre" name="nombre" class="form-control">
					<br><br>
					<label>Ci:</label>
					<input type="number" id="ci" name="ci" class="form-control">
					<br><br>
					<label>Genero:</label>
					<td>Maculino <input type="radio" name="genero" id="masculino" value="F" class="input1">
					 Femenino <input type="radio" name="genero" id="femenino" value="M" class="input1"></td>
					 <br><br>
					<label>Movil de Trabajo:</label>
					<input type="number" id="tra" name="tra" class="form-control">
					<br><br>
					<label>Movil Personal:</label>
					<input type="number" id="per" name="per" class="form-control">
					<br><br>
					<input type="submit" name="registrarempleado" id="registrarempleado" value="Registrar empleado">

				</form>

			</div>
			<div class="cold-md-4">
				
			</div>

		</div>		
	</div>
</body>
</html>