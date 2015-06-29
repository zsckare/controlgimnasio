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
    <title>Administracion</title>

  <!-- CSS  -->
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

        <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
        <script src="js/sweetalert.min.js"></script>
<body class="orange lighten-3" >

<?php include 'navegacion.php';?>
    <div class="land"></div>
	<div class="container">
		<div class="card paddin-largo">
			<?php

	include("conexion.inc.php");
	$link=Conectarse();
	if(isset($_POST['a0']))
	{
		$numeros=true;
		foreach ($_POST as $elemento) {
			if(!is_numeric($elemento))$numeros=false;
		}
		if($numeros)
		{	
			$consulta="UPDATE costos SET a1=".$_POST['a0'].", a2=".$_POST['a1'].", a3=".$_POST['a2']." WHERE tipo=1";
			mysql_query($consulta, $link)or die(mysql_error());
			$consulta="UPDATE costos SET a1=".$_POST['b0'].", a2=".$_POST['b1'].", a3=".$_POST['b2']." WHERE tipo=2";
			mysql_query($consulta, $link)or die(mysql_error());
			$consulta="UPDATE costos SET a1=".$_POST['c0'].", a2=".$_POST['c1'].", a3=".$_POST['c2']." WHERE tipo=3";
			mysql_query($consulta, $link)or die(mysql_error());
			$consulta="UPDATE costos SET a1=".$_POST['d0'].", a2=".$_POST['d1'].", a3=".$_POST['d2']." WHERE tipo=4";
			mysql_query($consulta, $link)or die(mysql_error());
			$consulta="UPDATE costos SET a1=".$_POST['e0'].", a2=".$_POST['e1'].", a3=".$_POST['e2']." WHERE tipo=5";
			mysql_query($consulta, $link)or die(mysql_error());
			$consulta="UPDATE costos SET a1=".$_POST['f0'].", a2=".$_POST['f1'].", a3=".$_POST['f2']." WHERE tipo=6";
			mysql_query($consulta, $link)or die(mysql_error());
	
	
			$consulta="UPDATE costosspining SET e0=".$_POST['a3'].", e1=".$_POST['a4'].", e2=".$_POST['a5'].", e3=".$_POST['a6']." WHERE tipo=1";
			mysql_query($consulta, $link)or die(mysql_error());
			$consulta="UPDATE costosspining SET e0=".$_POST['b3'].", e1=".$_POST['b4'].", e2=".$_POST['b5'].", e3=".$_POST['b6']." WHERE tipo=2";
			mysql_query($consulta, $link)or die(mysql_error());
			$consulta="UPDATE costosspining SET e0=".$_POST['c3'].", e1=".$_POST['c4'].", e2=".$_POST['c5'].", e3=".$_POST['c6']." WHERE tipo=3";
			mysql_query($consulta, $link)or die(mysql_error());
			$consulta="UPDATE costosspining SET e0=".$_POST['d3'].", e1=".$_POST['d4'].", e2=".$_POST['d5'].", e3=".$_POST['d6']." WHERE tipo=4";
			mysql_query($consulta, $link)or die(mysql_error());
			$consulta="UPDATE costosspining SET e0=".$_POST['e3'].", e1=".$_POST['e4'].", e2=".$_POST['e5'].", e3=".$_POST['e6']." WHERE tipo=5";
			mysql_query($consulta, $link)or die(mysql_error());
			$consulta="UPDATE costosspining SET e0=".$_POST['f3'].", e1=".$_POST['f4'].", e2=".$_POST['f5'].", e3=".$_POST['f6']." WHERE tipo=6";
			mysql_query($consulta, $link)or die(mysql_error());
			echo '	<script type="text/javascript">alert("Cambios echos correctamente");</script>';
		}
		else
		{
			echo '	<script type="text/javascript">alert("No se han realizado los cambios\nVerifique los datos");</script>';
		}
	}


	$consulta1="SELECT * FROM costos";
	$consulta2="SELECT * FROM costosspining";
	$resultado1=mysql_query($consulta1, $link)or die(mysql_error());
	$resultado2=mysql_query($consulta2, $link)or die(mysql_error());
	$t1=mysql_fetch_row($resultado1);
	$t2=mysql_fetch_row($resultado2);
	echo '<div class="row">
			<h4 class="center-align">Costos de las Actividades</h4>
		</div>';
	echo '
		<form action="modificarCostos.php" method="post">
			
			<table class="striped">
				<tr>
					<td></td><td><h6>1 Actividad</h6></td><td><h6>2 Actividades</h6></td><td><h6>3 Actividades</h6></td>
					<td><h6>Solo Spining</h6></td><td><h6>Spining +1</h6></td><td><h6>Spining +2</h6></td><td><h6>Spining +3</h6></td>
				</tr>
				<tr>
					<td><h5>Semanal: </h5></td>
					<td><input type="text" name="a0" value="'.$t1[1].'"></td><td><input type="text" name="a1" value="'.$t1[2].'"></td><td><input type="text" name="a2" value="'.$t1[3].'"></td><td><input type="text" name="a3" value="'.$t2[4].'"></td><td><input type="text" name="a4" value="'.$t2[1].'"></td><td><input type="text" name="a5" value="'.$t2[2].'"></td><td><input type="text" name="a6" value="'.$t2[3].'">';
	$t1=mysql_fetch_row($resultado1);
	$t2=mysql_fetch_row($resultado2);
	echo '		</tr>
				<tr>
					<td><h5>Mensual: </h5></td>
					<td><input type="text" name="b0" value="'.$t1[1].'"></td><td><input type="text" name="b1" value="'.$t1[2].'"></td><td><input type="text" name="b2" value="'.$t1[3].'"></td><td><input type="text" name="b3" value="'.$t2[4].'"></td><td><input type="text" name="b4" value="'.$t2[1].'"></td><td><input type="text" name="b5" value="'.$t2[2].'"></td><td><input type="text" name="b6" value="'.$t2[3].'">';
	$t1=mysql_fetch_row($resultado1);
	$t2=mysql_fetch_row($resultado2);
	echo '		</tr>
				<tr>
					<td><h5>Bimestral: </h5></td>
					<td><input type="text" name="c0" value="'.$t1[1].'"></td><td><input type="text" name="c1" value="'.$t1[2].'"></td><td><input type="text" name="c2" value="'.$t1[3].'"></td><td><input type="text" name="c3" value="'.$t2[4].'"></td><td><input type="text" name="c4" value="'.$t2[1].'"></td><td><input type="text" name="c5" value="'.$t2[2].'"></td><td><input type="text" name="c6" value="'.$t2[3].'">';
	$t1=mysql_fetch_row($resultado1);
	$t2=mysql_fetch_row($resultado2);
	echo '		</tr>
				<tr>
					<td><h5>Trimestral: </h5></td>
					<td><input type="text" name="d0" value="'.$t1[1].'"></td><td><input type="text" name="d1" value="'.$t1[2].'"></td><td><input type="text" name="d2" value="'.$t1[3].'"></td><td><input type="text" name="d3" value="'.$t2[4].'"></td><td><input type="text" name="d4" value="'.$t2[1].'"></td><td><input type="text" name="d5" value="'.$t2[2].'"></td><td><input type="text" name="d6" value="'.$t2[3].'">';
	$t1=mysql_fetch_row($resultado1);
	$t2=mysql_fetch_row($resultado2);
	echo '		</tr>
				<tr>
					<td><h5>Semestral: </h5></td>
					<td><input type="text" name="e0" value="'.$t1[1].'"></td><td><input type="text" name="e1" value="'.$t1[2].'"></td><td><input type="text" name="e2" value="'.$t1[3].'"></td><td><input type="text" name="e3" value="'.$t2[4].'"></td><td><input type="text" name="e4" value="'.$t2[1].'"></td><td><input type="text" name="e5" value="'.$t2[2].'"></td><td><input type="text" name="e6" value="'.$t2[3].'">';
	$t1=mysql_fetch_row($resultado1);
	$t2=mysql_fetch_row($resultado2);
	echo '		</tr>
				<tr>
					<td><h5>Anual: </h5></td>
					<td><input type="text" name="f0" value="'.$t1[1].'"></td><td><input type="text" name="f1" value="'.$t1[2].'"></td><td><input type="text" name="f2" value="'.$t1[3].'"></td><td><input type="text" name="f3" value="'.$t2[4].'"></td><td><input type="text" name="f4" value="'.$t2[1].'"></td><td><input type="text" name="f5" value="'.$t2[2].'"></td><td><input type="text" name="f6" value="'.$t2[3].'">';
	echo '		</tr>
			</table>

			<div class="row">
				<div class="center">
					<input class="btn light-blue darken-4" type="submit" value="Actualizar Costos" required>
				</div>	
			</div>
		</form>';

	?>

		</div>
	</div>
	    <!--SCRIPTS-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
</body>
</html>