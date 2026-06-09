<?php 

$adm=$_SESSION['id_administrador'];
$dat=Date('Y-m-d');


	$q="INSERT INTO compra (id_empleado,id_administrador,fecha) values (1,$adm,'$dat') ";
	$res=mysqli_query($conexion,$q);
	if($res){
		$cart_id = $conexion->insert_id;
		foreach($_SESSION['compra'] as $c){
		$q2="INSERT INTO detalle_compra (compra_id_compra,producto_id_producto,cantidad,descuento) values ($cart_id,".$c['id_producto'].", ".$c['cantidad'].",30)";
		$resultado=mysqli_query($conexion,$q2) or die (mysqli_error());

		$sel="SELECT stock FROM producto WHERE id_producto=".$c['id_producto']." ";
		$resu=mysqli_query($conexion,$sel)or die (mysqli_error());
		$reg=mysqli_fetch_array($resu);
		
		$sto=$reg['stock'];
		$prod=$sto+$c['cantidad'];

		$consu="UPDATE producto SET stock='$prod' WHERE id_producto=".$c['id_producto']." ";
		$resu=mysqli_query($conexion,$consu)or die (mysqli_error());

		}
		unset($_SESSION['compra']);
		print "<script>alert('Venta procesada exitosamente');window.location='./inicio.php?mod=Scompras';</script>";
	}
	else{
	print "<script>alert('Venta no procesada ');window.location='./inicio.php?mod=Scompras';</script>";
}
?>