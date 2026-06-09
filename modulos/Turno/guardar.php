<?php
require_once("motor/conexion.php");
$t=$_POST['turno'];
$t_i=$_POST['time_i'];
$t_s=$_POST['time_s'];

$ti = strtotime($t_i);
$ti = date("H:i", $ti);
// devuelve formato 24h
$ts= strtotime($t_s);
$ts = date("H:i", $ts);

$q="insert into turno (turno,ingreso,salida) values ('$t','$ti','$ts')";
$r=mysqli_query($conexion,$q);
if($r){
?>
		<script>
			alert('Se registro');
			location.href='./inicio.php?mod=turnos';
		</script>
<?php
}
else{
?>
		<script >
			alert('No se registro');
			location.href='./inicio.php?mod=turnos';
		</script>
<?php	
}
?>
