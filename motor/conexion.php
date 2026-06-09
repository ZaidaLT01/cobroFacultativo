<?php
$conexion=mysqli_connect("localhost","root","","bd_pg");
if($conexion){
	//echo "<br>Informacion del Host: ".mysqli_get_host_info($conexion);
}
else{
	echo "error de conexion";
	echo "error".mysqli_connect_error();
}
?>