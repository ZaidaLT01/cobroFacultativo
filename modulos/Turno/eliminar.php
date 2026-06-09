<?php
	require_once("../../motor/conexion.php");
	$cod=$_GET['cod'];
	$consulta="DELETE FROM turno WHERE id_turno='$cod'";
	$res=mysqli_query($conexion,$consulta);
	if($res){
		echo "
		<script>
		window.alert('Registro eliminado con exito');
			window.location='./../../inicio.php?mod=turnos';
		</script>
		";
	}
	else{
		echo "
		<script>
		window.alert('Registro no eliminado');
			window.location='./../../inicio.php?mod=turnos';
		</script>
		";
	}
?>