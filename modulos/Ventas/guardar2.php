<?php 

$emp=$_SESSION['id_empleado'];
$cli=$_POST['cliente'];
$dat=Date('Y-m-d');


	$q="INSERT INTO venta (cliente_id_cliente,empleado_id_empleado,fecha) values ($cli,$emp,'$dat') ";
	$res=mysqli_query($conexion,$q);
	if($res){
		$cart_id = $conexion->insert_id;
		foreach($_SESSION['venta'] as $c){
		$q2="INSERT INTO detalle_venta (venta_id_venta,producto_id_producto,cantidad,descuento) values ($cart_id,".$c['id_producto'].", ".$c['cantidad'].",'')";
		$resultado=mysqli_query($conexion,$q2) or die (mysqli_error());

		$sel="SELECT stock FROM producto WHERE id_producto=".$c['id_producto']." ";
		$resu=mysqli_query($conexion,$sel)or die (mysqli_error());
		$reg=mysqli_fetch_array($resu);
		
		$sto=$reg['stock'];
		$prod=$sto-$c['cantidad'];

		$consu="UPDATE producto SET stock='$prod' WHERE id_producto=".$c['id_producto']." ";
		$resu=mysqli_query($conexion,$consu)or die (mysqli_error());

		}
		unset($_SESSION['venta']);
		print "<script>alert('Venta procesada exitosamente');window.location='./inicio.php?mod=Sventas';</script>";
	}
	else{
	print "<script>alert('Venta no procesada ');window.location='./inicio.php?mod=Sventas';</script>";
}
?>