<?php 
session_start();
	if(isset($_SESSION['user_access'])){

    }
    else{
     header("Location: ../index.php");
    } 
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Tavos Gym | Suscripciones</title>
  <!-- CSS  -->
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body class="orange lighten-3">

<?php include 'navegacion.php';?>

	<div class="land"></div>
	<div class="container">
		<div class="card paddin-largo">
			<a href="registroCliente.php" id="btn-agregar" class="btn-floating btn-large waves-effect waves-light blue tooltipped" data-position="left" data-delay="20" data-tooltip="Agregar Nuevo Cliente">
				<i class="large mdi-social-person-add"></i>
			</a>
		<?php
		include("conexion.inc.php");
		$link=Conectarse();
		$consulta="";
		if(isset($_GET['todos']))
		{
			$consulta = "SELECT id, paterno, materno, nombre, activo  FROM clientes ";
		}
		elseif(isset($_POST['paterno'])||isset($_POST['materno'])||isset($_POST['nombre']))
		{
			$paterno="";
			$materno="";
			$nombre="";
			$detalles="";
			if($_POST['paterno']!=NULL)$paterno=" paterno LIKE '".$_POST['paterno']."'";
			if($_POST['materno']!=NULL)$materno="materno LIKE '".$_POST['materno']."'";
			if($_POST['nombre']!=NULL)$nombre=" nombre LIKE  '".$_POST['nombre']."'";
			$detalles=$detalles.$paterno;
			if(($_POST['materno']!=NULL || $_POST['nombre']!=NULL) && $_POST['paterno']!=NULL)$detalles=$detalles." AND ";
			$detalles.=$materno;
			if(($_POST['materno']!=NULL || $_POST['paterno']!=NULL) && $_POST['nombre']!=NULL)$detalles.=" AND ";
			$detalles.=$nombre;
			$consulta = "SELECT id, paterno, materno, nombre, activo FROM clientes WHERE (".$detalles.")";
		}
		else
		{
			$consulta = "SELECT id, paterno, materno, nombre ,activo FROM clientes WHERE activo = 0";
		}
		echo '<h3 class="center">Lista de Clientes <i class="mdi-action-account-child"></i></h3>';	
		echo '	<div class="row">
		<div class="col s12 m6 center-align espacio-abajo">
			

			<form action="suscripciones.php" method="GET">
			<input type="hidden" value="1" name="todos" visible="not">
			<input class="light-blue darken-4 btn" type="submit" value="Ver Todos Los Clientes">
			</form>
		</div>';
		echo '
		<div class="col m6 s12 center-align espacio-abajo">
			<form action="suscripciones.php" >
				<input class="light-blue darken-4 btn" type="submit" value="Ver Solo sin Suscripcion">
			</form>
		</div>';

		echo "</div>	";
		$resultado = mysql_query($consulta)or die(mysql_error());

			echo "<table>";

			while($registro = mysql_fetch_row($resultado))
			{
				if ($registro[4]==0)
				{
					echo '<tr><td>'.$registro[1].' '.$registro[2].' '.$registro[3].'</td><td><a class="inscribir" href="tipoSuscripcion.php?id='.$registro[0].'">Inscribir</a></td>'.'</td><td><a class="tooltipped" data-position="left" data-delay="20" data-tooltip="Ver Datos" href="verCliente.php?id='.$registro[0].'"'.'><h5 ><i class="small mdi-action-visibility"></i></h5></a></td>'.'</td><td><a class="tooltipped" data-position="right" data-delay="20" data-tooltip="Editar Cliente" href="editarCliente.php?id='.$registro[0].'"'.'><i class="small ion-compose"></i></a></td><td><a class="tooltipped" data-position="right" data-delay="20" data-tooltip="Eliminar"  href="eliminarcliente.php?id='.$registro[0].' "><i class="small ion-trash-a"></i></a></td></tr>';
				}
				else
				{
					echo '<tr><td>'.$registro[1].' '.$registro[2].' '.$registro[3].'</td><td></td>'.'</td><td><a class="tooltipped" data-position="left" data-delay="20" data-tooltip="Ver Datos"  href="verCliente.php?id='.$registro[0].'"'.'><h5 ><i class="small mdi-action-visibility"></i></h5></a></td>'.'</td><td><a class="tooltipped" data-position="right" data-delay="20" data-tooltip="Editar Cliente" href="editarCliente.php?id='.$registro[0].'"'.'><i class="small ion-compose"></i></a></td></tr>';
				}
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