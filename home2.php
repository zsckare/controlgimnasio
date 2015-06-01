<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Tavos Gym</title>
	<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
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


			<div  class="col m4 offset-m1 card paddin-largo up-space">
				<h3 class="center">Cumpleaños Del Mes</h3>		
				
						<?php
					include("conexion.inc.php");
						date_default_timezone_set("America/Mexico_City");
						$link=Conectarse();
						$mesNum = date("m");
						$hoy = date("d");
						$result=mysql_query("SELECT * FROM clientes ",$link);
						echo '<div class="col s12 m6 ">';

						echo "<table>";
						echo '<tr><td colspan=2><h4 class="center">Clientes</h4></td></tr>';
						 echo '<tr><td><strong>Nombre</strong></td><td><strong>Dia</strong></td></tr>';
						while ($row = mysql_fetch_row($result)){ 
							$mesCliente = date("m" , strtotime($row[4]));
							if($mesNum==$mesCliente)
							{
								$dia=date("d", strtotime($row[4]));
								if($dia==$hoy)
								{
									echo "<tr><td>".'<h5 style="color:#ff6d00  ;" >'.$row[3]." ".$row[1]." ".$row[2]."</h5>"."</td><td>".'<h5 style="color:#ff6f00 ;" >'.$dia.'<i class="mdi-social-cake"></i>'."</h5>"."</td></tr>";
								}else{
									echo "<tr><td>".$row[3]." ".$row[1]." ".$row[2]."</td><td>".$dia."</td></tr>";
								}
							}
						}
						echo "</table> \n";echo '</div>';

						$result=mysql_query("SELECT * FROM instructores ",$link);
						echo '<div class="col s12 m6 ">';
						echo "<table>";
						echo '<tr><td colspan=2><h4 class="center">Instructores</h4></td></tr>';
						echo '<tr><td><strong>Nombre</strong></td><td><strong>Dia</strong></td></tr>';
						while ($row = mysql_fetch_row($result)){
							$mesCliente = date("m" , strtotime($row[4]));
							if($mesNum==$mesCliente)
							{
								$dia=date("d", strtotime($row[4]));
								if($dia==$hoy)
								{
									echo "<tr><td>".'<h5 class="pacifico" >'.$row[3]." ".$row[1]." ".$row[2]."</h5>"."</td><td>".'<h5>'.$dia.'<i class="mdi-social-cake"></i>'."</h5>"."</td></tr>";
								}else{
									echo "<tr><td>".$row[3]." ".$row[1]." ".$row[2]."</td><td>".$dia."</td></tr>";
								}
							}
						}
						echo "</table> \n";echo '</div>';
					?>
		</div>
		</div>


	</div>

	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="js/materialize.js"></script>
	<script src="js/init.js"></script>
	<script src ="js/ajax.js"></script>
</body>
</html>