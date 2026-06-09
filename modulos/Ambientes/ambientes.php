<div class="container">
  <br>
  <h2 align="center">Ambientes</h2>

  <!-- Sub menu-->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" style="color: black" data-toggle="tab" href="#lista">Lista</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" style="color: black" data-toggle="tab" href="#menu1">Registrar Nuevo</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" style="color: black" data-toggle="tab" href="#menu2">Mas</a>
    </li>
  </ul>
 
  <div class="tab-content">

    <!-- LISTA -->
    <div id="lista" class="container tab-pane active"><br>
      <h3>Datos </h3>
      <div class="row show-grid">
        <div class="col-md-9">
          <form method="post" action="#" class="form-inline" >
            <input class="form-control mb-2 mr-sm-2" type="text" name="var" placeholder="Por Nombre">
            <button class="btn btn-danger  mb-2 mr-sm-2" type="submit" id="buscar" name="buscar" ><i class="fa fa-search"></i> Buscar</button>
          </form>
        </div>
        <br>
        <div class="col">
          <div class="form form-inline">
            <form method="post" action="#" class="form-inline" >
              <button class="btn btn-success mr-sm-2" type="submit" id="mostrarE" name="mostrar" >Todo</button>
            </form>
            <form method="post" action=".php" class="form-inline" > 
              <button class="btn btn-danger mr-sm-2" type="submit" ><i class="fa fa-print"></i> Reporte</button>
            </form>
          </div>
        </div>
      </div>       

      <div class="table-responsive">
        <table border="1" align="center" class="table l">
          <tr align="center" class="t">
            <th>Nombre:</th>
            <th>Altura:</th>
            <th>Ancho:</th>
            <th>Color:</th>
            <th>estado:</th>
            <th>Descripcion:</th>
            <th colspan="4">Operaciones</th>
          </tr>
          <?php
          $consulta="select * from ambientes";
          $res=mysqli_query($conexion,$consulta);
          while($reg=mysqli_fetch_array($res)){
            echo "<tr align='center'>";
            echo "<td>".$reg['nombre']."</td>";
            echo "<td>".$reg['m_alto']."</td>";
            echo "<td>".$reg['m_ancho']."</td>";
            echo "<td>".$reg['color']."</td>";
            echo "<td>".$reg['estado']."</td>";
            echo "<td>".$reg['descripcion']."</td>";
            echo '<td><a href="modulos/Ambientes/eliminar.php?cod='.$reg['id_ambientes'].'"class="btn btn-danger"><span><i class="fa fa-trash "></i></span> </td>';
            echo "<td>
              <button class='btn btn-warning' data-toggle='modal' data-target='#editModalAmb' 
             >
              <i class='fa fa-edit'></i></button></td>";
            echo "</tr>";
          }
          ?>
        </table>
      </div>

    </div>
    

    <!-- REGISTRO -->
    <div id="menu1" class="container tab-pane fade">
      <h3>Registro</h3>
      <form name="form" method="post" id="form" action="?mod=guardarAmb" class="form-horizontal"> 
        
        <div class="form-inline">
          <div class="col-lg-4">
            <div class="form-inline">
              <label class="mr-sm-2" >Nombre:</label>
              <input type="text" id="nom" name="nom" class="form-control mb-2 mr-sm-2">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-inline">
              <label class="mr-sm-2" >m_alto:</label>
              <input type="number" id="alto" name="alto" class="form-control mb-2 mr-sm-2">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-inline">
              <label class="mr-sm-2" >m_ancho:</label>
              <input type="number" id="ancho" name="ancho" class="form-control mb-2 mr-sm-2">
            </div>
          </div>    
        </div>       
        <br>
        <div class="form-inline">
          <div class="col-lg-4">
            <div class="form-inline">
              <label class="mr-sm-2">color:</label>
              <input type="text" id="color" name="color" class="form-control mb-2 mr-sm-2">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-inline">  
              <label class="mr-sm-2">Estado:</label>
              <input type="text" id="estado" name="estado" class="form-control mb-2 mr-sm-2">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-inline">
              <label class="mr-sm-2">Descripcion:</label>
              <input type="text" id="desc" name="desc" class="form-control mb-2 mr-sm-2">
            </div>
          </div>
        </div>
        <br>
        <div class="container">
          <input align="center" type="submit" name="registrarambiente" id="registrarambiente" value="Registrar Ambiente" class="btn btn-danger btn-block">
          <br><br>
        </div>
      </form>
    </div>
    <!-- MAS-->
    
      </div>
    </div>

  </div>
  
</div>