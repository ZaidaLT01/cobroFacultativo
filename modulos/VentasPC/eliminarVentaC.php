<?php
/*
* Eliminar un producto del carrito
*/
session_start();
if(!empty($_SESSION["venta"])){
	$cart  = $_SESSION["venta"];
	if(count($cart)==1){ unset($_SESSION["venta"]); }
	else{
		$newcart = array();
		foreach($cart as $c){
			if($c["id_producto"]!=$_GET["id_producto"]){
				$newcart[] = $c;
			}
		}
		$_SESSION["venta"] = $newcart;
	}
}
print "<script>window.location='./../../inicio.php?mod=Sventas';</script>";
?>