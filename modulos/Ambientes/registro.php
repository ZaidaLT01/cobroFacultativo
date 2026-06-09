<div class="container " align="center">    
	<div class="card bg-warning">
		  <form name="form" method="post" id="form" action="?mod=guardarE" class="form-horizontal">
					<label>Turno:</label>
						<?php 
						$consulta="SELECT id_turno,turno FROM turno";
						$r=mysqli_query($conexion,$consulta) or die(mysql_error());
						$menu="<select name='turno'>\n<option selected>Selecciona:</option>"; 
						while($registro=mysqli_fetch_row($r)) 
						{ 
						$menu.="\n<option value='".$registro[0]."'>".$registro[1]."</option>"; 
						} 
						$menu.="\n</select>"; 
						echo $menu; 
						?>
					<br>
					<label>Cargo:</label>
						<?php 
						$consulta="SELECT id_cargo,cargo FROM cargo";
						$r=mysqli_query($conexion,$consulta) or die(mysql_error());
						$menu="<select name='cargo'>\n<option selected>Selecciona:</option>"; 
						while($registro=mysqli_fetch_row($r)) 
						{ 
						$menu.="\n<option value='".$registro[0]."'>".$registro[1]."</option>"; 
						} 
						$menu.="\n</select>"; 
						echo $menu; 
						?>
					<br>
					<label>Ap. Paterno:</label>
					<input type="text" id="apPat" name="apPat" class="form-control">
					<br>
					<label>Ap. Materno:</label>
					<input type="text" id="apMat" name="apMat" class="form-control">
					<br><br>
					<label>Nombres:</label>
					<input type="text" id="nombre" name="nombre" class="form-control">
					<br><br>
					<label>Ci:</label>
					<input type="number" id="ci" name="ci" class="form-control">
					<br><br>
					<label>Direccion:</label>
					<input type="text" id="dir" name="dir" class="form-control">
					<br><br>
					<label>Telefono:</label>
					<input type="number" id="tel" name="tel" class="form-control">
					<br><br>
					<label>Fecha de Nacimiento:</label>
					<input type="date" id="fech_n" name="fech_n" class="form-control">
					<br><br>
					<label>Genero:</label>
					<td>Maculino <input type="radio" name="genero" id="masculino" value="F" class="input1">
					 Femenino <input type="radio" name="genero" id="femenino" value="M" class="input1"></td>
					 <br><br>
					<label>Fecha de Ingreso:</label>
					<input type="date" id="fech_n" name="fech_n" class="form-control">
					<br><br>
					<label>Sueldo:</label>
					<input type="number" id="sue" name="sue" class="form-control">
					<br><br>
					<label>Interes:</label>
					<table>
						<tr>
							<td><input type="checkbox" id="interese[]" name="interes[]" value="Estudia" class="form-control">Estudia</td>
							<td><input type="checkbox" id="interese[]" name="interes[]" value="Deportes" class="form-control">Deportes</td>
							<td><input type="checkbox" id="interese[]" name="interes[]" value="Trabaja" class="form-control">Trabaja</td>
						</tr>
					</table>
					<br>
					<label>Observacion:</label>
					<input type="text" id="obs" name="obs" class="form-control">
					<br><br>
					<input type="submit" name="registrarempleado" id="registrarempleado" value="Registrar empleado">
				</form>
			</div>
		</div>		
	</div>
</body>
</html>