<div class="container">
  <br>
  <h2 align="center">PROVEEDORES</h2>

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
      <div class="row show-grid">
        <div class="col-md-9">
          <form method="post" action="#" class="form-inline" >
                <input class="form-control mb-2 mr-sm-2" type="text" name="var" placeholder="Por Nombre">
                <button class="btn btn-danger  mb-2 mr-sm-2" type="submit" id="buscarProv" name="buscarProv" ><i class="fa fa-search"></i> Buscar</button>
            </form>
        </div><br>
        <div class="col">
          <div class="form form-inline">
            <form method="post" action="#" class="form-inline" >
                <button class="btn btn-success mr-sm-2" type="submit" id="mostrarE" name="mostrarE" >Todo</button>
            </form>
            <form method="post" action="pdf/pdfProveedores.php" class="form-inline" > 
                <button class="btn btn-danger mr-sm-2" type="submit" ><i class="fa fa-print"></i> Reporte</button>
            </form>
          </div>
        </div>
      </div> 

      <div class="table-responsive">
        <table border="1" align="center" class="table l">
          <tr align="center" class="t">
            <th>Empresa:</th>
            <th>Contacto:</th>
            <th>Email:</th>
            <th>Telefono:</th>
            <th>Direccion:</th>
            <th>Logo imagen:</th>
            <th>Eliminar:</th>
            <th>Modificar:</th>
          </tr>
          <?php
            if (isset($_POST['buscarProv'])) {
              $var=$_POST["var"];
              $consulta="select *from proveedor WHERE empresa like '%$var%' order by empresa asc";
              $res=mysqli_query($conexion,$consulta);
              while($reg=mysqli_fetch_array($res)){
                echo "<tr align='center'>";
                echo "<td>".$reg['empresa']."</td>";
                echo "<td>".$reg['contacto']."</td>";
                echo "<td>".$reg['mail']."</td>";
                echo "<td>".$reg['telefono']."</td>";
                echo "<td>".$reg['direccion']."</td>";
                echo "<td><img width='100' src='modulos/proveedor/img/".$reg['logo']."''</td>";

                echo '<td><a href="modulos/proveedor/eliminar.php?cod='.$reg['id_proveedor'].'"class="btn btn-danger"><span><i class="fa fa-trash"></i></span> </td>';
                echo "<td>
                <button class='btn btn-warning' data-toggle='modal' data-target='#editModalProv' 
                onclick='fillModal(
                {$reg['id_proveedor']},
                \"{$reg['empresa']}\", 
                \"{$reg['contacto']}\", 
                \"{$reg['mail']}\", 
                \"{$reg['telefono']}\",
                \"{$reg['direccion']}\", 
                \"{$reg['logo']}\"
                )'>
                <i class='fa fa-edit'></i></button></td>";
                echo "</tr>";
              }
            }else{ 
              if(isset($_POST['mostrarE'])){ 
                $consulta="select *from proveedor ";
                $res=mysqli_query($conexion,$consulta);
                while($reg=mysqli_fetch_array($res)){
                  echo "<tr align='center'>";
                  echo "<td>".$reg['empresa']."</td>";
                  echo "<td>".$reg['contacto']."</td>";
                  echo "<td>".$reg['mail']."</td>";
                  echo "<td>".$reg['telefono']."</td>";
                  echo "<td>".$reg['direccion']."</td>";
                  echo "<td><img width='100' src='modulos/proveedor/img/".$reg['logo']."''</td>";
                  echo '<td><a href="modulos/proveedor/eliminar.php?cod='.$reg['id_proveedor'].'"class="btn btn-danger"><span><i class="fa fa-trash"></i></span> </td>';
                  echo "<td>
                  <button class='btn btn-warning' data-toggle='modal' data-target='#editModalProv' 
                  onclick='fillModal(
                  {$reg['id_proveedor']},
                  \"{$reg['empresa']}\", 
                  \"{$reg['contacto']}\", 
                  \"{$reg['mail']}\", 
                  \"{$reg['telefono']}\",
                  \"{$reg['direccion']}\", 
                  \"{$reg['logo']}\"
                  )'>
                  <i class='fa fa-edit'></i></button></td>";
                  echo "</tr>";
                }
              }else{
                $consulta="select *from proveedor ";
                $res=mysqli_query($conexion,$consulta);
                while($reg=mysqli_fetch_array($res)){
                  echo "<tr align='center'>";
                  echo "<td>".$reg['empresa']."</td>";
                  echo "<td>".$reg['contacto']."</td>";
                  echo "<td>".$reg['mail']."</td>";
                  echo "<td>".$reg['telefono']."</td>";
                  echo "<td>".$reg['direccion']."</td>";
                  echo "<td><img width='100' src='modulos/proveedor/img/".$reg['logo']."''</td>";
                  echo '<td><a href="modulos/proveedor/eliminar.php?cod='.$reg['id_proveedor'].'"class="btn btn-danger"><span><i class="fa fa-trash"></i></span> </td>';
                  echo "<td>
                  <button class='btn btn-warning' data-toggle='modal' data-target='#editModalProv' 
                  onclick='fillModal(
                  {$reg['id_proveedor']},
                  \"{$reg['empresa']}\", 
                  \"{$reg['contacto']}\", 
                  \"{$reg['mail']}\", 
                  \"{$reg['telefono']}\",
                  \"{$reg['direccion']}\", 
                  \"{$reg['logo']}\"
                  )'>
                  <i class='fa fa-edit'></i></button></td>";
                  echo "</tr>";
                }
              }
            }
          ?>
        </table>
      </div>
    </div>
    <!-- Modificar -->
    <div class="modal fade" id="editModalProv" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editModalLabel">Editar Proveedor</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <div class="modal-body">
            <form action="modulos/Proveedor/modificar.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" id="edit_id" name="cod">
              <div class="form-group">
                  <label>Empresa:</label>
                  <input type="text" class="form-control" id="edit_emp" name="emp">
              </div>
              <div class="form-group">
                  <label>Contacto:</label>
                  <input type="text" class="form-control" id="edit_contac" name="con">
              </div>
              <div class="form-group">
                  <label>Correo:</label>
                  <input type="text" class="form-control" id="edit_mail" name="mai">
              </div>
              <div class="form-group">
                  <label>Telefono</label>
                  <input type="number" class="form-control" id="edit_tel" name="tel">
              </div>
              <div class="form-group">
                  <label>Direccion</label>
                  <input type="text" class="form-control" id="edit_dir" name="dir">
              </div>
              <div class="form-group">
              <label>Logo Actual:</label><br>
              <img id="edit_img_preview" src="" width="100">
          </div>
          <div class="form-group">
              <label>Cambiar Logo (opcional):</label>
              <input type="file" class="form-control" id="edit_log" name="log" onchange="previewImage(event)">
          </div>
          <input type="hidden" id="current_logo" name="current_logo">
              <button type="submit" class="btn btn-primary" name="Modificar">Guardar Cambios</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Termina Modal -->

    <!-- Script para llenar el modal con datos del empleado seleccionado -->
    <script>
        function fillModal(id, empresa, contacto, mail, telefono, direccion, logo) {
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_emp').value = empresa;
            document.getElementById('edit_contac').value = contacto;
            document.getElementById('edit_mail').value = mail;
            document.getElementById('edit_tel').value = telefono;   
            document.getElementById('edit_dir').value = direccion;   
            // Mostrar imagen actual
            document.getElementById('edit_img_preview').src = 'modulos/proveedor/img/' + logo;
            document.getElementById('current_logo').value = logo; // Guardar el logo actual         
        }
        function previewImage(event) {
        var output = document.getElementById('edit_img_preview');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src);
        }
    }
    </script>


    
    <br>
    <!--REGISTRO -->
    <div id="menu1" class="container tab-pane fade">
      <h3>Registro</h3>
        <form name="form" method="post" id="form" action="?mod=guardarPrv" class="form-horizontal" enctype="multipart/form-data">
          <div class="form-inline">
            <div class="col-lg-6">
              <div class="form-inline">
                <label class="mr-sm-2" >Empresa:</label>
                <input type="text" id="empresa" name="empresa" class="form-control mb-2 mr-sm-2">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-inline">
                <label class="mr-sm-2" >Contacto:</label>
                <input type="text" id="contacto" name="contacto" class="form-control mb-2 mr-sm-2">
              </div>
            </div>  
          </div>       
          <br>
          <div class="form-inline">
            <div class="col-lg-6">
              <div class="form-inline">
                <label class="mr-sm-2" >Telefono:</label>
                <input type="number" id="telefono" name="telefono" class="form-control mb-2 mr-sm-2">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-inline">
                <label class="mr-sm-2" >Email:</label>
                <input type="email" id="mail" name="mail" class="form-control mb-2 mr-sm-2">
              </div>
            </div> 
          </div>       
          <br>
          <div class="form-inline">
            <div class="col-lg-6">
              <div class="form-inline">
                <label class="mr-sm-2" >Direccion:</label>
                <input type="text" id="direccion" name="direccion" class="form-control mb-2 mr-sm-2">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-inline">
                <label class="mr-sm-2" >Logo:</label>
                <input  type="file" id="imagen" name="imagen" value="Examinar" class="form-control mb-2 mr-sm-2">
              </div>
            </div>  
          </div>       
          <br>
          <div class="container">
             <input align="center" type="submit" name="registrarproveedor" id="registrarproveedor" value="Registrar Proveedor" class="btn btn-danger btn-block">
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