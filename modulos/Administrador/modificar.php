<?php
	
	require("../conexion.php");
	$cod=$_GET['cod'];
	if (isset($_POST['Modificar'])) {
		$var0=$_POST['tipo'];
		$var1=$_POST['ap_p'];
		$var2=$_POST['ap_m'];
		$var3=$_POST['nom'];
		$var4=$_POST['ci'];
		$var5=$_POST['g'];
		$var6=$_POST['mt'];
		$var7=$_POST['mp'];
		$consultam = "UPDATE administrador SET tipo='$var0',ap_paterno='$var1',ap_materno='$var2',nombres='$var3',ci='$var4',genero='$var5',movil_trabajo='$var6',movil_personal='$var7' WHERE id_administrador='$cod'";
		$resm=mysqli_query($con,$consultam);
		if($resm){
			echo "
			<script>
			window.alert('registro modificado con exito');
			window.location='listadoAdministrador.php';
			</script>
			";
		}
	}
?>
	<H2><span class="label label-info">MODIFICAR REGISTRO ADMINISTRADOR</span></H2>
	<TABLE Class="table table-striped table-bordered table-hover">
		<thead class="thead-dark">
			<tr>
			<th>Tipo:</th>
			<th>Apellido Paterno:</th>
			<th>Apellido Materno:</th>
			<th>Nombres:</th>
			<th>Ci:</th>
			<th>Genero:</th>
			<th>Movil de Trabajo</th>
			<th>Movil de Personal</th>
			</tr>
		</thead>
<?php
		$consulta="select * from administrador where id_administrador='$cod'";
		$res=mysqli_query($con,$consulta);
	while ($fila=mysqli_fetch_array($res)) {
		echo '<tr>';
		echo'
		<form method="POST" action=modificarAdministrados.php?cod='.$fila['id_administrador'].'>
		<tr>
			<td><select name="tipo">
						<option>General</option>
						<option>Seccion</option>
				</select>
			</td>
			<td><input type="text" class="form-control" name="ap_p" id="ap_p" value="'.$fila['ap_paterno'].'"></td>
			<td><input type="text" class="form-control" name="ap_m" id="ap_m" value="'.$fila['ap_materno'].'"></td>
			<td><input type="text" class="form-control" name="nom" id="nom" value="'.$fila['nombres'].'"></td>
			<td><input type="number" class="form-control" name="ci" id="ci" value="'.$fila['ci'].'"></td>
			<td><input type="text" class="form-control" name="g" id="g" value="'.$fila['genero'].'"></td>
			<td><input type="number" class="form-control" name="mt" id="mt" value="'.$fila['movil_trabajo'].'"></td>
			<td><input type="number" class="form-control" name="mp" id="mp" value="'.$fila['movil_personal'].'"></td>
		</tr>
		<tr>
			<td><br></td>
		</tr>
		
		<td colspan="3"><div align="center"><input type="submit" name="Modificar" id="Modificar" value="Modificar" class="btn btn-primary"></div></td>
		</form>
		</tr>';
	}
?>
</table>
 