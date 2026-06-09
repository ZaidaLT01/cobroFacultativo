<div class="container">
  <br>
  <h2 align="center">EMPLEADOS</h2>

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
      <h3>Datos Personales</h3>
      <div class="row show-grid">
        <div class="col-md-9">
          <form method="post" action="#" class="form-inline" >
            <input class="form-control mb-2 mr-sm-2" type="text" name="var" placeholder="Por Nombre">
            <button class="btn btn-danger  mb-2 mr-sm-2" type="submit" id="buscarE" name="buscarE" ><i class="fa fa-search"></i> Buscar</button>
          </form>
        </div>
        <br>
        <div class="col">
          <div class="form form-inline">
            <form method="post" action="#" class="form-inline" >
              <button class="btn btn-success mr-sm-2" type="submit" id="mostrarE" name="mostrarE" >Todo</button>
            </form>
            <form method="post" action="pdf/pdfEmpleados.php" class="form-inline" > 
              <button class="btn btn-danger mr-sm-2" type="submit" ><i class="fa fa-print"></i> Reporte</button>
            </form>
          </div>
        </div>
      </div>       

      <div class="table-responsive">
        <table border="1" align="center" class="table l">
          <tr align="center" class="t">
            <th>Turno:</th>
            <th>Cargo:</th>
            <th>Apellido Paterno:</th>
            <th>Apellido Materno:</th>
            <th>Nombres:</th>
            <th>ci:</th>
            <th>Direccion:</th>
            <th>Telefono:</th>
            <th>Genero:</th>
            <th>F.Ingreso:</th>
            <th>F.Nacimiento:</th>
            <th>Sueldo:</th>
            <th>Estado:</th>
            <th>Observaciones:</th>
            <th colspan="4">Operaciones</th>
          </tr>
          <?php
          if (isset($_POST['buscarE'])) {
            $var=$_POST["var"];
            $consulta="select  t.turno, c.cargo, e.*from turno t,cargo c ,empleado e WHERE t.id_turno = e.turno_id_turno and c.id_cargo = e.cargo_id_cargo and nombres like '$var' order by usuario asc";
            $res=mysqli_query($conexion,$consulta);
            while($reg=mysqli_fetch_array($res)){
              echo "<tr align='center'>";
              echo "<td>".$reg['turno']."</td>";
              echo "<td>".$reg['cargo']."</td>";
              echo "<td>".$reg['ap_paterno']."</td>";
              echo "<td>".$reg['ap_materno']."</td>";
              echo "<td>".$reg['nombres']."</td>";
              echo "<td>".$reg['ci']."</td>";
              echo "<td>".$reg['direccion']."</td>";
              echo "<td>".$reg['telefono']."</td>";
              echo "<td>".$reg['genero']."</td>";
              echo "<td>".$reg['fecha_ingreso']."</td>";
              echo "<td>".$reg['fecha_nacimiento']."</td>";
              echo "<td>".$reg['sueldo']."</td>";

             // Mostrar el estado actual con un botón de cambio
             $estadoActual = $reg['estado']; // Estado de la base de datos
             $checked = ($estadoActual == "activo") ? "checked" : ""; // Si es "activo", marcar el checkbox
             $colorClass = ($estadoActual == "activo") ? "text-success" : "text-danger"; // Color según estado
             echo "<td class='$colorClass' id='estado_{$reg['id_empleado']}'>" . ucfirst($estadoActual) . "</td>";
             echo "<td>
                     <input type='checkbox' class='toggle-estado' data-id='{$reg['id_empleado']}' data-toggle='toggle' data-on='Activo' data-off='Inactivo' data-onstyle='success' data-offstyle='danger' $checked>
                   </td>";
              
              echo '<td><a href="modulos/Empleado/Observaciones.php?cod='.$reg['id_empleado'].'"class="btn btn-success">
                    <span><i class="fa fa-eye"></i></span></td>';
              
                    echo '<td><a href="modulos/Empleado/eliminar.php?cod='.$reg['id_empleado'].'"class="btn btn-danger"><span><i class="fa fa-trash"></i></span> </td>';
              echo "<td>
                <button class='btn btn-warning' data-toggle='modal' data-target='#editModal' 
                onclick='fillModal(
                {$reg['id_empleado']},
                \"{$reg['nombres']}\", 
                \"{$reg['ap_paterno']}\", 
                \"{$reg['ap_materno']}\", 
                \"{$reg['ci']}\",
                \"{$reg['direccion']}\",
                \"{$reg['telefono']}\",
                \"{$reg['turno']}\",
                \"{$reg['cargo']}\",
                \"{$reg['fecha_ingreso']}\",
                \"{$reg['fecha_nacimiento']}\",
                \"{$reg['sueldo']}\"
                )'>
                <i class='fa fa-edit'></i></button></td>";
              echo "</tr>";
            }
          }else{
            if(isset($_POST['mostrarE'])){ 
              $consulta="SELECT t.turno, c.cargo, e.* FROM turno t,cargo c ,empleado e  WHERE t.id_turno = e.turno_id_turno and c.id_cargo = e.cargo_id_cargo ";
              $res=mysqli_query($conexion,$consulta);
              while($reg=mysqli_fetch_array($res)){
                echo "<tr align='center'>";
                echo "<td>".$reg['turno']."</td>";
                echo "<td>".$reg['cargo']."</td>";
                echo "<td>".$reg['ap_paterno']."</td>";
                echo "<td>".$reg['ap_materno']."</td>";
                echo "<td>".$reg['nombres']."</td>";
                echo "<td>".$reg['ci']."</td>";
                echo "<td>".$reg['direccion']."</td>";
                echo "<td>".$reg['telefono']."</td>";
                echo "<td>".$reg['genero']."</td>";
                echo "<td>".$reg['fecha_ingreso']."</td>";
                echo "<td>".$reg['fecha_nacimiento']."</td>";
                echo "<td>".$reg['sueldo']."</td>";
                
                // Mostrar el estado actual con un botón de cambio
                $estadoActual = $reg['estado']; // Estado de la base de datos
                $checked = ($estadoActual == "activo") ? "checked" : ""; // Si es "activo", marcar el checkbox
                $colorClass = ($estadoActual == "activo") ? "text-success" : "text-danger"; // Color según estado
                echo "<td class='$colorClass' id='estado_{$reg['id_empleado']}'>" . ucfirst($estadoActual) . "</td>";
                echo "<td>
                        <input type='checkbox' class='toggle-estado' data-id='{$reg['id_empleado']}' data-toggle='toggle' data-on='Activo' data-off='Inactivo' data-onstyle='success' data-offstyle='danger' $checked>
                      </td>";
                
                echo '<td><a href="modulos/Empleado/Observaciones.php?cod='.$reg['id_empleado'].'"class="btn btn-success">'; 
                echo ' <span><i class="fa fa-eye"></i></span></td>';
                echo '<td><a href="modulos/Empleado/eliminar.php?cod='.$reg['id_empleado'].'"class="btn btn-danger"><span><i class="fa fa-trash"></i></span> </td>';
                echo "<td>
                  <button class='btn btn-warning' data-toggle='modal' data-target='#editModal' 
                  onclick='fillModal(
                  {$reg['id_empleado']},
                  \"{$reg['nombres']}\", 
                  \"{$reg['ap_paterno']}\", 
                  \"{$reg['ap_materno']}\", 
                  \"{$reg['ci']}\",
                  \"{$reg['direccion']}\",
                  \"{$reg['telefono']}\",
                  \"{$reg['turno']}\",
                  \"{$reg['cargo']}\",
                  \"{$reg['fecha_ingreso']}\",
                  \"{$reg['fecha_nacimiento']}\",
                  \"{$reg['sueldo']}\"
                  )'>
                  <i class='fa fa-edit'></i></button></td>";
                echo "</tr>";
              }
            }else{
              $consulta="SELECT t.turno, c.cargo, e.* FROM turno t,cargo c ,empleado e  WHERE t.id_turno = e.turno_id_turno and c.id_cargo = e.cargo_id_cargo ";
              $res=mysqli_query($conexion,$consulta);
              while($reg=mysqli_fetch_array($res)){
                echo "<tr align='center'>";
                echo "<td>".$reg['turno']."</td>";
                echo "<td>".$reg['cargo']."</td>";
                echo "<td>".$reg['ap_paterno']."</td>";
                echo "<td>".$reg['ap_materno']."</td>";
                echo "<td>".$reg['nombres']."</td>";
                echo "<td>".$reg['ci']."</td>";
                echo "<td>".$reg['direccion']."</td>";
                echo "<td>".$reg['telefono']."</td>";
                echo "<td>".$reg['genero']."</td>";
                echo "<td>".$reg['fecha_ingreso']."</td>";
                echo "<td>".$reg['fecha_nacimiento']."</td>";
                echo "<td>".$reg['sueldo']."</td>";

                 // Mostrar el estado actual con un botón de cambio
                 $estadoActual = $reg['estado']; // Estado de la base de datos
                 $checked = ($estadoActual == "activo") ? "checked" : ""; // Si es "activo", marcar el checkbox
                 $colorClass = ($estadoActual == "activo") ? "text-success" : "text-danger"; // Color según estado
                 echo "<td>
                         <input type='checkbox' class='toggle-estado' data-id='{$reg['id_empleado']}' data-toggle='toggle' data-on='Activo' data-off='Inactivo' data-onstyle='success' data-offstyle='danger' $checked>
                       </td>";

                echo '<td><a href="modulos/Empleado/Observaciones.php?cod='.$reg['id_empleado'].'"class="btn btn-success">'; 
                echo '<span><i class="fa fa-eye"></i></span></td>';
                echo '<td><a href="modulos/Empleado/eliminar.php?cod='.$reg['id_empleado'].'"class="btn btn-danger"><span><i class="fa fa-trash"></i></span> </td>';
                echo "<td>
                  <button class='btn btn-warning' data-toggle='modal' data-target='#editModal' 
                  onclick='fillModal(
                  {$reg['id_empleado']},
                  \"{$reg['nombres']}\", 
                  \"{$reg['ap_paterno']}\", 
                  \"{$reg['ap_materno']}\", 
                  \"{$reg['ci']}\",
                  \"{$reg['direccion']}\",
                  \"{$reg['telefono']}\",
                  \"{$reg['turno']}\",
                  \"{$reg['cargo']}\",
                  \"{$reg['fecha_ingreso']}\",
                  \"{$reg['fecha_nacimiento']}\",
                  \"{$reg['sueldo']}\"
                  )'>
                  <i class='fa fa-edit'></i></button></td>";
                echo "</tr>";
              } 
            }
          }
          
          ?>
        </table>
      </div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
      $(document).ready(function() {
          $(".toggle-estado").change(function() {
              var idEmpleado = $(this).data("id"); // Obtener el ID del empleado
              var nuevoEstado = $(this).prop("checked") ? "activo" : "inactivo"; // Determinar el nuevo estado

              $.ajax({
                  url: "modulos/Empleado/estado.php",
                  type: "POST",
                  data: { id: idEmpleado, estado: nuevoEstado },
                  success: function(response) {
                      $("#estado_" + idEmpleado).text(nuevoEstado.charAt(0).toUpperCase() + nuevoEstado.slice(1)); // Actualizar el texto
                      $("#estado_" + idEmpleado).removeClass("text-success text-danger").addClass(nuevoEstado === "activo" ? "text-success" : "text-danger"); // Cambiar color
                  },
                  error: function() {
                      alert("Error al actualizar el estado.");
                  }
              });
          });
      });
      </script>

    </div>
    <!-- Modificar -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Editar Empleado</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <form action="modulos/Empleado/modificar.php" method="POST">
              <input type="hidden" id="edit_id" name="cod">
              <div class="form-group">
                  <label>Nombres:</label>
                  <input type="text" class="form-control" id="edit_nombres" name="nom">
              </div>
              <div class="form-group">
                  <label>Apellido Paterno:</label>
                  <input type="text" class="form-control" id="edit_ap_paterno" name="ap_p">
              </div>
              <div class="form-group">
                  <label>Apellido Materno:</label>
                  <input type="text" class="form-control" id="edit_ap_materno" name="ap_m">
              </div>
              <div class="form-group">
                  <label>CI:</label>
                  <input type="text" class="form-control" id="edit_ci" name="ci">
              </div>
              <div class="form-group">
                  <label>Dirección:</label>
                  <input type="text" class="form-control" id="edit_direccion" name="dir">
              </div>
              <div class="form-group">
                  <label>Teléfono:</label>
                  <input type="text" class="form-control" id="edit_telefono" name="tel">
              </div>
              <div class="form-group">
                <label class="mr-sm-2">Turno:</label>
                  <select id="edit_tur" name="tur" class="form-control mb-2 mr-sm-2">
                      <?php 
                      $consulta = "SELECT id_turno, turno FROM turno";
                      $r = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

                      while ($registro = mysqli_fetch_array($r)) {
                          echo "<option value='".$registro['id_turno']."'>".$registro['turno']."</option>";
                      }
                      ?>
                  </select>
              </div>
              <div class="form-group">
                <label class="mr-sm-2">Cargo:</label>
                <select id="edit_car" name="car" class="form-control mb-2 mr-sm-2">
                      <?php 
                      $consulta = "SELECT id_cargo, cargo FROM cargo";
                      $r = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

                      while ($registro = mysqli_fetch_array($r)) {
                          echo "<option value='".$registro['id_cargo']."'>".$registro['cargo']."</option>";
                      }
                      ?>
                </select>
              </div>
              <div class="form-group">
                <label class="mr-sm-2">Fecha de Ingreso:</label>
                <input type="date" id="edit_fech_i" name="fech_i" class="form-control mb-2 mr-sm-2">
              </div>
              <div class="form-group">
                <label class="mr-sm-2">Fecha de Nacimiento:</label>
                <input type="date" id="edit_fech_n" name="fech_n" class="form-control mb-2 mr-sm-2">
              </div>
              <div class="form-group">
                <label class="mr-sm-2">Sueldo:</label>
                <input type="text" id="edit_sue" name="sue" class="form-control mb-2 mr-sm-2">
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
        function fillModal(id, nombres, ap_paterno, ap_materno, ci, direccion, telefono, turno, cargo, fecha_ingreso,fecha_nacimiento,sueldo) {
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_nombres').value = nombres;
            document.getElementById('edit_ap_paterno').value = ap_paterno;
            document.getElementById('edit_ap_materno').value = ap_materno;
            document.getElementById('edit_ci').value = ci;
            document.getElementById('edit_direccion').value = direccion;
            document.getElementById('edit_telefono').value = telefono;
            document.getElementById('edit_tur').value = turno ;
            document.getElementById('edit_car').value = cargo ;
            document.getElementById('edit_fech_i').value = fecha_ingreso;
            document.getElementById('edit_fech_n').value = fecha_nacimiento ;
            document.getElementById('edit_sue').value = sueldo ;
            
        }
    </script>

    <!-- REGISTRO -->
    <div id="menu1" class="container tab-pane fade">
      <h3>Registro</h3>
      <form name="form" method="post" id="form" action="?mod=guardarE" class="form-horizontal"> 
        <div class="form-inline">
          <label class="mr-sm-2">Turno:</label>
            <?php 
            $consulta="SELECT id_turno,turno FROM turno";
            $r=mysqli_query($conexion,$consulta) or die(mysql_error()); 
            echo "<select name='turno' class='form-control mb-2 mr-sm-2'> ";
            while ($registro=mysqli_fetch_array($r)) {
            echo "<option value='".$registro[0]."'> ".$registro[1]." </option>";
            }
            echo "</select>"; 
            ?>
          <label class="mr-sm-2">Cargo:</label>
            <?php 
            $consulta="SELECT id_cargo,cargo FROM cargo";
            $r=mysqli_query($conexion,$consulta) or die(mysql_error());
            echo "<select name='cargo' class='form-control mb-2 mr-sm-2'>"; 
            while($registro=mysqli_fetch_row($r)) 
            { 
            echo "<option value='".$registro[0]."'>".$registro[1]."</option>"; 
            } 
            echo "</select>"; 
            ?>
        </div>
        <br>
        <div class="form-inline">
          <div class="col-lg-4">
            <div class="form-inline">
              <label class="mr-sm-2" >Ap. Paterno:</label>
              <input type="text" id="apPat" name="apPat" class="form-control mb-2 mr-sm-2">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-inline">
              <label class="mr-sm-2" >Ap. Materno:</label>
              <input type="text" id="apMat" name="apMat" class="form-control mb-2 mr-sm-2">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-inline">
              <label class="mr-sm-2" >Nombres:</label>
              <input type="text" id="nombre" name="nombre" class="form-control mb-2 mr-sm-2">
            </div>
          </div>    
        </div>       
        <br>
        <div class="form-inline">
          <div class="col-lg-4">
            <div class="form-inline">
              <label class="mr-sm-2">Direccion:</label>
              <input type="text" id="dir" name="dir" class="form-control mb-2 mr-sm-2">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-inline">  
              <label class="mr-sm-2">Telefono:</label>
              <input type="number" id="tel" name="tel" class="form-control mb-2 mr-sm-2">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-inline">
              <label class="mr-sm-2">Ci:</label>
              <input type="number" id="ci" name="ci" class="form-control mb-2 mr-sm-2">
            </div>
          </div>
        </div>
        <br>
        <div class="form-inline">
          <div class="col-lg-4">
            <div class="form-inline">
              <label class="mr-sm-2">Fecha de Nacimiento:</label>
              <input type="date" id="fech_n" name="fech_n" class="form-control mb-2 mr-sm-2">
            </div>
          </div>   
          <div class="col-lg-4">
            <div class="form-inline">
              <label class="mr-sm-2">Fecha de Ingreso:</label>
              <input type="date" id="fech_i" name="fech_i" class="form-control mb-2 mr-sm-2">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-inline">
              <label class="mr-sm-2">Sueldo:</label>
              <input type="number" id="sue" name="sue" class="form-control mb-2 mr-sm-2">
            </div>
          </div>
        </div>
        <br>
        <div class="form-inline">
          <div class="col-lg-4">
            <div class="form-inline">
              <label class="mr-sm-2">Razon Social:</label>
              <input type="text" id="rz" name="rz" class="form-control mb-2 mr-sm-2">
            </div>
          </div>   
          <div class="col">
            <div class="form-inline">
              <label class="mr-sm-2">Observacion:</label>
              <input type="text" id="obs" name="obs" class="form-control mb-2 mr-sm-2">
            </div>
          </div>
        </div>
        <br>
        <div class="form-inline">
          <div class="col-lg-6">
            <div class="form-inline">
              <label class="mr-sm-2">Genero:</label>
              <input type="radio" name="genero" id="genero" value="F" class="form-control  mr-sm-2">
              <label class="mr-sm-2">Maculino</label> 
              <input type="radio" name="genero" id="genero" value="M" class="form-control  mr-sm-2">
              <label class="mr-sm-2">Femenino</label>
            </div>
          </div>
            <label class="mr-sm-2">Interes:</label>
              <input type="checkbox" id="interes[]" name="interes[]" value="Estudia" class="form-control mr-sm-2">Estudio
              <input type="checkbox" id="interes[]" name="interes[]" value="Deportes" class="form-control mr-sm-2">Deporte
              <input type="checkbox" id="interes[]" name="interes[]" value="Trabaja" class="form-control mr-sm-2">Trabajo
        </div>
        <br>
        <div class="form-inline ">
          <div class="col-lg-4">
            <div class="form-inline ">
              <i class="fa fa-user"></i>
              <label class="mr-sm-2"> &nbsp;Usuario *:</label>
              <input type="text" id="usu" name="usu" class="form-control mb-2 mr-sm-2 ">
            </div>
          </div>   
          <div class="col-lg-4">
            <div class="form-inline">
              <i class="fa fa-key"></i>
              <label class="mr-sm-2"> &nbsp;Pasword *:</label>
              <input type="pwd" id="pwd" name="pwd" class="form-control mb-2 mr-sm-2"></span>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-inline">
              <i class="fa fa-eye"></i>
              <label class="mr-sm-2">&nbsp;Estado *:</label>
              <select name='est' class='form-control mb-2 mr-sm-2'>
                <option value="activo" style="color: green">ACTIVO</option>
                <option value="inactivo" style="color: red">INACTIVO</option>
              </select>
            </div>
          </div>
        </div>
        <br>
        <div class="container">
          <input align="center" type="submit" name="registrarempleado" id="registrarempleado" value="Registrar empleado" class="btn btn-danger btn-block">
          <br><br>
        </div>
      </form>
    </div>
    <!-- MAS-->
    <div id="menu2" class="container tab-pane fade">
      <h3>Mas</h3>
      <div class="row">
        <div class="col">
          <div class="table-responsive">
          <table border="1" width="100%" align="center" class="l">
            <tr align="center" class="t">
              <th>Apellido Paterno:</th>
              <th>Apellido Materno:</th>
              <th>Nombres:</th>
              <th>Usuario</th>
              <th>Intereses</th>
              <th>Razon Social</th>
              <th>Fecha de Nacimiento:</th>
              <th>Telefono:</th>
              <th>Direccion:</th>
              <th>Modificar:</th>
            </tr>
            <?php
            $consulta="SELECT id_empleado,ap_paterno,ap_materno,nombres,usuario,intereses,rz,fecha_nacimiento,telefono,direccion FROM empleado";
            $res=mysqli_query($conexion,$consulta);
            while($reg=mysqli_fetch_array($res)){
              echo "<tr align='center'>";
              echo "<td>".$reg['ap_paterno']."</td>";
              echo "<td>".$reg['ap_materno']."</td>";
              echo "<td>".$reg['nombres']."</td>";
              echo "<td>".$reg['usuario']."</td>";
              echo "<td>".$reg['intereses']."</td>";
              echo "<td>".$reg['rz']."</td>";
              echo "<td>".$reg['fecha_nacimiento']."</td>";
              echo "<td>".$reg['telefono']."</td>";
              echo "<td>".$reg['direccion']."</td>";
              echo '<td><a href="modulos/empleado/modificar2.php?cod='.$reg['id_empleado'].'"class="btn btn-warning">'; 
              echo '<span><i class="fa fa-edit "></i></span></td>';
              echo "</tr>";
            }
            ?>
          </table>
          </div>
        </div>
      </div>
    </div>

  </div>
  
</div>