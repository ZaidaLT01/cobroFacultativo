<div class="container">
  <br>
  <h2 align="center">PRODUCTOS CAFETERIA</h2>

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

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
      <h3>Lista</h3>
        <div class="row show-grid">
          <div class="col-md-9">
            <form method="post" action="#" class="form-inline" >
                 <input class="form-control mb-2 mr-sm-2" type="text" name="var" placeholder="Por Nombre">
                  <button class="btn btn-danger  mb-2 mr-sm-2" type="submit" id="buscarPCf" name="buscarPCf" ><i class="fa fa-search"></i> Buscar</button>
              </form>
          </div><br>
          <div class="col">
            <div class="form form-inline">
              <form method="post" action="#" class="form-inline" >
                  <button class="btn btn-success mr-sm-2" type="submit" id="mostrarPCf" name="mostrarPCf" >Todo</button>
              </form>
              <form method="post" action="pdf/pdfProdCafe.php" class="form-inline" > 
                  <button class="btn btn-danger mr-sm-2" type="submit" ><i class="fa fa-print"></i> Reporte</button>
              </form>
            </div>
          </div>
        </div> 

            <div class="table-responsive">
              <table border="1" width="80%" align="center" class="l">
                <tr align="center" class="t">
                  <th>Categoria:</th>
                  <th>Nombre:</th>
                  <th>Costo:</th>
                  <th>Precio:</th>
                </tr>

                <?php
                    $consulta="SELECT o.id_cafeteria,o.nombre as producto,o.costo_deter,o.costo_compra,c.nombre as categoria FROM categorias c ,cafeteria_prod o WHERE  o.categorias_id_cat = c.id_cat ";
                    $res=mysqli_query($conexion,$consulta);
                if ($res) {
                  # code...
                    while($reg=mysqli_fetch_array($res)){

                      echo "<tr align='center'>";
                      echo "<td>".$reg['categoria']."</td>";
                      echo "<td>".$reg['producto']."</td>";
                      echo "<td>".$reg['costo_deter']."</td>";
                      echo "<td>".$reg['costo_compra']."</td>";
                      
                      echo '<td><a href="modulos/cafeteria/eliminar.php?cod='.$reg['id_cafeteria'].'"class="btn btn-danger"><span><i class="fa fa-trash"></i></span> </td>';
                      echo '<td><a href="modulos/cafeteria/modificar.php?cod='.$reg['id_cafeteria'].'"class="btn btn-warning">'; 
                      echo '<span><i class="fa fa-edit"></i></span></td>';
                      echo "</tr>";
                    }

                    }
                ?>
              </table>

        </div>
    </div>
    <br>
 <!-- Tab pane2 -->
    <div id="menu1" class="container tab-pane fade">
      <h3>Registro</h3>
        <form name="form" method="post" id="form" action="?mod=guardarPCf" class="form-horizontal">
          <table align="center">
                  <tr>
                    <div class="input-group">
                      <td><label>CATEGORIA: </label></td>
                      <td> <?php 
                          $consulta="SELECT *FROM categorias";
                          $r=mysqli_query($conexion,$consulta) or die(mysql_error());
                          echo "<select name='nombreCatg' class='form-control mb-2 mr-sm-2'> ";
                            while ($registro=mysqli_fetch_array($r)) {
                              echo "<option value='".$registro[0]."'> ".$registro[1]." </option>";
                            }
                          echo "</select>"; 
                        ?></td>
                  </tr>
                  </tr>
                      <td><label class="mr-sm-2" >NOMBRE:</label></td>
                      <td><input type="text" id="nom" name="nom" class="form-control mb-2 mr-sm-2"></td>
                    </div>
                  </tr>
                  </tr>
                      <td><label class="mr-sm-2" >COSTO:</label></td>
                      <td><input type="float" id="costouv" name="costouv" class="form-control mb-2 mr-sm-2"></td>
                    </div>
                  </tr>
                   </tr>
                      <td><label class="mr-sm-2" >PRECIO:</label></td>
                      <td><input  type="float" id="costouc" name="costouc" class="form-control mb-2 mr-sm-2"></td>
                    </div>
                  </tr>
                  <tr>
                    <div class="form-group">
                      <div class="col-sm-12 controls">
                        <td colspan="2" align="center">
                          <input align="center" type="submit"  value="Registrar" class="btn btn-danger">  
                        </td>
                      </div>
                    </div>
                  </tr>                                                       
              </table>
            </form>   
    </div>
    <div id="menu2" class="container tab-pane fade">
      <h3>TENDENCIAS</h3>
    </div>
  </div>
</div>
<br>