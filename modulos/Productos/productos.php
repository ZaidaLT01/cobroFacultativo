<div class="container">
  <br>
  <h2 align="center">PRODUCTOS</h2>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" style="color: black" data-toggle="tab" href="#home">Lista</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" style="color: black" data-toggle="tab" href="#menu1">Registrar Nuevo</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" style="color: black" data-toggle="tab" href="#menu2">Tendencias</a>
    </li>
  </ul>

  
  <div class="tab-content">
    <!-- LISTA-->
    <div id="home" class="container tab-pane active"><br>
      <h3>Lista</h3>
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
        <br>
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

      <div class="table-responsive">
        <table border="1" width="100%" align="center" class="l">
          <tr align="center" class="t">
            <th>Categoria:</th>
            <th>Empresa:</th>
            <th>Nombre:</th>
            <th>Descripcion:</th>
            <th>Costo Venta:</th>
            <th>Costo Compra:</th>
            <th>Stock:</th>
            <th>Fecha de vencimiento:</th>
            <th>Fecha de ingreso:</th>
            <th>Eliminar:</th>
            <th>Modificar:</th>
          </tr>
          <?php
              $consulta="SELECT o.id_producto as id_producto,c.nombre as cat, p.empresa as empresa, o.nombre as nombre, o.descripcion as descripcion, o.costo_venta as cc ,o.costo_compra as cv,o.stock as stock, o.fecha_v as ven, o.fecha_i as ing FROM proveedor p ,producto o ,categoriaP c WHERE o.proveedor_id_proveedor = p.id_proveedor and o.categoriap_id_categoria = c.id_categoria ";
              $res=mysqli_query($conexion,$consulta);
          if ($res) {
            # code...
              while($reg=mysqli_fetch_array($res)){

                echo "<tr align='center'>";
                echo "<td>".$reg['cat']."</td>";
                echo "<td>".$reg['empresa']."</td>";
                echo "<td>".$reg['nombre']."</td>";
                echo "<td>".$reg['descripcion']."</td>";
                echo "<td>".$reg['cv']."</td>";
                echo "<td>".$reg['cc']."</td>";
                echo "<td>".$reg['stock']."</td>";
                echo "<td>".$reg['ven']."</td>";
                echo "<td>".$reg['ing']."</td>";
                
                echo '<td><a href="modulos/productos/eliminar.php?cod='.$reg['id_producto'].'"class="btn btn-danger"><span><i class="fa fa-trash"></i></span> </td>';
                echo "<td>
                <button class='btn btn-warning' data-toggle='modal' data-target='#editModalProducto' 
                onclick='fillModal(
                {$reg['id_producto']},
                \"{$reg['cat']}\", 
                \"{$reg['empresa']}\", 
                \"{$reg['nombre']}\", 
                \"{$reg['descripcion']}\",
                \"{$reg['cv']}\",
                \"{$reg['cc']}\",
                \"{$reg['stock']}\",
                \"{$reg['ven']}\",
                \"{$reg['ing']}\"
                )'>
                <i class='fa fa-edit'></i></button></td>";
                echo "</tr>";
              }

              }
          ?>
        </table>
      </div>



    </div>
    <br>
    
    <!-- REGISTRO -->
    <div id="menu1" class="container tab-pane fade">
      <h3>Registro</h3>
        <form name="form" method="post" id="form" action="?mod=guardarProd" class="form-horizontal">
                <div class="form-inline">
                  <div class="col-lg-8">
                    <div class="form-inline">
                      <label class="mr-sm-2">Categoria:</label>
                        <?php 
                          $consulta="SELECT *FROM categoriaP";
                          $r=mysqli_query($conexion,$consulta) or die(mysql_error());
                          echo "<select name='nombreCatg' class='form-control mb-2 mr-sm-2'> ";
                            while ($registro=mysqli_fetch_array($r)) {
                              echo "<option value='".$registro[0]."'> ".$registro[1]." </option>";
                            }
                          echo "</select>"; 
                        ?>
                      <label class="mr-sm-2">Proveedor:</label>
                        <?php 
                          $consulta="SELECT id_proveedor,empresa FROM proveedor";
                          $r=mysqli_query($conexion,$consulta) or die(mysql_error());
                          echo "<select name='empresa' class='form-control mb-2 mr-sm-2'> ";
                            while ($registro=mysqli_fetch_array($r)) {
                              echo "<option value='".$registro[0]."'> ".$registro[1]." </option>";
                            }
                          echo "</select>";  
                        ?>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-inline">
                      <label class="mr-sm-2" >Nombre:</label>
                      <input type="text" id="nom" name="nom" class="form-control mb-2 mr-sm-2">
                    </div>
                  </div>
              </div>
              <br>
              <div class="form-inline">
                <div class="col-lg-4">
                  <div class="form-inline">
                    <label class="mr-sm-2" >Costo Venta:</label>
                    <input type="float" id="costouv" name="costouv" class="form-control mb-2 mr-sm-2">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-inline">
                    <label class="mr-sm-2" >Costo Compra:</label>
                    <input  type="float" id="costouc" name="costouc" class="form-control mb-2 mr-sm-2">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-inline">
                    <label class="mr-sm-2" >Stock (cantidad):</label>
                    <input type="number" id="stock" name="stock" class="form-control mb-2 mr-sm-2">
                  </div>
                </div>    
              </div> 
              <br>
              <div class="form-inline">
                <div class="col-lg-4">
                  <div class="form-inline">
                    <label class="mr-sm-2" >Fecha Vencimiento:</label>
                    <input type="date" id="fech_v" name="fech_v" class="form-control mb-2 mr-sm-2">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-inline">
                    <label class="mr-sm-2" >Fecha de Ingreso:</label>
                    <input type="date" id="fech_i" name="fech_i" class="form-control mb-2 mr-sm-2">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-inline">
                    <label class="mr-sm-2" >Descripcion:</label>
                    <input type="text" id="des" name="des" class="form-control mb-2 mr-sm-2">
                  </div>
                </div>    
              </div> 
              <div class="container">
                 <input align="center" type="submit"  name="registrarproducto" id="registrarproducto" value="Registrar Producto" class="btn btn-danger btn-block">
                <br><br>
              </div>
            </form>   
    </div>
    <div id="menu2" class="container tab-pane fade">
      <h3>TENDENCIAS</h3>
    </div>
  </div>
</div>
<br>