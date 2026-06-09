<nav class="navbar navbar-expand-lg fixed-top" id="mainNav2">
	<div class="container">
		<a class="navbar-brand" href="#page-top"><img src="img/logo1.png" width="260px" height="70px"></a>
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
</nav>