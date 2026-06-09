<?php
require_once("../../motor/conexion.php");
	$cod=$_GET['cod'];
	$est=$_POST['est'];
		$consulta = "UPDATE empleado SET estado='$est' WHERE id_empleado='$cod';";
		$resm=mysqli_query($conexion,$consulta);
		if($resm){
		?>
		<script>
			alert('Se Modifico');
			location.href='./../../inicio.php?mod=empleados';
		</script>
		<?php
		}
		else{
		?>
				<script >
					alert('No se Elimino');
					location.href='./../../inicio.php?mod=empleados';
				</script>
		<?php	
		}
		?>