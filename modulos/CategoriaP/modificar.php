<?php
session_start();
$usuario=$_SESSION["usuario"];
$pasword=$_SESSION["pasword"];                                                   
$nivel=$_SESSION["tipo_usuario_id_tipo"];
$nom=$_SESSION["nombres"];
require_once("../../motor/conexion.php");
	$cod=$_POST['cod'];
	if (isset($_POST['Modificar'])) {
		$var0=$_POST['carT'];

		$consultam = "UPDATE categoriap SET nombre='$var0' WHERE id_categoria='$cod'";
		$resm=mysqli_query($conexion,$consultam);
		if($resm){
		?>
		<script>
			alert('Se Modifico');
			location.href='./../../inicio.php?mod=categoriaP';
		</script>

<?php
		}
	}
?>