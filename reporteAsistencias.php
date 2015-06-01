<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Tavos Gym | Reporte Asistencias Instructores</title>
  <!-- CSS  -->
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body class="orange lighten-3">

<?php include 'navegacion.php';?>

	<div class="land"></div>
	<div class="container">
	<div class="card paddin-largo">	
		<div class="row"><h4 class="center-align">Reporte de Asistencias <i class="ion-ios-calendar-outline	"></i></h4></div>
		
	<?php
		echo 
		'<div class="row">
		<form action="reporteAsistencias.php" method="POST">
			
			<div class="col s6 m3">
				<label for="desde">Desde</label>
				<input id="desde" type="date" name="inicio" class="datepicker" >
			</div>
			<div class="col s6 m3">
			<label for="hasta">Hasta: </label>
			<input id="hasta" type="date" name="final" class="datepicker" >
			</div>
			<div class="col s6 m3">
				<div class="row"></div>
				<div class="row">
					<select name="opciones">
					<option>Todo</option>
					<option>Entradas</option>
					<option>Salidas</option>
				</select>
				</div>
			</div>
			<div class="col s6 m3">
			<div class="row"></div>
			<input class="btn-large light-blue darken-4" type="submit" value="Generar Reporte">
			</div>
		</form></div>';
		if(isset($_POST['inicio']))
		{
			date_default_timezone_set("America/Mexico_City");
			include("conexion.inc.php");
			$link=Conectarse();
			$inicio=$_POST['inicio'];
			$final=$_POST['final'];
			$ver=$_POST['opciones'];
			switch ($ver) {
				case 'Todo':
					$ver="";
					break;
				case 'Entradas':
					$ver="AND (accion=0)";
					break;
				case 'Salidas':
					$ver="AND (accion=1)";
					break;
			}
			if($inicio!=NULL)
			{
				$inicio="AND( fecha >= '".$inicio."' ";
				if($final!=NULL)
				{
					$final="AND fecha <= '".$final."' )";
				}
				else
				{
					$inicio.=")";
				}
			}
			else
			{
				if($final!=NULL)
				{
					$final="AND( fecha <= '".$final."' )";
				}
			}
			$consulta="SELECT asistencias.*, instructores.nombre, instructores.paterno, instructores.materno FROM asistencias, instructores WHERE (instructores.id = asistencias.id) ".$inicio.$final." ".$ver." ORDER BY asistencias.fecha, asistencias.hora";
			
			$resultado=mysql_query($consulta, $link)or die(mysql_error());
			echo '<table><tr><td></td><td>Fecha</td><td colspan=3>Instructor</td><td>Hora</td><tr><td></tr>';
			$c=1;
			while($registro= mysql_fetch_row($resultado))
			{
				if($registro[2]==0)
				{
					echo '<tr><td>'.$c.'</td><td>'.$registro[1].'</td><td>'.$registro[4].'</td><td>'.$registro[5].'</td><td>'.$registro[6].'</td><td>'.$registro[3].'</td><td>'.$registro[3].'</td><td>Entró</td></tr>';
				}
				else
				{
					echo '<tr><td>'.$c.'</td><td>'.$registro[1].'</td><td>'.$registro[4].'</td><td>'.$registro[5].'</td><td>'.$registro[6].'</td><td>'.$registro[3].'</td><td>'.$registro[3].'</td><td>Salió</td></tr>';
				}
				$c++;
			}
			echo "</table>";
		}
	?>
		</div>
	</div>

	<!--SCRIPTS-->
    <script src=" js/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
</body>
</html>