<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Administracion</title>

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
		<div class="row">
			<h3 class="center-align be-white">Reportes <i class="ion-ios-paper-outline "></i> </h3>
		</div>
		<div class="row">

			<div class="espacio-izq">
				<a class="card paneles col s12 m5	 efecto-loco" href="reporteAsistencias.php">
					<div class="row up-space">
						<div class="col m12">
							<h3 class="center-align grande ion-ios-calendar-outline"></h3>
						</div>
					</div>
					<div class="row">
						<div class="col s12 m12">
							<h4 class="center-align">Reportes Asistencias</h4>
						</div>
					</div>
				</a>
				<a class="card paneles col s12 m5 offset-m1 efecto-loco	" href="reportesIngresos.php">
										<div class="row up-space">
						<div class="col m12">
							<h3 class="center-align grande ion-cash"></h3>
						</div>
					</div>
					<div class="row">
						<div class="col s12 m12">
							<h4 class="center-align">Reportes Ingresos</h4>
						</div>
					</div>
				</a>

			</div>
			
		</div>
	</div>

    <!--SCRIPTS-->
    <script src=" js/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
</body>
</html>