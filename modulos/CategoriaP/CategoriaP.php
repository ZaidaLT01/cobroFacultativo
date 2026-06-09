<div class="container">
  <br>
  <h2 align="center">CATEGORIAS EN PRODUCTOS DE SNACK</h2>

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
    <!-- LISTA -->
    <div id="home" class="container tab-pane active"><br>
      <h3>Lista</h3>
      <div class="table-responsive">
        <table border="1" align="center" class="l">
          <tr align="center" class="t">
            <th>Categoria</th>
            <th>Eliminar</th>
            <th>Modificar</th>
          </tr>
          <?php
            $consulta="select * from categoriaP ";
            $res=mysqli_query($conexion,$consulta);
            while($reg=mysqli_fetch_array($res)){
              echo "<tr align='center'>";
              echo "<td>".$reg['nombre']."</td>";
              echo '<td><a href="modulos/CategoriaP/eliminar.php?cod='.$reg['id_categoria'].'"class="btn btn-danger"><span><i class="fa fa-trash "></i></span> </td>';
              echo "<td>
                <button class='btn btn-warning' data-toggle='modal' data-target='#editModalCatP' 
                onclick='fillModal(
                {$reg['id_categoria']},
                \"{$reg['nombre']}\"
                )'>
                <i class='fa fa-edit'></i></button></td>";
              echo "</tr>";
            }
            ?>
        </table>
      </div>
    </div>
    <!-- Modificar -->
    <div class="modal fade" id="editModalCatP" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Editar Categoria Producto Snack</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="modulos/CategoriaP/modificar.php" method="POST">
              <input type="hidden" id="edit_id" name="cod">
              <div class="form-group">
                  <label>Nombre:</label>
                  <input type="text" class="form-control" id="edit_nombre" name="carT">
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
        function fillModal(id, nombre) {
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_nombre').value = nombre;
        }
    </script>
    <br>
    <br>
    <!--REGISTRO-->
    <div id="menu1" class="container tab-pane fade">
      <h3>Registro</h3>
      <form name="form" method="post" id="form" action="?mod=guardarCat" class="form-horizontal">
        <table align="center">
          <tr>
            <div class="input-group">
              <td><label>CATEGORIA: </label></td>
              <td><input type="text" class="form-control" id="nombre" name="nombre" required="true" value="" placeholder="Ingrese Nueva Categoria" autofocus="" required=""><br></td>          
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