<?php 
	include ("cabecera.php");
	require("../controlador/conexion_bd.php");
?>
<?php
	$consulta="SELECT id_empleado, ap_paterno, ap_materno, nombres FROM empleado";
	$resultado=mysqli_query($conexion,$consulta);
	$consulta1="SELECT id_proveedor, empresa FROM proveedor";
	$resultado1=mysqli_query($conexion,$consulta1);
?>
<!doctype>
<html>
	<head>
		<meta charset="iso-8859-1">
		<link href="estilo.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">    
		<title>FORM</title>
	</head>
	<body class="body1">
		<div class="col-lg-10">
	        <div class="panel panel-default">
	            <div class="panel-heading">Compra</div>
					<div class="panel-body">
                        <div class="row">
                        	<div class="col-lg-12">
                        		<CENTER><h3>FORMULARIO COMPRA</h3></CENTER>
                        		<hr>
								<form role="form" method="post" action="../modelo/grabarCompra.php" name="formulario" id="formulario" enctype="multipart/form-data">
		                            <div class="col-lg-3">
		                            </div>
                            	<div class="col-lg-6">
                            		<div class="form-group">
                                        <label>Empleado:</label>
                                        <?php //MOSTRAR EN EL SELECT	
											echo "<select id='id_empleado' name='id_empleado' class='form-control'> ";
											while ($registro=mysqli_fetch_array($resultado))
											{
												echo "<option value='".$registro['id_empleado']."'> ".$registro['ap_paterno']." </option>";
											}
											echo "</select>";
										?>
                                    </div>

                                    <div class="form-group">
                                        <label>Proveedor:</label>
                                        <?php //MOSTRAR EN EL SELECT	
											echo "<select id='id_proveedor' name='id_proveedor' class='form-control'> ";
											while ($registro1=mysqli_fetch_array($resultado1))
											{
												echo "<option value='".$registro1['id_proveedor']."'> ".$registro1['empresa']." </option>";
											}
											echo "</select>";
										?>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Fecha:</label>
                                        <input input type="date" name="fecha" id="fecha" placeholder="Fecha de compra..." class="form-control"  required>
                                    </div>
                                </form><hr>
							</div>
						</div>
						
						<div class="form-group" align="center">
							<button type="submit" id="registrarcargo" name= "registrarcargo" value="Registrar" onclick="alert('Enviar datos?')" class="btn btn-success">Registrar</button>
							<button type="reset" value="Borrar" onclick="alert('Limpiar datos?')" class="btn btn-danger">Limpiar</button>
						</div>
					</div>
				</div>
			</div>
	</body>
</html>

