<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Tavos Gym</title>
  <!-- CSS  -->
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body class="orange lighten-3">

<?php include 'navegacion.php';?>

	<div class="land"></div>
	<div class="container">

		<div class="row">
			<div class="col m7 card up-space paddin-largo" >
				<h3 class="center-align">Buscar Cliente</h3>
				<div class="row">
					<div class="col m8 offset-m2 center-align">
						<form>
					        <div class="input-field">
					          <input id="buscar" type="search" required>
					          <label for="buscar"><i class="mdi-action-search"></i></label>
					          <i class="mdi-navigation-close"></i>
					        </div>
					    </form>
					</div>
				</div>
				<div class="row">
					
						<div id="resultados"class="col m10"></div>
					
				</div>
			</div>


			<div  class="col m4 offset-m1 up-space">
				<div class="row">
					<a href="#modal1" style="height:170px;" class="modal-trigger col m12 s12 center-align card altura">
						<h3 class="ion-android-calendar"></h3>
						<p>Ver Estado de las  Suscripciones</p>
					</a>
				</div>
				<div class="row">
					<a href="#modal2" class="modal-trigger col m12 s12 center-align card altura" style="height:170px;">
						<h3 class="mdi-social-cake"></h3>
						<p class="lato">Ver Cumpleaños</p>
					</a>
				</div>
			</div>
		</div>


	</div>
	 <div id="modal1" class="modal">
    <div class="modal-content">

      <h3 class="center">Estado de las Suscripciones</h3>	

      <?php

	date_default_timezone_set("America/Mexico_City");
	include("conexion.inc.php");
	$link=Conectarse();
	$hoy=date("Y-m-d");
	$consulta = "SELECT id FROM suscripciones WHERE vence < '".$hoy."'";
	$resultado = mysql_query($consulta, $link)or die(mysql_error());
	$numbajas=mysql_num_rows($resultado);
	if($numbajas>0){
		echo '<table class="striped"><tr><td colspan=2><h5 class="center-align">Suscripciones Vencidas:</h5></td><tr>';
		$con=1;
		while ($registro=mysql_fetch_row($resultado)) {
			$id=$registro[0];
			$consulta="SELECT nombre, paterno, materno FROM clientes WHERE id=".$id;
			$resultado2=mysql_query($consulta, $link)or die(mysql_error());
			$baja=mysql_num_rows($resultado2);
			if ($baja==1) {
				$cliente=mysql_fetch_row($resultado2);
				echo '<tr><td>'.$con.'</td><td>'.$cliente[0].' '.$cliente[1].' '.$cliente[2].' </td></tr>';
			}
			$clientes=mysql_num_rows($resultado2);
			$consulta = "UPDATE clientes SET activo=0 WHERE id=".$id;
			mysql_query($consulta, $link)or die(mysql_error());
			$consulta = "DELETE FROM suscripciones WHERE id=".$id;
			mysql_query($consulta, $link)or die(mysql_error());
			$con++;
		}
		echo "</table>";
	}
	$fechaprox=date("Y-m-d", strtotime('+1 week'));

	$consulta="SELECT clientes.nombre, clientes.paterno, clientes.materno, suscripciones.vence, clientes.prox FROM clientes, suscripciones WHERE (clientes.id=suscripciones.id) AND (suscripciones.vence<='".$fechaprox."')";
	$resultado=mysql_query($consulta, $link)or die(mysql_error());
	$num=mysql_num_rows($resultado);

	if($num!=0)
	{
		echo '<table class="striped"><tr><td colspan=3><h5 class="center-align">Suscripciones Proximas a vencer:</h5></td><tr>';
		echo '<tr><td></td><td>Cliente</td><td>Vence</td></tr>';
		$con=1;
		while ($cliente=mysql_fetch_row($resultado)) {
			
			echo '<tr><td>'.$con.'</td><td>'.$cliente[0].' '.$cliente[1].' '.$cliente[2].' </td><td>'.$cliente[3].'</td></tr>';
			$cliente[4]++;
			$con++;
		}
		echo "</table>";
	}
?>
    </div>

  </div>
  	 <div id="modal2" class="modal">
    <div class="modal-content">
<h3 class="center">Cumpleaños Del Mes</h3>		

						<?php
					
						date_default_timezone_set("America/Mexico_City");
						
						$mesNum = date("m");
						$hoy = date("d");
						$resulta=mysql_query("SELECT * FROM clientes ",$link);
						echo '<div class="col s12 m6 ">';

						echo "<table>";
						echo '<tr><td colspan=2><h4 class="center">Clientes</h4></td></tr>';
						 echo '<tr><td><strong>Nombre</strong></td><td><strong>Dia</strong></td></tr>';
						while ($row = mysql_fetch_row($resulta)){ 
							$mesCliente = date("m" , strtotime($row[4]));
							if($mesNum==$mesCliente)
							{
								$dia=date("d", strtotime($row[4]));
								if($dia==$hoy)
								{
									echo "<tr><td>".'<h5 class="pacifico"  style="color:#82b1ff;" >'.$row[3]." ".$row[1]." ".$row[2]."</h5>"."</td><td>".'<h5  style="color:#82b1ff;"" >'.$dia.'<i class="mdi-social-cake"></i>'."</h5>"."</td></tr>";
								}else{
									echo "<tr><td>".$row[3]." ".$row[1]." ".$row[2]."</td><td>".$dia."</td></tr>";
								}
							}
						}
						echo "</table> \n";echo '</div>';

						$result2=mysql_query("SELECT * FROM instructores ",$link);
						echo '<div class="col s12 m6 ">';
						echo "<table>";
						echo '<tr><td colspan=2><h4 class="center">Instructores</h4></td></tr>';
						echo '<tr><td><strong>Nombre</strong></td><td><strong>Dia</strong></td></tr>';
						while ($row = mysql_fetch_row($result2)){
							$mesCliente = date("m" , strtotime($row[4]));
							if($mesNum==$mesCliente)
							{
								$dia=date("d", strtotime($row[4]));
								if($dia==$hoy)
								{
									echo "<tr><td>".'<h5 class="pacifico" style="color:#82b1ff;">'.$row[3]." ".$row[1]." ".$row[2]."</h5>"."</td><td>".'<h5  style="color:#82b1ff;">'.$dia.'<i class="mdi-social-cake"></i>'."</h5>"."</td></tr>";
								}else{
									echo "<tr><td>".$row[3]." ".$row[1]." ".$row[2]."</td><td>".$dia."</td></tr>";
								}
							}
						}
						echo "</table> \n";echo '</div>';
					?>
    </div>

  </div>


	
	
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script><script src ="js/ajax.js"></script>
</body>
</html>