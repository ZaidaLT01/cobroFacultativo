<?php
require_once("motor/conexion.php");

$categoria = $_POST["nombre"];
$a=$_FILES['imagen']['name'];
$b=$_FILES['imagen']['tmp_name'];
$c=$_FILES['imagen']['size'];

// creamos la consulta
$consulta="INSERT INTO categorias (nombre,foto) VALUES ('$categoria','$a')";
// ejecutamos la consulta
$r=mysqli_query($conexion,$consulta);
if($r){
	@copy($b, "../modulos/CategoriaPC/img/".$a);

?>
<script>
			alert('Se registro');
			location.href='./inicio.php?mod=categoriaCf';
		</script>

<?php
}
else{
?>
		<script >
			alert('No se registro');
			location.href='./inicio.php?mod=categoriaCf';
		</script>
<?php	
}
?>

