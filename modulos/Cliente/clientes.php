<div class="container">
  <br>
  <h2 align="center">CLIENTES</h2>

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
      <h3>Datos</h3>
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
              <button class="btn btn-success  mb-2 mr-sm-2" type="submit" id="mostrar" name="mostrar" >Todo</button>
            </form>
            <a href="pdf/pdfClientes.php" class="btn btn-danger mb-2 "><i class="fa fa-print"></i> Reporte</a>
          </div>
        </div>
      </div>  

      <div class="table-responsive">
        <table border="1" align="center" class="table l">
          <tr align="center" class="t">
            <th>Usario/Nombre</th>
            <th>Nit/Ci</th>
            <th>Razon Social</th>
            <th>Telefono</th>
            <th>Puntos Totales</th>
            <th>Estado <a  data-toggle="modal" data-target="#dudaC" class="btn-danger" style="border-radius: 20px 20px 20px 20px;padding: 0.2rem">
            <i class=" fa fa-question "> </i></th>
            <th>Ingresar Puntos</th>
            <th>Eliminar</th>
            <th>Modificar</th>
          </tr>
          <?php
            if (isset($_POST['buscar'])) {
              $var=$_POST["var"];
              $consulta="select *from cliente WHERE usuario like '%$var%' order by usuario asc";
              $res=mysqli_query($conexion,$consulta);
              $reg=mysqli_fetch_array($res);
              echo "<tr align='center'>";
              echo "<td>".$reg['usuario']."</td>";
              echo "<td>".$reg['nit_ci']."</td>";
              echo "<td>".$reg['rz']."</td>";
              echo "<td>".$reg['telefono']."</td>";
              echo "<td>".$reg['sumapuntos']."</td>";
             // Mostrar el estado actual con un botón de cambio
             $estadoActual = $reg['estado']; // Estado de la base de datos
             $checked = ($estadoActual == "activo") ? "checked" : ""; // Si es "activo", marcar el checkbox
             $colorClass = ($estadoActual == "activo") ? "text-success" : "text-danger"; // Color según estado
             echo "<td>
                     <input type='checkbox' class='toggle-estado' data-id='{$reg['id_cliente']}' data-toggle='toggle' data-on='Activo' data-off='Inactivo' data-onstyle='success' data-offstyle='danger' $checked>
                   </td>";

              echo '<td><a href="modulos/cliente/asigpuntos.php?cod='.$reg['id_cliente'].'"class="btn btn-success"><span><i class="fa fa-plus-circle"></i></span> </td>';
              echo '<td><a href="modulos/cliente/eliminar.php?cod='.$reg['id_cliente'].'"class="btn btn-danger"><span><i class="fa fa-trash"></i></span> </td>';
              echo "<td>
                <button class='btn btn-warning' data-toggle='modal' data-target='#editModalClientes' 
                onclick='fillModal(
                {$reg['id_cliente']},
                \"{$reg['usuario']}\", 
                \"{$reg['nit_ci']}\", 
                \"{$reg['rz']}\", 
                \"{$reg['telefono']}\"
                )'>
                <i class='fa fa-edit'></i></button></td>";
              echo "</tr> ";
            }else{ 

              if(isset($_POST['mostrar'])){ 
              $consulta="select *from cliente ";
              $res=mysqli_query($conexion,$consulta);
              while($reg=mysqli_fetch_array($res)){
                echo "<tr align='center'>";
                echo "<td>".$reg['usuario']."</td>";
                echo "<td>".$reg['nit_ci']."</td>";
                echo "<td>".$reg['rz']."</td>";
                echo "<td>".$reg['telefono']."</td>";
                echo "<td>".$reg['sumapuntos']."</td>";
               // Mostrar el estado actual con un botón de cambio
                 $estadoActual = $reg['estado']; // Estado de la base de datos
                 $checked = ($estadoActual == "activo") ? "checked" : ""; // Si es "activo", marcar el checkbox
                 $colorClass = ($estadoActual == "activo") ? "text-success" : "text-danger"; // Color según estado
                 echo "<td>
                         <input type='checkbox' class='toggle-estado' data-id='{$reg['id_cliente']}' data-toggle='toggle' data-on='Activo' data-off='Inactivo' data-onstyle='success' data-offstyle='danger' $checked>
                       </td>";

                echo '<td><a href="modulos/cliente/asigpuntos.php?cod='.$reg['id_cliente'].'"class="btn btn-success"><span><i class="fa fa-plus-circle"></i></span> </td>';
                echo '<td><a href="modulos/cliente/eliminar.php?cod='.$reg['id_cliente'].'"class="btn btn-danger"><span><i class="fa fa-trash"></i></span> </td>';
                echo "<td>
                  <button class='btn btn-warning' data-toggle='modal' data-target='#editModalClientes' 
                  onclick='fillModal(
                  {$reg['id_cliente']},
                  \"{$reg['usuario']}\", 
                  \"{$reg['nit_ci']}\", 
                  \"{$reg['rz']}\", 
                  \"{$reg['telefono']}\"
                  )'>
                  <i class='fa fa-edit'></i></button></td>";
                echo "</tr>";
              }
              } else{
                $consulta="select *from cliente ";
                $res=mysqli_query($conexion,$consulta);
                while($reg=mysqli_fetch_array($res)){
                  echo "<tr align='center'>";
                  echo "<td>".$reg['usuario']."</td>";
                  echo "<td>".$reg['nit_ci']."</td>";
                  echo "<td>".$reg['rz']."</td>";
                  echo "<td>".$reg['telefono']."</td>";
                  echo "<td>".$reg['sumapuntos']."</td>";

                  // Mostrar el estado actual con un botón de cambio
                 $estadoActual = $reg['estado']; // Estado de la base de datos
                 $checked = ($estadoActual == "activo") ? "checked" : ""; // Si es "activo", marcar el checkbox
                 $colorClass = ($estadoActual == "activo") ? "text-success" : "text-danger"; // Color según estado
                  echo "<td>
                         <input type='checkbox' class='toggle-estado' data-id='{$reg['id_cliente']}' data-toggle='toggle' data-on='Activo' data-off='Inactivo' data-onstyle='success' data-offstyle='danger' $checked>
                       </td>";
                       
                  echo "<td>
                       <button class='btn btn-success agregar-punto' data-id='{$reg['id_cliente']}'>
                           <i class='fa fa-plus-circle'></i>
                       </button>
                     </td>";

                  echo '<td><a href="modulos/cliente/eliminar.php?cod='.$reg['id_cliente'].'"class="btn btn-danger"><span><i class="fa fa-trash"></i></span> </td>';
                  echo "<td>
                  <button class='btn btn-warning' data-toggle='modal' data-target='#editModalClientes' 
                  onclick='fillModal(
                  {$reg['id_cliente']},
                  \"{$reg['usuario']}\", 
                  \"{$reg['nit_ci']}\", 
                  \"{$reg['rz']}\", 
                  \"{$reg['telefono']}\"
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
              var idCliente = $(this).data("id"); // Obtener el ID 
              var nuevoEstado = $(this).prop("checked") ? "activo" : "inactivo"; // Determinar el nuevo estado

              $.ajax({
                  url: "modulos/Cliente/estado.php",
                  type: "POST",
                  data: { id: idCliente, estado: nuevoEstado },
                  success: function(response) {
                      $("#estado_" + idCliente).text(nuevoEstado.charAt(0).toUpperCase() + nuevoEstado.slice(1)); // Actualizar el texto
                      $("#estado_" + idCliente).removeClass("text-success text-danger").addClass(nuevoEstado === "activo" ? "text-success" : "text-danger"); // Cambiar color
                  },
                  error: function() {
                      alert("Error al actualizar el estado.");
                  }
              });
          });
      });
      </script>
      <!-- Duda de estado-->
      <div  class="modal fade" id="dudaC">
        <div class="modal-dialog">
          <div class="modal-content">
          <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Que determina el estado?</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
              El estado se determina por la cantidad de sesiones o por reservas: INACTIVO cuando no realizo sesiones por un tiempo o no entro a su pagina en un tiempo, como consecuencia tendra que registrarse de nuevo, eso tambien incluye nose eliminar puntos de confianza
            </div>
            <!-- Modal footer -->              
          </div>
        </div>
      </div>
      <!-- Asignacion de punto-->
      <script>
      $(document).ready(function() {
        $(".agregar-punto").click(function() {
            var idCliente = $(this).data("id"); // Obtener el ID del cliente
            var boton = $(this); // Guardar referencia al botón para deshabilitarlo temporalmente

            // Deshabilitar el botón mientras se procesa la solicitud
            boton.prop("disabled", true);

            $.ajax({
                url: "modulos/cliente/asigpuntos.php",
                type: "POST",
                data: { id: idCliente },
                success: function(response) {
                    $("#puntos_" + idCliente).text(response); // Actualizar el número de puntos en la tabla
                    boton.prop("disabled", false); // Habilitar el botón nuevamente
                    location.reload();
                },
                error: function() {
                    alert("Error al actualizar los puntos.");
                    boton.prop("disabled", false); // Habilitar el botón en caso de error
                }
              });
            });
          });
      </script>
      <!-- Modificar -->
      <div class="modal fade" id="editModalClientes" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editModalLabel">Editar Cliente</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <div class="modal-body">
            <form action="modulos/Cliente/modificar.php" method="POST">
              <input type="hidden" id="edit_id" name="cod">
              <div class="form-group">
                  <label>Usuario:</label>
                  <input type="text" class="form-control" id="edit_usu" name="nom">
              </div>
              <div class="form-group">
                  <label>Nit/ci:</label>
                  <input type="number" class="form-control" id="edit_nc" name="nit_ci">
              </div>
              <div class="form-group">
                  <label>Razon Social:</label>
                  <input type="text" class="form-control" id="edit_rz" name="raz">
              </div>
              <div class="form-group">
                  <label>Telefono</label>
                  <input type="number" class="form-control" id="edit_tel" name="t">
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
        function fillModal(id, usuario, nit_ci, rz, telefono) {
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_usu').value = usuario;
            document.getElementById('edit_nc').value = nit_ci;
            document.getElementById('edit_rz').value = rz;
            document.getElementById('edit_tel').value = telefono;           
        }
    </script>

    </div>
    <br>
 <!-- REGISTRO-->
    <div id="menu1" class="container tab-pane fade">
      <h3>Registro</h3>

        <form name="form" method="post" id="form" action="?mod=guardarCli" class="form-horizontal">
                <table align="center">
                  <tr>
                    <div class="input-group">
                      <td><label>USERNAME: </label></td>
                      <td><input type="text" class="form-control" id="username" name="username" value="" placeholder="Nombre de Usuario" autofocus="" required=""><br></td>          
                    </div>
                  </tr>
                  <tr>
                    <div class="input-group">
                      <td><label>CONTRASEÑA:</label></td>
                      <td><input type="password" class="form-control" id="pasw" name="pasw" placeholder="Contraseña" required=""><br></td>
                    </div>                         
                  </tr>                                
                  <tr>
                    <div class="input-group">
                      <td>  <label>RAZON SOCIAL:</label></td>
                      <td> <input type="text" class="form-control" id="razon" name="razon" placeholder="¿A que se dedica?" required=""><br></td>
                    </div>    
                  </tr>                                                                             
                  <tr>
                    <div class="input-group">
                       <td><label>NIT / CI:</label></td>
                       <td><input type="number" class="form-control" id="nit" name="nit" placeholder="Para Factura" required=""><br></td>
                    </div>
                  </tr>
                  <tr>
                    <div class="input-group">
                       <td><label>TELÉFONO: </label></td>
                       <td><input type="number" class="form-control" id="tel" name="tel" placeholder="Teléfono" required=""></td>
                    </div>  
                  </tr>   
                  <tr>
                    <div class="form-group">
                      <div class="col-sm-12 controls">
                        <td colspan="2" align="center">
                          <br>
                          <input align="center" type="submit"  value="Registrar Cliente" class="btn btn-danger">  
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