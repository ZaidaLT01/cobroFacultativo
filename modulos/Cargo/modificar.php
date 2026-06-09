<?php
require_once("../../motor/conexion.php");
	$cod=$_POST['cod'];
	if (isset($_POST['Modificar'])) {
		$var0=$_POST['carg'];
		$var1=$_POST['sec'];
		$consultam = "UPDATE cargo SET cargo='$var0' WHERE id_cargo='$cod'";
		$resm=mysqli_query($conexion,$consultam);
		if($resm){
		?>
		<script>
			alert('Se Modifico');
			location.href='./../../inicio.php?mod=cargos';
		</script>
<?php
		}
	}
?>

 