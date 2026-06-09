<?php
	
require_once("../../motor/conexion.php");
	$cod=$_POST['cod'];
	if (isset($_POST['Modificar'])) {
		$var0=$_POST['raz'];
		$var1=$_POST['nit_ci'];
		$var2=$_POST['nom'];
		$var3=$_POST['t'];

		$consultam = "UPDATE cliente SET rz='$var0',nit_ci='$var1',usuario='$var2',telefono=$var3 WHERE id_cliente='$cod'";
		$resm=mysqli_query($conexion,$consultam);
			if($resm){
					?>
			<script>
						alert('Se Modifico');
						location.href='./../../inicio.php?mod=clientes';
					</script>

			<?php

			}
	}
?>
	