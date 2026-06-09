<?php
require_once("../../motor/conexion.php");
	$cod=$_POST['cod'];
	if (isset($_POST['Modificar'])) {
		$var0=$_POST['t'];
		$var1=$_POST['i'];
		$var2=$_POST['s'];
		$consultam = "UPDATE turno SET turno='$var0', ingreso='$var1', salida='$var2' WHERE id_turno='$cod'";
		$resm=mysqli_query($conexion,$consultam);
		if($resm){
			echo "
			<script>
			window.alert('registro modificado con exito');
			window.location='./../../inicio.php?mod=turnos';
			</script>
			";
		}
	}
?>

 