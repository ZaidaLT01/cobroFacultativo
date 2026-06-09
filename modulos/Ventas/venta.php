<?php
$usuario=$_SESSION["usuario"];
$pasword=$_SESSION["pasword"];                                                   
$nivel=$_SESSION["tipo_usuario_id_tipo"];
$nom=$_SESSION["nombres"];
?>
<div class="container">
  <br>
  <h2 align="center">VENTA DE PRODUCTOS SNACK</h2>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" style="color: black" data-toggle="tab" href="#home">Venta</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" style="color: black" data-toggle="tab" href="#menu1">Lista de Ventas</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" style="color: black" data-toggle="tab" href="#menu2">Tendencias</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
		<h1>Venta</h1>
		<div class="row show-grid">
          	<div class="form-inline">
	            <form method="post" action="#" class="form-inline col-3" >
	            	<div class="input-group">
	                 <input class="form-control mb-2 " type="text" name="var" placeholder="Empresa">
	                 <div class="input-group-append">
	                  <button class="btn btn-danger  mb-2 " type="submit" id="buscarEpr" name="buscarEpr" ><i class="fa fa-search"></i></button>
	                 </div>
	                </div>
	             </form>
	             <form method="post" action="#" class="form-inline col-3" >
	                 <div class="input-group">
	                 <input class="form-control mb-2 " type="text" name="var" placeholder="Categoria">
	                 <div class="input-group-append">
	                  <button class="btn btn-danger  mb-2 " type="submit" id="buscarcat" name="buscarcat" ><i class="fa fa-search"></i></button>
	                 </div>
	                </div>
	             </form>
	             <form method="post" action="#" class="form-inline col-3" >
	                 <div class="input-group">
	                 <input class="form-control mb-2 " type="text" name="var" placeholder="Producto">
	                 <div class="input-group-append">
	                  <button class="btn btn-danger  mb-2" type="submit" id="buscarpro" name="buscarpro" ><i class="fa fa-search"></i></button>
	                 </div>
	                </div>
	             </form>
        	</div>
          <div class="col">
            <div class="form form-inline">
              <form method="post" action="#" class="form-inline" >
                  <button class="btn btn-success mr-sm-2" type="submit" id="mostrarE" name="mostrarE" ><i class="fa fa-eye"></i>Todo</button>
              </form>
            </div>
          </div>
        </div>  
          
     


            <h3>Realizar Venta de Productos de Cafetería</h3>
            <form method="POST" action="?mod=procv" id="formVenta">
                
            <!-- Usuario que realiza la compra -->
            <label>Realizado por:</label>
            <input type="text" value="<?php echo $nombre; ?>" disabled>
            <input type="hidden" name="usuario" value="<?php echo $usuario; ?>">
            <input type="hidden" name="nivel" value="<?php echo $nivel; ?>">
        
            <h4>Seleccionar Productos</h4>
            <table border="1" align="center" class="table l" border="1">
                <tr>
                    <th>Producto</th>
                    <th>Costo</th>
                    <th>Cantidad</th>
                </tr>
                <?php
                $query = "SELECT id_cafeteria, nombre, costo_deter FROM cafeteria_prod";
                $result = mysqli_query($conexion, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['nombre']}</td>
                            <td>{$row['costo_deter']}</td>
                            <td><input type='number' name='productos[{$row['id_cafeteria']}]' min='0' value='0'></td>
                          </tr>";
                }
                ?>
            </table>
        
            <button type="submit"  class="btn btn-danger btn-block" >Realizar Venta</button>
        </form>
            </div>
	<!-- Tab pane2 -->
    <div id="menu1" class="container tab-pane fade">
      <h3>Lista de Venta</h3>
		<div class="row show-grid">
          <div class="form-inline">
                <form method="post" action="#" class="form-inline col-3" >
	            	<div class="input-group">
	                 <input class="form-control mb-2 " type="text" name="var" placeholder="Empresa">
	                 <div class="input-group-append">
	                  <button class="btn btn-danger  mb-2 " type="submit" id="buscarEpr" name="buscarEpr" ><i class="fa fa-search"></i></button>
	                 </div>
	                </div>
	             </form>
	             <form method="post" action="#" class="form-inline col-3" >
	                 <div class="input-group">
	                 <input class="form-control mb-2 " type="text" name="var" placeholder="Categoria">
	                 <div class="input-group-append">
	                  <button class="btn btn-danger  mb-2 " type="submit" id="buscarcat" name="buscarcat" ><i class="fa fa-search"></i></button>
	                 </div>
	                </div>
	             </form>
	             <form method="post" action="#" class="form-inline col-3" >
	                 <div class="input-group">
	                 <input class="form-control mb-2 " type="text" name="var" placeholder="Producto">
	                 <div class="input-group-append">
	                  <button class="btn btn-danger  mb-2" type="submit" id="buscarpro" name="buscarpro" ><i class="fa fa-search"></i></button>
	                 </div>
	                </div>
	             </form>
          </div><br>
          <div class="col">
            <div class="form form-inline">
              <form method="post" action="#" class="form-inline" >
                  <button class="btn btn-success mr-sm-2" type="submit" id="mostrarE" name="mostrarE" ><i class="fa fa-eye"></i></button>
              </form>
              <form method="post" action="pdf/pdfVenta.php" class="form-inline" > 
                  <button class="btn btn-danger mr-sm-2" type="submit" ><i class="fa fa-print"></i></button>
              </form>
            </div>
          </div>
        </div>
        
        <?php
		//Esta es la consula para obtener todos los productos de la base de datos.
			$products = $conexion->query("select * from producto");
			if(isset($_SESSION["venta"]) && !empty($_SESSION["venta"])):
		?>
			<table border="1" align="center" class="table l">
			<tr align="center" class="t">
				<th>Empresa</th>
				<th>Categoria</th>
				<th>Producto</th>
				<th>Cantidad</th>
				<th>Precio Unitario</th>
				<th>Total</th>
				<th>Eliminar</th>
			</tr>
		<?php 
			//Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
			foreach($_SESSION["venta"] as $c):
			$products = $conexion->query("SELECT o.id_producto as id_producto,c.nombre as cat, p.empresa as empresa, o.nombre as nombre,o.costo_venta as costo_venta FROM proveedor p ,producto o ,categoriaP c WHERE id_producto=$c[id_producto] and o.proveedor_id_proveedor = p.id_proveedor and o.categoriap_id_categoria = c.id_categoria");
			$r = $products->fetch_object();
		?>
			<tr>
				<td><?php echo $r->nombre;?></td>
				<td><?php echo $r->empresa;?></td>
				<td><?php echo $r->cat;?></td>
				<td><?php echo $c["cantidad"];?></td>
				<td><b>Bs. </b><?php echo $r->costo_venta; ?></td>
				<?php $res=$c["cantidad"]*$r->costo_venta?>
				<td><b>Bs. </b><?php echo $res; ?></td>
				
		<?php
			$found = false;
			foreach ($_SESSION["venta"] as $c){
				if($c["id_producto"]==$r->id_producto){
					$found=true; break;
				}
			}
		?>
				<td><a href="modulos/Ventas/eliminarVenta.php?id_producto=<?php echo $c["id_producto"];?>" class="btn btn-danger"><i class="fa fa-trash-o"></i> Borrar</a></td>
			</tr>
		<?php endforeach; ?>
			</table>

			<?php else:?>
			<p class="alert alert-warning">Seleccione un producto para la venta...</p>
		<?php endif;?>
	
		<form class="form-horizontal" method="post" action="?mod=guardarVen">
			<label class="mr-sm-2">Cliente:</label>
            <?php 
            $consulta="SELECT id_cliente,usuario FROM cliente";
            $r=mysqli_query($conexion,$consulta) or die(mysql_error());
            echo "<select name='cliente' class='form-control mb-2 mr-sm-2'>"; 
            while($registro=mysqli_fetch_row($r)) 
            { 
            echo "<option value='".$registro[0]."'>".$registro[1]."</option>"; 
            } 
            echo "</select>"; 
            ?>
			<button type="submit" class="btn btn-danger btn-block">Procesar Ventas</button>
		</form>
		<br>
    </div>
    <!-- Tab pane3 -->
    <div id="menu2" class="container tab-pane fade">
      <h3>Mas</h3>
  	</div>