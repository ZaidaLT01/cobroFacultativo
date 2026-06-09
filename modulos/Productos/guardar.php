<?php
require_once("motor/conexion.php");
$cat=$_POST['nombreCatg'];
$prove=$_POST['empresa'];
$nom=$_POST['nom'];
$des=$_POST['des'];
$cc=$_POST['costouc'];
$cv=$_POST['costouv'];
$stock=$_POST['stock'];
$fechav=$_POST['fech_v'];
$fechai=$_POST['fech_i'];

$q="INSERT INTO `producto` SET `categoriaP_id_categoria`=$cat,`proveedor_id_proveedor`=$prove,`nombre`='$nom',`descripcion`='$des',`costo_compra`=$cc,`costo_venta`=$cv,`stock`=$stock,`fecha_v`='$fechav',`fecha_i`='$fechai'";


$r=mysqli_query($conexion,$q);
if($r){
?>
<script>
			alert('Se registro');
			location.href='./inicio.php?mod=productos';
		</script>
<?php
}
else{
?>
		<script >
			alert('No se registro');
			location.href='./inicio.php?mod=productos';
		</script>
<?php	
}


?>

