<?php 
session_start();
$usuario=$_SESSION["usuario"];
$pasword=$_SESSION["pasword"];                                                   
$nivel=$_SESSION["tipo_usuario_id_tipo"];
$nom=$_SESSION["nombres"];
$estado=$_SESSION["estado"];
if (!empty($usuario)) {
	require_once('layouts/template.php');
}
else{
	require_once('index.php');}
?>