<?php 
session_start();
	if(isset($_SESSION['user_access'])){

    }
    else{
     header("Location: ../index.php");
    } 
    ?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tavos Gym | Ingresos</title>

  <!-- CSS  -->
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
        <script src="js/sweetalert.min.js"></script>
<body class="orange lighten-3" >
<?php include 'navegacion.php';?>
    <div class="land"></div>
	
	<div class="container">
	<div class="card paddin-largo">
		<div class="row"><h4 class="center-align">Reporte de Ingresos <i class="ion-social-usd-outline"></i></h4></div>
		
	<?php
		echo 
		'<div class="row">
			<form action="reportesIngresos.php" method="POST">

			<div class="col s6 m4">
				<label for="desde">Desde</label>
				<input id="desde" type="date" name="inicio" class="datepicker" >
			</div>
			<div class="col s6 m4">
			<label for="hasta">Hasta: </label>
			<input id="hasta" type="date" name="final" class="datepicker" >
			</div>
			<div class="col s6 m1"><input class="btn-large light-blue darken-4" type="submit" value="Generar Reporte"></div>
			
		</form>
		</div>';
		if(isset($_POST['inicio']))
		{
			date_default_timezone_set("America/Mexico_City");
			include("conexion.inc.php");
			$link=Conectarse();
			$inicio=$_POST['inicio'];
			$final=$_POST['final'];
			if($inicio!=NULL)
			{
				$inicio=" WHERE fecha >= '".$inicio."' ";
				if($final!=NULL)
				{
					$final="AND fecha <= '".$final."'";
				}
			}
			else
			{
				if($final!=NULL)
				{
					$final=" WHERE fecha <= '".$final."'";
				}
			}
			$consulta="SELECT * FROM ingresos ".$inicio.$final." ORDER BY fecha";
			$resultado=mysql_query($consulta, $link)or die(mysql_error());
			echo '<table><tr><td></td><td>FECHA</td><td>Ingreso</td><td colspan="3">Cliente</td><td>Tipo</td></tr>';
			$c=1;
			while($registro= mysql_fetch_row($resultado))
			{
				$id=$registro[0];
				$tipo=$registro[3];
				$tiempo="";
				switch ($tipo) {
					case '0':
						$tiempo="Semanal";
						break;
					
					case '1':
						$tiempo="Mensual";
						break;
					
					case '2':
						$tiempo="Bimestral";
						break;

					case '3':
						$tiempo="Trimestral";
						break;
					
					case '4':
						$tiempo="Semestral";
						break;
					
					case '5':
						$tiempo="Anual";
						break;
				}
				$consulta= "SELECT paterno, materno, nombre FROM clientes WHERE id=".$id;
				$cliente=mysql_query($consulta, $link)or die(mysql_error());
				$cliente=mysql_fetch_row($cliente);
				echo '<tr><td>'.$c.'</td><td>'.$registro[1].'</td><td>'.$registro[2].'</td><td>'.$cliente[0].'</td><td>'.$cliente[1].'</td><td>'.$cliente[2].'</td><td>'.$tiempo.'</td></tr>';
				$c++;
			}
			echo "</table>";
		}
	?>
	</div>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
</body>
</html>