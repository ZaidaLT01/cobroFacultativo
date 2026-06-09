<div class="container">
  <br>
  <h2 align="center">ADQUISICION DE PRODUCTOS</h2>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" style="color: black" data-toggle="tab" href="#home">Compra</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" style="color: black" data-toggle="tab" href="#menu1">Lista de Compra</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" style="color: black" data-toggle="tab" href="#menu2">Tendencias</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
		<h1>Compra</h1>
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

		<?php
		$consulta="SELECT o.id_producto as id_producto,c.nombre as cat, p.empresa as empresa, o.nombre as nombre,o.costo_compra as cc FROM proveedor p ,producto o ,categoriaP c WHERE o.proveedor_id_proveedor = p.id_proveedor and o.categoriap_id_categoria = c.id_categoria";
		$res=mysqli_query($conexion,$consulta);
		// precio:lo que la empresa coloca costo:lo que los proveedores nos dan 
		?>
		<table border="1" align="center" class="table l">
		<tr align="center" class="t">
			<th>Empresa</th>
			<th>Categoria</th>
			<th width="35%">Producto</th>
			<th>Costo</th>
			<th>Cantidad</th>
			<th>Operacion</th>
		</tr>
		<?php 
		 	while($reg=mysqli_fetch_array($res)){
		        echo "<tr align='center'>";
		        echo "<td>".$reg['empresa']."</td>";
		        echo "<td>".$reg['cat']."</td>";
		        echo "<td>".$reg['nombre']."</td>";
		        echo "<td><b>Bs.</b>".$reg['cc']."</td>";
		        echo "<td colspan='2'>";
				$found = false;
				if(isset($_SESSION["compra"])){
					foreach ($_SESSION["compra"] as $c){ 
						if($c["id_producto"]==$reg['id_producto']){ 
							$found=true;
							break;
						}
					}
				}
				if($found){
				?>
					<a data-toggle="tab" href="#menu1" class="btn btn-info nav-link"><i class="fa fa-thumbs-o-up"></i> Listo</a>
				<?php
				}else{ 
				?>
				<form method="post" action="?mod=guardarSC">
					<!-- envia el id de la compra-->
					<input type="hidden" name="id_producto" value="<?php echo $reg['id_producto']; ?>">
				    <div class="form-inline">
				    	<input type="number" name="cantidad" value="1" min="1" class="form-control" >
				    <button type="submit" class="btn btn-warning"><i class="fa fa-shopping-cart"></i> Comprar</button>
				    </div>
				</form>	
				<?php } ?>
				</td>
				</tr>
				<?php } ?>
		</table>
		<br>
	</div>
	<!-- Tab pane2 -->
    <div id="menu1" class="container tab-pane fade">
      <h3>Lista de Compras</h3>
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
              <form method="post" action="pdf/pdfCompra.php" class="form-inline" > 
                  <button class="btn btn-danger mr-sm-2" type="submit" ><i class="fa fa-print"></i></button>
              </form>
            </div>
          </div>
        </div>
        
        <?php
		//Esta es la consula para obtener todos los productos de la base de datos.
			$products = $conexion->query("select * from producto");
			if(isset($_SESSION["compra"]) && !empty($_SESSION["compra"])):
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
			foreach($_SESSION["compra"] as $c):
			$products = $conexion->query("SELECT o.id_producto as id_producto,c.nombre as cat, p.empresa as empresa, o.nombre as nombre,o.costo_compra as costo_compra FROM proveedor p ,producto o ,categoriaP c WHERE id_producto=$c[id_producto] and o.proveedor_id_proveedor = p.id_proveedor and o.categoriap_id_categoria = c.id_categoria");
			$r = $products->fetch_object();
		?>
			<tr>
				<td><?php echo $r->nombre;?></td>
				<td><?php echo $r->empresa;?></td>
				<td><?php echo $r->cat;?></td>
				<td><?php echo $c["cantidad"];?></td>
				<td><b>Bs. </b><?php echo $r->costo_compra; ?></td>
				<?php $res=$c["cantidad"]*$r->costo_compra?>
				<td><b>Bs. </b><?php echo $res; ?></td>
				
		<?php
			$found = false;
			foreach ($_SESSION["compra"] as $c){
				if($c["id_producto"]==$r->id_producto){
					$found=true; break;
				}
			}
		?>
				<td><a href="modulos/Compra/eliminarCompra.php?id_producto=<?php echo $c["id_producto"];?>" class="btn btn-danger"><i class="fa fa-trash-o"></i> Borrar</a></td>
			</tr>
		<?php endforeach; ?>
			</table>

			<?php else:?>
			<p class="alert alert-warning">Seleccione un producto para la compra...</p>
		<?php endif;?>
	
		<form class="form-horizontal" method="post" action="?mod=guardarCom">
			<button type="submit" class="btn btn-danger btn-block">Procesar Compra</button>
		</form>
		<br>
    </div>
    <!-- Tab pane3 -->
    <div id="menu2" class="container tab-pane fade">
      <h3>Mas</h3>
  	</div>