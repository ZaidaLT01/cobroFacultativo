<?php 
session_start();
require_once("../../motor/conexion.php");

$adm=$_SESSION['id_administrador'];
if(!empty($_POST)){
$q1 = $conexion->query("insert into compra(id_empleado,id_administrador,fecha) value('ver','$adm',NOW())");
//echo $q1;
if($q1){
$compra_id = $conexion->insert_id;
foreach($_SESSION["compra"] as $c){
	//datos producto
$pr = $conexion->query("select * from producto where id_producto=$c[id_producto]");
$r = $pr->fetch_object();
$mul=$r->costo_venta*$c[cantidad];
echo $mul;
	//echo $c[id_producto];
$q1 = $conexion->query("insert into detalle_compra(compra_id_compra,producto_id_producto,cantidad,descuento) value($compra_id,$c[id_producto],$c[cantidad])");
}
unset($_SESSION["compra"]);
}
}
print "<script>alert('Venta procesada exitosamente');window.location='./../../inicio.php?mod=Scompras.php';</script>";
?>