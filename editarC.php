<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

  <!-- CSS  -->
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  		<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
		<script src="js/sweetalert.min.js"></script>
</head>
<body>
	<?php
	$id=$_POST['id'];
	$paterno=trim($_POST['paterno']);
	$materno=trim($_POST['materno']);
	$nombre=trim($_POST['nombre']);
	$fecha=date("Y-m-d", strtotime($_POST['nacimiento']));
	$sexo=trim($_POST['sexo']);
	$telefono=trim($_POST['telefono']);
	$calle=trim($_POST['calle']);
	$numero=trim($_POST['numero']);
	$colonia=trim($_POST['colonia']);
	$ocupacion=trim($_POST['ocupacion']);

	include ("conexion.inc.php");
	$link=Conectarse();
	#$sSQL="UPDATE ''.'clie' SET paterno='$paterno',materno='$materno',nombre='$nombre',fecha='$fecha',sexo='$sexo',telefono='$telefono',calle='$calle',numcasa='$numero',colonia='$colonia',ocupacion='$ocupacion',activo='$activo' WHERE id='$id',";
	$sSQL="UPDATE `gimnasio`.`clientes` SET `paterno` = '$paterno', `materno` = '$materno', `nombre` = '$nombre', `fechanac` = '$fecha', `calle` = '$calle', `numcasa` = '$numero', `colonia` = '$colonia', `genero` = '$genero', `telefono` = '$telefono', `ocupacion` = '$ocupacion' WHERE `clientes`.`id` = $id LIMIT 1";
	mysql_query($sSQL)or die(mysql_error()); 
	echo '
	<SCRIPT LANGUAJE="javascript">
		sweetAlert("Datos Actualizados","","success");
		location.href="suscripciones.php";
	</SCRIPT>
		
	';
	?>
    <script src=" js/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
</body>
</html>