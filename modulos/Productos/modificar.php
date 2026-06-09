<?php
require_once("../../motor/conexion.php");
	$cod=$_GET['cod'];
	if (isset($_POST['Modificar'])) {

		$var0=$_POST['categoria'];
		$var1=$_POST['empresa'];
		$var2=$_POST['nom'];
		$var3=$_POST['des'];
		$var4=$_POST['cc'];
		$var5=$_POST['cv'];
		$var6=$_POST['st'];
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
 

<!-- Modificar (Este deberia estar en productos pero no funciona) -->
<div class="modal fade" id="editModalProducto" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Editar Empleado</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <form action="modulos/Productos/modificar.php" method="POST">
              <input type="hidden" id="edit_id" name="cod">
              <div class="form-group">
                <label class="mr-sm-2">Categoria:</label>
                  <select id="edit_categoria" name="categoria" class="form-control mb-2 mr-sm-2">
                      <?php 
                      $consulta = "SELECT id_categoria, categoria FROM categoria";
                      $r = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

                      while ($registro = mysqli_fetch_array($r)) {
                          echo "<option value='".$registro['id_categoria']."'>".$registro['categoria']."</option>";
                      }
                      ?>
                  </select>
              </div>
              <div class="form-group">
                <label class="mr-sm-2">Empresa:</label>
                <select id="edit_empresa" name="empresa" class="form-control mb-2 mr-sm-2">
                      <?php 
                      $consulta = "SELECT id_proveedor, empresa FROM proveedor";
                      $r = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

                      while ($registro = mysqli_fetch_array($r)) {
                          echo "<option value='".$registro['id_proveedor']."'>".$registro['empresa']."</option>";
                      }
                      ?>
                </select>
              </div>
              <div class="form-group">
                  <label>Nombre:</label>
                  <input type="text" class="form-control" id="edit_nombre" name="nom">
              </div>
              <div class="form-group">
                  <label>Descripcion:</label>
                  <input type="text" class="form-control" id="edit_des" name="des">
              </div>
              <div class="form-group">
                  <label>Costo Venta:</label>
                  <input type="float" class="form-control" id="edit_cv" name="cv">
              </div>
              <div class="form-group">
                  <label>Costo Compra:</label>
                  <input type="float" class="form-control" id="edit_cc" name="cc">
              </div>
              <div class="form-group">
                  <label>Stock:</label>
                  <input type="number" class="form-control" id="edit_stock" name="st">
              </div>
              
              <div class="form-group">
                <label class="mr-sm-2">Fecha de Vencimiento:</label>
                <input type="date" id="edit_ven" name="fech_v" class="form-control mb-2 mr-sm-2">
              </div>
              <div class="form-group">
                <label class="mr-sm-2">Fecha de Ingreso:</label>
                <input type="date" id="edit_ing" name="fech_i" class="form-control mb-2 mr-sm-2">
              </div>
              <button type="submit" class="btn btn-primary" name="Modificar">Guardar Cambios</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Termina Modal -->

    <!-- Script para llenar el modal con datos del empleado seleccionado -->
    <script>
        function fillModal(id,cat,empresa, nombre, descripcion,cc,cv, stock, ven,ing  ) {
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_cat').value = cat;
            document.getElementById('edit_empresa').value = empresa;
            document.getElementById('edit_nombre').value = nombre;
            document.getElementById('edit_des').value = descripcion;
            document.getElementById('edit_cc').value = cc;
            document.getElementById('edit_cv').value = cv;
            document.getElementById('edit_stock').value = stock ;
            document.getElementById('edit_ven').value = ven ;
            document.getElementById('edit_ing').value = ing;
            
        }
    </script>