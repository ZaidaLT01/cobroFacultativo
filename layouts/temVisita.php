<!DOCTYPE html>
<html lang="es">
<head>

	<title>Sistema</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie-edge">
	
    <!--añadiendo estilo css-->
	<link href="estilos/css/estilo.css" rel="stylesheet">

</head>
<body>
	<!--barra superior logo llamar en sesion por log.php-->
		<?php 
			require_once('encabezadoVisita.php');
			require_once('cuerpoVisita.php');
		?>			
	<footer class="footer text-center bg-dark py-2">
		<?php 
			include_once('pie.php');
		?>
	</footer>

</body>
	<script src="estilos/js/estilo.min.js"></script>
</html>