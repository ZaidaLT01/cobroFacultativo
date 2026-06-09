<!DOCTYPE html>
<html lang="es">
  <head>
      <title> Sistema</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta http-equiv="x-ua-compatible" content="ie-edge">
      <!--añadiendo estilos booststrap css-->
      <link href="../../estilos/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" >
      <!--añadiendo estilos font- awesome css-->
      <link href="../../estilos/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  </head>
  <body background="../../img/opcion1.jpg">
    <div class="container " align="center">    
      <div class="card " style="width: 25rem;" align="center">
        <img class="card-img-top" src="../../img/logoInicio.jpg" align="center" width="250" height="350" alt="Card image cap">
        <div class="card-body">
    		    <h2>REGISTRO CLIENTE</h2>
              <form name="form" method="post" id="form" action="grabar.php" class="form-horizontal">
                <table>
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
  				  	         <td><input type="NUMBER" class="form-control" id="tel" name="tel" placeholder="Teléfono" required=""></td>
                    </div>  
          				</tr>   
          				<tr>
                    <div class="form-group">
                      <div class="col-sm-12 controls">
          					    <td colspan="2" align="center">
                          <br>
                          <button class="btn bg-warning" type="submit" align="center">
                            <span class="badge badge-pill" style="font-size: 1em ">
                              <i class="fa fa-check-square-o"> REGISTRARSE</i>
                            </span>
                          </button>  
                        </td>
                      </div>
                    </div>
          				</tr>                                                       
              </table>
            </form>    
            <hr>
            <a href="../../iniciaSesion.php"">
              <span class="badge badge-pill text-warning" style="font-size: 1em;background: #341F18;">
                <i class="fa fa-sign-in"> INICIAR SESION</i>
              </span> 
            </a>
            <a href="../../index.php">
              <span class="badge badge-pill text-warning" style="font-size: 1em;background: #341F18" >
                <i class="fa fa-remove"> CANCELAR</i>
              </span>
            </a>
      </div>
  	</div>
  </body>
  <!--El orden del script es importante este scrip coloca fa fas principales
    <script src="layouts/estilos/vendor/bootstrap/js/all.js"></script>-->
    <!-- este j query permite el cambio y fa fas diferentes -->
    <script src="../../estilos/vendor/jquery/jquery.min.js"></script>
    <!-- Script para cambios -->
    <script src="../../estilos/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- averiguar para que sirve -->
    <script src="../../estilos/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Script para cambios-->
    <script src="../../estilos/js/agency.min.js"></script>  
</html>