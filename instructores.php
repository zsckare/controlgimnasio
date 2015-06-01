<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tavos Gym | Instructores	</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>

  	<!-- CSS  -->
  	<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  	<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body class="orange lighten-3">
<?php include 'navegacion.php';?>


	<div class="land"></div>
	<div class="container">
		<div class="card paddin-largo up-space">
			<a href="registroInstructor.php" id="btn-agregar" class="btn-floating btn-large waves-effect waves-light blue tooltipped" data-position="left" data-delay="20" data-tooltip="Agregar Nuevo Instructor">
				<i class="large mdi-social-person-add"></i>
			</a>			
			<h3 class="center">Lista de Instructores <i class="mdi-action-account-child"></i></h3>
			<?php 
				include("conexion.inc.php");
				date_default_timezone_set("America/Mexico_City");
				$link=Conectarse();				
				$result=mysql_query("SELECT * FROM instructores ",$link);
					echo '<table class="striped	">';  
					echo "<tr>";  
					echo "</tr>";  
					while ($row = mysql_fetch_row($result)){   
					    echo "<tr>";  
					    echo "<td>$row[3] </td>";  
					    echo "<td>$row[1]</td>";  
					    echo "<td>$row[2]</td>";
					    echo '<td><a class="tooltipped" data-position="left" data-delay="20" data-tooltip="Ver Datos" href="verInstructor.php?id='.$row[0].'"'.'><h5 ><i class="small mdi-action-visibility"></i></h5></a></td>';
					    echo '<td><a class="tooltipped" data-position="right" data-delay="20" data-tooltip="Editar Datos" href="editarInstructor.php?id='.$row[0].'"'.'><h5 ><i class="small ion-compose"></i></h5></a></td>';
					    echo "</tr>";  
					}  
					echo "</table>"; 
			 ?>
		</div>
	</div>
	<!--SCRIPTS-->
    <script src=" js/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
</body>
</html>