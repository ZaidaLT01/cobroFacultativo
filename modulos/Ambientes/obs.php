<?php
session_start();
$usuario=$_SESSION["usuario"];
$pasword=$_SESSION["pasword"];                                                   
$nivel=$_SESSION["tipo_usuario_id_tipo"];
$nom=$_SESSION["nombres"];
require_once("../../motor/conexion.php");
$cod=$_POST['cod'];
	if (isset($_POST['obs'])) {

		$var0=$_POST['turno'];
		$var1=$_POST['cargo'];
		$var2=$_POST['ap_p'];
		$var3=$_POST['ap_m'];
		$var4=$_POST['nom'];
		$var5=$_POST['ci'];
		$var6=$_POST['dir'];
		$var7=$_POST['tel'];
		$var8=$_POST['fech_n'];
		$var10=$_POST['fech_i'];
		$var11=$_POST['sue'];

	$int="";
		$consultam = "UPDATE empleado SET turno_id_turno='$var0',
						cargo_id_cargo='$var1',
						ap_paterno='$var2',
						ap_materno='$var3',
						nombres='$var4',
						ci='$var5',
						direccion='$var6',
						telefono=$var7,
						fecha_nacimiento='$var8',
						fecha_ingreso='$var10',
						sueldo=$var11
						WHERE id_empleado='$cod';";
		$resm=mysqli_query($conexion,$consultam);
		if($resm){
			?>
			<script>
				alert('Se Modifico');
				location.href='./../../inicio.php?mod=empleados';
			</script>
			<?php
		}
		else {
			echo "<script>alert('Error en la consulta SQL');</script>";
		}
}
?>