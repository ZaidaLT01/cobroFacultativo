<?php
require_once("motor/conexion.php");
$a=2;
$b=$_POST['turno'];
$c=$_POST['cargo'];
$d=$_POST['apPat'];
$e=$_POST['apMat'];
$f=$_POST['nombre'];
$g=$_POST['ci'];
$h=$_POST['dir'];
$i=$_POST['tel'];
$j=$_POST['fech_n'];

$k=$_POST['genero'];
$l=$_POST['fech_i'];
$m=$_POST['sue'];
$razon=$_POST['rz'];
$obs=$_POST['obs'];
//$in=$_POST['interes[]'];
$usu=$_POST['usu'];
$contra=$_POST['pwd'];
$pasw=md5($_POST['pwd']);
$est=$_POST['est'];
		
$int="";
//foreach ($in as $i => $valor) {
			//$int=$int.$in[$i]." ";
		//}
//echo $int;

$q="INSERT INTO empleado SET turno_id_turno=$b,usuario='$usu',pasword='$pasw',tipo_usuario_id_tipo=2,cargo_id_cargo=$c,ap_paterno='$d',ap_materno='$e',nombres='$f',ci=$g,direccion='$h',telefono=$i,fecha_nacimiento='$j',genero='$k',fecha_ingreso='$l',sueldo=$m,observacion='$obs',estado='$est',rz='$razon'";
//,contraseña='$contra'
//,intereses='$int'
$r=mysqli_query($conexion,$q);
if($r){
?>
	<script>
			alert('Se registro');
			location.href='./inicio.php?mod=empleados';
	</script>
<?php
}
else{
?>
		<script >
			alert('No se registro');
			location.href='./inicio.php?mod=empleados';
		</script>
<?php	
}
?>