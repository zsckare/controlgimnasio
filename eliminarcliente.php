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
	$id=$_GET['id'];

	include ("conexion.inc.php");
	$link=Conectarse();

	$consulta=mysql_query("DELETE FROM clientes WHERE id='$id' ");

	echo '
	<SCRIPT LANGUAJE="javascript">
		sweetAlert("Registro Eliminado","","success");
		location.href="suscripciones.php";
	</SCRIPT>
		
	';
	?>
    <script src=" js/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
</body>
</html>