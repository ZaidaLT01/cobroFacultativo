<?php
session_start();
$usuario=$_SESSION["usuario"];
$pasword=$_SESSION["pasword"];                                                   
$nivel=$_SESSION["tipo_usuario_id_tipo"];
$nom=$_SESSION["nombres"];
require_once("../../motor/conexion.php");
	$cod=$_GET['cod'];
	if (isset($_POST['Modificar'])) {
		$var0=$_POST['carg'];

		$consultam = "UPDATE categorias SET nombre='$var0' WHERE id_cat='$cod'";
		$resm=mysqli_query($conexion,$consultam);
		if($resm){
		?>
		<script>
			alert('Se Modifico');
			location.href='./../../inicio.php?mod=categoriaCf';
		</script>

<?php
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>

	<!--añadiendo estilos booststrap css-->
	<link href="../../estilos/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!--añadiendo estilos font- awesome css-->
    <link href="../../estilos/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--añadiendo estilo css-->
    <link href="../../estilos/css/agency.min.css" rel="stylesheet">

</head>
<body >
	<?php require_once('../../motor/conexion.php');?>
	
			<div class="col-12">
				<nav class="navbar navbar-expand-lg fixed-top" id="mainNav2">
					<div class="container">
			        <a class="navbar-brand" href="#page-top"><img src="../../img/logo1.png" width="260px" height="70px"></a>
				          <ul class="navbar-nav text-uppercase ">
					        <!-- Dropdown -->
						    <li class="nav-item dropdown">
						      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
						        <i class="fa fa-user-circle-o"></i></i>&nbsp;&nbsp;Bienvenido <?php echo $usuario; ?>
						      </a>
							      <div class="dropdown-menu dropdown-menu-righ">
							      	<?php
										$consulta="SELECT nombre FROM tipo_usuario where id_tipo='".$nivel."'";
										$resultado=mysqli_query($conexion,$consulta);
										$filas=mysqli_num_rows($resultado);
											if($filas!=0)
												{  
													while($dato=mysqli_fetch_array($resultado))
													    { 
														$tipo=$dato['nombre'];?>
														<a class="dropdown-item dropdown-item disabled" ><?php echo "$tipo";?></a>
														<?php
														}
													}
											?>
							        <div class="dropdown-divider"></div>
							        <a class="dropdown-item" href="phplogin/editar_usuario.php"><i class="fas fa-user-edit"></i>Editar Datos</a>
							        <a class="dropdown-item" href="phplogin/cerrar.php "><i class="fas fa-sign-out-alt "></i>Cerrar Session</a>
							      </div>
						    </li>
				          </ul>
				        </div>
				    </div>
				</nav>			
			</div>
			<section>
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-xs-2 col-sm-2	col-md-2	col-lg-2 col-xl-2">
					<!--no funciona en extra pequeño revisar preguntar-->
					<?php //menu vertical
					//llamar por sesiones en menu.php
						require_once('../../layouts/menuMod.php');
					?>
				</div>
				<div class="col-12 col-xs-10 col-sm-10	col-md-10	col-lg-10 col-xl-10"> 
					<div id="cuerpo">
						<div class="container">
							<br>
							<H2><span class="label label-info">MODIFICAR REGISTRO PRODUCTO CAFETERIA</span></H2>
							<div class="table-responsive">
							<TABLE class="border="1" align="center" class="l"">
								<thead align="center" class="t">
									<tr>
										<td>Categoria</td>
									</tr>
								</thead>
						<?php
								$consulta="select * from categorias where id_cat='$cod'";
								$res=mysqli_query($conexion,$consulta);
							while ($fila=mysqli_fetch_array($res)) {
								echo '<tr>';
								echo'
								<form method="POST" action=modificar.php?cod='.$fila['id_cat'].'>
								<tr>
									<td><input type="text" class="form-control" name="carg" id="carg" value="'.$fila['nombre'].'"></td>
								</tr>
								';
							}
						?>
						</table>
						</div>
							<br>
							<div class="row show-grid">
					          <div class="col-md-8">
					                 <a href="./../../inicio.php?mod=categoriaCf" class="btn btn-danger mb-2 "><i class="fa fa-"></i>Volver</a>
					          </div><br>
					          <div class="col">
					            <div class="form form-inline">
					            	 <button class="btn btn-danger  mb-2 mr-sm-2 " type="submit" name="Modificar" id="Modificar" value="Modificar">Modificar </button>
					              </form>			              
					            </div>
					          </div>
					        </div> 								
						</div>
					</div>
				</div>	
			</div>
		</div>
		</section>
		<br>
		</footer>
		<?php 
			include_once('../../layouts/pie.php');
		?>
		</footer>

</body>
	<!--El orden del script es importante este scrip coloca fa fas principales
	<script src="layouts/estilos/vendor/bootstrap/js/all.js"></script>-->
    <!-- este j query permite el cambio y fa fas diferentes -->
    <script src="../../estilos/vendor/jquery/jquery.min.js"></script>
    <!-- Script para cambios -->
    <script src="../../estilos/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Script para cambios -->
    <script src="../../estilos/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- averiguar para que sirve -->
    <script src="../../estilos/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Script para cambios-->
    <script src="../../estilos/js/agency.min.js"></script>	

</html>