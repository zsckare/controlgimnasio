<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tavos Gym | Clientes</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>

  	<!-- CSS  -->
  	<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  	<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body class="orange lighten-3">
<?php include 'navegacion.php';?>	
			</div>
				<div class="fixed-action-btn">
				          <a class="btn-floating btn-large red">
				            <i class="large mdi-action-perm-identity"></i>
				          </a>
				          <ul>
				            <li><a class="btn-floating waves-circle waves-light res tooltipped" data-position="left" data-delay="15" data-tooltip="Renovar Subscripcion"><i class="large mdi-editor-attach-money"></i></a></li>
				            <li><a href="registroCliente.php" class="btn-floating waves-circle waves-light blue tooltipped" data-position="left" data-delay="15" data-tooltip="Registrar Nuevo Cliente" ><i class="large mdi-content-add-circle-outline"></i></a></li>
				          </ul>
				</div>
			</div>
<div class="land"></div>
	<div class="container">
		<div class="card paddin-largo up-space">
			<div id="btn-agregar" class="btn-floating btn-large waves-effect waves-light blue">
				<i class="large mdi-social-person-add"></i>
			</div>
			<h3 class="center">Lista de Clientes <i class="mdi-action-account-child"></i></h3>
			<?php 
				include("conexion.inc.php");
				
				date_default_timezone_set("America/Mexico_City");
				$link=Conectarse();				
				$result=mysql_query("SELECT * FROM clientes ",$link);
					echo '<table class="striped centered">';  
					echo "<tr>";  
					echo "<td><strong>Nombre (s)</strong></td>";
					echo '<td><strong>Apellidos</strong></td>';  
					echo "<td><strong>Detalles</strong></td>";
					echo "</tr>";  
					while ($row = mysql_fetch_row($result)){   
					    echo "<tr>";  
					    echo "<td>$row[3] </td>";  
					    echo "<td>$row[1] $row[2]</td>";  
					    echo '<td><a href="verCliente.php?id='.$row[0].'"'.'><h5 ><i class="small mdi-action-search"></i></h5></a></td>';
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