<?php
require_once("../../motor/conexion.php");
	$cod=$_GET['cod'];
	$consulta="DELETE FROM categoriap WHERE id_categoria='".$cod."';";
	$res=mysqli_query($conexion,$consulta);
	if($res){
?>
		<script>
			alert('Se Elimino Correcatamente');
			location.href='./../../inicio.php?mod=categoriaP';
		</script>
<?php
}
else{
?>
		<script >
			alert('No se Elimino');
			location.href='./../../inicio.php?mod=categoriaP';
		</script>
<?php	
}
?>
