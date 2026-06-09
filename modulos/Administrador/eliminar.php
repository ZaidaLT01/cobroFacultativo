<?php
	require("../conexion.php");
	$cod=$_GET['cod'];
	$consulta="DELETE FROM administrador WHERE id_administrador='$cod'";
	$res=mysqli_query($con,$consulta);
	if($res){
		echo "
		<script>
		window.alert('Registro eliminado con exito');
			window.location='listadoAdministrador.php';
		</script>
		";
	}
	else{
		echo "
		<script>
		window.alert('Registro no eliminado');
			window.location='listadoAdministrador.php';
		</script>
		";
	}
?>