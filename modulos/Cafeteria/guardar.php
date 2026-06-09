<?php
require_once("motor/conexion.php");
$cat=$_POST['nombreCatg'];
$nom=$_POST['nom'];
$cv=$_POST['costouv'];
$cc=$_POST['costouc'];


$q="INSERT INTO `cafeteria_prod` SET `categorias_id_cat`=$cat,`nombre`='$nom',`costo_deter`=$cv,`costo_compra`=$cc";


$r=mysqli_query($conexion,$q);
if($r){
?>
<script>
			alert('Se registro');
			location.href='./inicio.php?mod=productosCf';
		</script>
<?php
}
else{
?>
		<script >
			alert('No se registro');
			location.href='./inicio.php?mod=productosCf';
		</script>
<?php	
}


?>

