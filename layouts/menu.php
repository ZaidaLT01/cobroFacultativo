<?php
if($nivel==1){
	require_once('menuAdmi.php');
}
if($nivel==2){
	require_once('menuEmpleado.php');
}
if($nivel==3){
	require_once('menuCliente.php');
}

?>