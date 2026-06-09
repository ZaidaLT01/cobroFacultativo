<?php 
  //a qui podemos cambiar los ultimos botones ------ 
if(empty($usuario)){
  ?>
<html lang="es">
<head>
    <title> Sistema</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie-edge">
    <!--añadiendo estilos booststrap css-->
    <link rel="stylesheet" type="text/css" href="estilos/vendor/bootstrap/css/bootstrap.min.css">
    <!--añadiendo estilos font- awesome css-->
    <link href="estilos/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 
</head>

<body background="img/opcion1.jpg">
  <div class="container " align="center">    
    <div class="card" style="width: 25rem;" align="center">
      <img class="card-img-top" src="img/logoInicio.jpg" align="center" width="250" height="350" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">INICIO DE SESIÓN</h5>
        <?php
          if(isset($_GET['error'])){
            $e=$_GET['error'];
            if($e==1){
              echo "<font color='red'>Usuario o Contraseña incorrecta</font>";
            }
          }
        ?>
        <p class="card-text">

          <form name="form" method="post" id="form" action="phplogin/login.php" class="form-horizontal">
            <div class="input-group">
              <span class="input-group-text"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control" id="username" name="username" value="" placeholder="Nombre de Usuario" autofocus="" required="">                                   
            </div>
            <br>  
            <div class="input-group">
              <span class="input-group-text" ><i class="fa fa-key"></i></span>
              <input type="password" class="form-control" id="pasw" name="pasw" placeholder="Contraseña" required="">
            </div>   
            <br>  
            <div class="form-group">
              
              <div class="col-sm-12 controls">
                <button class="btn bg-warning" type="submit" align="center">
                  <span class="badge badge-pill" style="font-size: 1em ">
                    <i class="fa fa-share-square-o"> ENTRAR</i>
                  </span>
                </button>  
              </div>

            </div>
          </form> 

          <hr> 
            <a href="index.php">
              <span class="badge badge-pill text-warning" style="font-size: 1em;background: #341F18;">
                <i class="fa fa-reply"> VOLVER</i>
              </span> 
            </a>
            <a href="modulos/cliente/registro.php">
              <span class="badge badge-pill text-warning" style="font-size: 1em;background: #341F18" >
                <i class="fa fa-user-plus"> REGISTRATE</i>
              </span>
            </a>
      </div>
    </div>
  </div>
<?php
}
else 
{
  require_once('index.php'); 
}
 ?>
</body>

</html>