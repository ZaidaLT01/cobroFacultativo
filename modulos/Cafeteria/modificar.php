<?php
require_once("../../motor/conexion.php");
	$cod=$_GET['cod'];
	if (isset($_POST['Modificar'])) {

		$var0=$_POST['nombreCatg'];
		$var1=$_POST['empresa'];
		$var2=$_POST['nom'];
		$var3=$_POST['des'];
		$var4=$_POST['cc'];
		$var5=$_POST['cv'];
		$var6=$_POST['stock'];
		$var7=$_POST['fech_v'];
		$var8=$_POST['fech_i'];
		$consultam = "UPDATE producto SET categoriaP_id_categoria=$var0, proveedor_id_proveedor=$var1, nombre='$var2',descripcion='$var1', costo_compra=$var4, costo_venta=$var5, stock=$var6, fech_v='$var7', fech_i='$var8' WHERE id_proveedor='$cod'";
				if($resm){
						?>
				<script>
							alert('Se Modifico');
							location.href='./../../inicio.php?mod=listaCA';
				</script>
				<?php
				}
	}
?>
	<H2><span class="label label-info">MODIFICAR REGISTRO PRODUCTOS</span></H2>
	<TABLE Class="table table-striped table-bordered table-hover">
		<thead class="thead-dark">
			<tr>
				<td>Categoria</td>
				<td>Empresa</td>
				<td>nombre</td>
				<td>Descripcion</td>
				<td>Costo compra</td>
				<td>Costo venta</td>
				<td>stock</td>
				<td>Fecha de vencimiento</td>
				<td>Fecha de ingreso</td>
			</tr>
		</thead>
<?php
		$consulta="select * from producto where id_producto='$cod'";
		$res=mysqli_query($conexion,$consulta);
	while ($fila=mysqli_fetch_array($res)) {
		echo '<tr>';
		echo'
		<form method="POST" action=modificar.php?cod='.$fila['id_producto'].'>
		<tr>
			<td>';
				$consulta="SELECT *FROM categoriaP";
				$r=mysqli_query($conexion,$consulta) or die(mysql_error());
				$menu="<select name='nombreCatg'>\n<option selected>Selecciona:</option>"; 
				while($registro=mysqli_fetch_row($r)) 
				{ 
					$menu.="\n<option value='".$registro[0]."'>".$registro[1]."</option>"; 
				} 
					$menu.="\n</select>"; 
					echo $menu; 
		echo'</td>
			<td>';
				$consulta="SELECT id_proveedor,empresa FROM proveedor";
				$r=mysqli_query($conexion,$consulta) or die(mysql_error());
				$menu="<select name='empresa'>\n<option selected>Selecciona:</option>"; 
				while($registro=mysqli_fetch_row($r)) 
				{ 
					$menu.="\n<option value='".$registro[0]."'>".$registro[1]."</option>"; 
				} 
					$menu.="\n</select>"; 
					echo $menu; 
		echo'</td>
			<td><input type="text" class="form-control" name="nom" id="nom" value="'.$fila['nombre'].'"></td>
			<td><input type="text" class="form-control" name="des" id="des" value="'.$fila['descripcion'].'"></td>
			<td><input type="number" class="form-control" name="cc" id="cc" value="'.$fila['costo_compra'].'"></td>
			<td><input type="number" class="form-control" name="cv" id="cv" value="'.$fila['costo_venta'].'"></td>
			<td><input type="number" class="form-control" name="stock" id="stock" value="'.$fila['stock'].'"></td>
			<td><input type="date" class="form-control" name="fech_v" id="fech_v" value="'.$fila['fecha_v'].'"></td>
			<td><input type="date" class="form-control" name="fech_i" id="fech_i" value="'.$fila['fecha_i'].'"></td>
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
 