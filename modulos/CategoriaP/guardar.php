<?php
require_once("motor/conexion.php");

$categoria = $_POST["nombre"];

// creamos la consulta
$consulta="INSERT INTO categoriaP (nombre) VALUES ('$categoria')";
// ejecutamos la consulta
$r=mysqli_query($conexion,$consulta);
if($r){
?>
<script>
			alert('Se registro');
			location.href='./inicio.php?mod=categoriaP';
		</script>

<?php
}
else{
?>
		<script >
			alert('No se registro');
			location.href='./inicio.php?mod=categoriaP';
		</script>
<?php	
}
?>

