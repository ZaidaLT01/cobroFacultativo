<?php
require_once("../../motor/conexion.php");
	$cod=$_GET['cod'];
	$consulta="DELETE FROM proveedor WHERE id_proveedor='$cod'";
	$res=mysqli_query($conexion,$consulta);
	if($res){
?>
		<script>
			alert('Se Elimino Correcatamente');
			location.href='./../../inicio.php?mod=proveedores';
		</script>
<?php
}
else{
?>
		<script >
			alert('No se Elimino');
			location.href='./../../inicio.php?mod=proveedores';
		</script>
<?php	
}
?>