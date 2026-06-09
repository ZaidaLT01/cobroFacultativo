<?php
session_start();
$usuario=$_SESSION["usuario"];
$pasword=$_SESSION["pasword"];                                                   
$nivel=$_SESSION["tipo_usuario_id_tipo"];
$nom=$_SESSION["nombres"];
require_once("../../motor/conexion.php");
	$cod=$_POST['cod'];
	if (isset($_POST['Modificar'])) {
		$id = $_POST['cod'];
		$var1=$_POST['emp'];
		$var2=$_POST['con'];
		$var3=$_POST['mai'];
		$var4=$_POST['tel'];
		$var5=$_POST['dir'];
		$current_logo = $_POST['current_logo'];

		 // Verificar si se subió una nueva imagen
		 if ($_FILES['log']['name'] != "") {
			$logo = $_FILES['log']['name'];
			$logo_tmp = $_FILES['log']['tmp_name'];
			move_uploaded_file($logo_tmp, "../../modulos/proveedor/img/" . $logo);
		} else {
			$logo = $current_logo; // Mantener la imagen actual si no se sube una nueva
		}




		$consultam = "UPDATE proveedor SET empresa='$var1',contacto='$var2',mail='$var3',telefono=$var4,direccion='$var5',logo='$logo' WHERE id_proveedor='$id'";
		$resm=mysqli_query($conexion,$consultam);
		
		if($resm){
		?>
		<script>
			alert('Se Modifico');
			location.href='./../../inicio.php?mod=proveedores';
		</script>
		<?php
		}else{
			echo "<script>alert('Error al actualizar proveedor'); window.history.back();</script>";
		}
}
?>