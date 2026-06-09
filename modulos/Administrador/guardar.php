<?php
include("../conexion.php");
$a=1;
$b=$_POST['tipo'];
$c=$_POST['apPat'];
$d=$_POST['apMat'];
$e=$_POST['nombre'];
$f=$_POST['ci'];
$g=$_POST['genero'];
$h=$_POST['tra'];
$i=$_POST['per'];


$q="insert into administrador(tipo_usuario_id_tipo,tipo,ap_paterno,ap_materno,nombres,ci,genero,movil_trabajo,movil_personal) values ($a,'$b','$c','$d','$e','$f',$g,$h)";

$r=mysqli_query($con,$q) or die(mysql_error());

if($r){
?>
	<script >
		alert('Se registro');
		location.href='listadoAdministrador.php';
	</script>
<?php
}
?>