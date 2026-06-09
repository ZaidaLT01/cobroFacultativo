<div class="container">
  <br>
  <h2 align="center">CARGOS</h2>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" style="color: black" data-toggle="tab" href="#home">Lista</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" style="color: black" data-toggle="tab" href="#menu1">Registrar Nuevo</a>
    </li>
  </ul>
  
  <div class="tab-content">
    <!-- LISTA-->
    <div id="home" class="container tab-pane active"><br>
      <h3>Lista</h3>
      <div class="row">
        <div class="col">
          <div class="table-responsive">
            <table border="1" width="50%" align="center" class="l">
              <tr align="center" class="t">
                <th>Cargo/Seccion</th>
                <th>Eliminar</th>
                <th>Modificar</th>
              </tr>
              <?php  
              $consulta="select * from cargo ";
              $res=mysqli_query($conexion,$consulta);
              while($reg=mysqli_fetch_array($res)){
                echo "<tr align='center'>";
                echo "<td>".$reg['cargo']."</td>";
                echo '<td><a href="modulos/Cargo/eliminar.php?cod='.$reg['id_cargo'].'"class="btn btn-danger"><span><i class="fa fa-trash "></i></span> </td>';
                echo "<td>
                <button class='btn btn-warning' data-toggle='modal' data-target='#editModalCargo' 
                onclick='fillModal(
                {$reg['id_cargo']},
                \"{$reg['cargo']}\"
                )'>
                <i class='fa fa-edit'></i></button></td>";
                echo "</tr>";
              }
              ?>
            </table>
          </div>
        </div>
      </div>

    </div>
    <br>
    <!-- Modificar -->
    <div class="modal fade" id="editModalCargo" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Editar Cargo/Seccion</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <form action="modulos/Cargo/modificar.php" method="POST">
              <input type="hidden" id="edit_id" name="cod">
              <div class="form-group">
                  <label>Cargo:</label>
                  <input type="text" class="form-control" id="edit_cargo" name="carg">
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
        function fillModal(id, cargo, seccion) {
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_cargo').value = cargo;
        }
    </script>
    <br>
    <!-- Registrar Nuevo-->
    <div id="menu1" class="container tab-pane fade">
      <h3>Registro Nuevo</h3>
        <form name="form" method="post" id="form" action="?mod=guardarCa" class="form-horizontal">  <div class="form" align="center">
            <div class="col-lg-4">
              <div class="form-inline">
                <label class="mr-sm-2" >Nombre de la seccion:</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="cargo" name="cargo" required="true" placeholder="Ingrese la seccion">
              </div>
              <div class="container">
                <input align="center" type="submit" class="btn btn-danger btn-block" value="Registrar">
              </div>
            </div>
          </div>
        </form>
    </div>
  </div>
</div>
<br>