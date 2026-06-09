<?php
session_start();
$user = $_POST["username"];
$pasw = $_POST["pasw"];
$pasw=md5($pasw);
echo $user;
echo "<br>";
echo $pasw;

	require_once("../motor/conexion.php");
	$consulta="SELECT * from empleado where usuario='$user' and pasword='$pasw'";
	$resultado=mysqli_query($conexion,$consulta);
	$filas=mysqli_num_rows($resultado);
		if($filas!=0)
			{ //si es empleado
			$dato=mysqli_fetch_array($resultado);
			///aca asigno a variables de sesion ciertos datos: 
			$_SESSION["id_empleado"] = $dato['id_empleado'];
			$_SESSION["usuario"] = $dato['usuario'];
			$_SESSION["pasword"] = $dato['pasword'];
			$_SESSION["tipo_usuario_id_tipo"] = $dato['tipo_usuario_id_tipo'];
			$_SESSION["nombres"] = $dato['nombres'];
			$_SESSION["estado"] = $dato['estado'];
			// se redirecciona a inicio
			header("Location: ../inicio.php?mod=inicio");
			}
		
		else{
			$consulta2="SELECT * from cliente where usuario='$user' and pasword='$pasw'";
			$resultado=mysqli_query($conexion,$consulta2);
			$filas=mysqli_num_rows($resultado);
			if($filas!=0)
				{ // si es Cliente
				$dato=mysqli_fetch_array($resultado);
				///aca asigno a variables de sesion ciertos datos: 
				$_SESSION["id_cliente"] = $dato['id_cliente'];
				$_SESSION["usuario"] = $dato['usuario'];
				$_SESSION["pasword"] = $dato['pasword'];
				$_SESSION["tipo_usuario_id_tipo"] = $dato['tipo_usuario_id_tipo'];
				$_SESSION["nombres"] = $dato['nombres'];
				$_SESSION["sumapuntos"] = $dato['sumapuntos'];
				$_SESSION["estado"] = $dato['estado'];
				//se direcciona a inicio
			header("Location: ../inicio.php?mod=inicio");
				}
			else{
					
				$consulta3="SELECT * from administrador where usuario='$user' and pasword='$pasw'";
			$resultado=mysqli_query($conexion,$consulta3);
			$filas=mysqli_num_rows($resultado);
				if($filas!=0)
					{ // si es administrador
					$dato=mysqli_fetch_array($resultado);
					///aca asigno a variables de sesion ciertos datos: 
					$_SESSION["id_administrador"] = $dato['id_administrador'];
					$_SESSION["usuario"] = $dato['usuario'];
					$_SESSION["pasword"] = $dato['pasword'];
					$_SESSION["tipo_usuario_id_tipo"] = $dato['tipo_usuario_id_tipo'];
					$_SESSION["nombres"] = $dato['nombres'];
					$_SESSION["estado"] = $dato['estado'];
					//se direcciona a inicio
			header("Location: ../inicio.php?mod=inicio");
					}
				else{
					// en caso de error retorna a iniciaSesion.php y envia una bandera pra indicar q el logeo fue incorrecto
					header("Location: ../iniciaSesion.php?error=1");
					}
			}
		}

?>