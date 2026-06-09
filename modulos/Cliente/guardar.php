<?php
require_once("motor/conexion.php");
$tip=3;
$usuario=$_POST['username'];
$contraseña=$_POST['pasw'];
$pasw=md5($_POST['pasw']);
$razon=$_POST['razon'];
$nit=$_POST['nit'];
$tel=$_POST['tel'];
$puntos=0;
$q= "insert into cliente (id_cliente,tipo_usuario_id_tipo,usuario,pasword,rz,nit_ci,telefono,estado,sumapuntos) values (null,'$tip','$usuario','$pasw','$razon','$nit','$tel','$estado','$puntos');";
$r=mysqli_query($conexion,$q);
if($r){
?>
	<script>
			alert('Se registro');
			location.href='./inicio.php?mod=clientes';
	</script>
<?php
}
else{
?>
		<script >
			alert('No se registro');
			location.href='../inicio.php?mod=clientes';
		</script>
<?php	
}
?>