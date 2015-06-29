<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Tavos Gym | Checador</title>

<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
<script src="js/sweetalert.min.js"></script>
  <!-- CSS  -->
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body class="orange lighten-3">
<?php include 'navegacion.php';?>
<div class="land"></div>
<div class="container up-space">
	
	<?php
		include("conexion.inc.php");
		$link=Conectarse();
		date_default_timezone_set("America/Mexico_City");
		if(isset($_GET['id']))
		{
			$id=$_GET['id'];
			$checo=$_GET['checo'];
			$fecha= date("Y-m-d");
			$hora= date("h:i:s");
			$consulta="INSERT INTO asistenciasclientes (id, fecha, hora, accion) VALUES (".$id.", '".$fecha."', '".$hora."', ".$checo.")";
			mysql_query($consulta);
			if($checo==0)
			{
				echo '<script>sweetAlert("Entrada Registrada", "", "success");</script>';
			}else
			{
				echo '<script >sweetAlert("Salida Registrada", "", "info");</script>';
			}
			?>
				<SCRIPT LANGUAJE="javascript">
					location.href="home.php";
				</SCRIPT>
			<?php
		}
		
	?>



    <script src=" js/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
</body>
</html>