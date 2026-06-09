<?php
require_once("motor/conexion.php");
$cargo = $_POST["cargo"];
// creamos la consulta
$consulta="INSERT INTO cargo (cargo) VALUES ('$cargo')";
// ejecutamos la consulta
$r=mysqli_query($conexion,$consulta);
if($r){
?>
	<script>
		alert('Se registro');
		location.href='./inicio.php?mod=cargos';
	</script>
<?php
}
else{ 
?>
		<script>
			alert('No se registro');
			location.href='./inicio.php?mod=cargos';
		</script>
<?php	
}
?>

