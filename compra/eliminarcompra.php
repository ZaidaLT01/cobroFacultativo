<?php
/*
* Eliminar un producto del carrito
*/
session_start();
if(!empty($_SESSION["compra"])){
	$cart  = $_SESSION["compra"];
	if(count($cart)==1){ unset($_SESSION["compra"]); }
	else{
		$newcart = array();
		foreach($cart as $c){
			if($c["id_producto"]!=$_GET["id_producto"]){
				$newcart[] = $c;
			}
		}
		$_SESSION["compra"] = $newcart;
	}
}
print "<script>window.location='../vista/compraLista.php';</script>";

?>

