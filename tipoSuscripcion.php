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
    <title>Tavos Gym | Renovar Suscripcion</title>

  <!-- CSS  -->
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

        <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
        <script src="js/sweetalert.min.js"></script>
<body class="orange lighten-3" >
<?php include 'navegacion.php';?>
    <div class="land"></div>
    <div class="container">
        <div class="card paddin-largo up-space">
	<?php

			date_default_timezone_set("America/Mexico_City");
			include("conexion.inc.php");
			$link=Conectarse();

		if(isset($_GET['id']))
		{
			$id=$_GET['id'];
			$consulta = "SELECT nombre, paterno, materno FROM clientes WHERE id='".$id."'";
			$resultado = mysql_query($consulta, $link);
			$cliente=mysql_fetch_row($resultado);
			$nombre= $cliente[0]." ".$cliente[1]." ".$cliente[2];

			echo "<h3>Suscripcion de:".$cliente[0]." ".$cliente[1]." ".$cliente[2]."</h3><br>";
			echo '<form action="tipoSuscripcion.php" method="POST">';
			echo '<input type="hidden" value="'.$id.'" name="id">';
			echo '
<div class="row">
				<div class="col m6 s12">
					<h5 class="center-align">Actividades a registrar:</h5>
				</div>
			</div>
			<div class="row">
				<div class="col m8 s12">
					<div class="row">
					<p class="col m3 s12">
				      <input type="checkbox" value="1" name="spi" id="test5" />
				      <label for="test5">Spining</label>
				    </p>
				    <p class="col m3 s12">
				      <input type="checkbox" value="1" name="pes" id="test6"/>
				      <label for="test6">Pesas</label>
				    </p>
				    <p class="col m3 s12">
				      <input type="checkbox" value="1" name="zum" id="filled-in-box"/>
				      <label for="filled-in-box">Zumba</label>
				    </p>
				    <p class="col m3 s12">
				      <input type="checkbox" value="1" name="kic" id="test7"/>
				      <label for="test7">KickBoxing</label>
				    </p>	
					</div>
					

				</div>
			</div>
			<div class="row">
				<div class="row">
					<div class="col m6 s12">
						<h5 class="center-align">Tipo de Suscripcion:</h5>
					</div>
				</div>
				<div class="row">
					<p class="col s6 m2">
				      <input name="tipo" type="radio" id="radiotest1" />
				      <label for="radiotest1">Semanal</label>
				    </p>
				    <p class="col s6 m2">
				    	<input type="radio" value="2" name="tipo" id="radiotest2" checked>
				    	<label for="radiotest2">Mensual</label>
				    </p>
				    <p class="col s6 m2">
				    	<input type="radio" value="3" name="tipo" id="radiotest3">
				    	<label for="radiotest3">Bimestral</label>
				    </p>
				    <p class="col s6 m2">
				    	<input type="radio" value="4" name="tipo" id="radiotest4">
				    	<label for="radiotest4">Trimestral</label>
				    </p>
				    <p class="col s6 m2">
				    	<input type="radio" value="5" name="tipo" id="radiotest5">
						<label for="radiotest5">Semestral</label>
				    </p>
				    <p class="col s6 m2">
				    	<input type="radio" value="6" name="tipo" id="radiotest6">
				    	<label for="radiotest6">Anual</label>
				    </p>
			
				</div>

			</div>

			<div class="row">
				<div class="col m6 s12">
				<div class="row"></div>
				<div class="row"></div>
				<div class="row"></div>
					<div class="row">
						<div class="col m6"><h5>Costo especial: $</h5></div>
						<div class="col m6"><input type="text"  name="costo"></div>
					</div>
				
				</div>
			<div class="col m6 s12">
				<div class="row">
					<div class="input-field col s12">
						<textarea name="motivo" id="textarea1" class="materialize-textarea"></textarea>
						<label for="textarea1">Motivo del Costo Especial</label>
					</div>
				</div>
				
			</div>
			</div>
			<div class="row">
				<div class="center-align"><input class="btn" type="submit" value="Registrar"></div>
			</div>
			
			';
			echo "</form>";
			echo '</form>';
		}
		elseif(isset($_POST['id']))
		{
			$id=$_POST['id'];
			$spi=0;
			$pes=0;
			$zum=0;
			$kic=0;
			if(isset($_POST['spi'])) $spi=1;
			if(isset($_POST['pes'])) $pes=1;
			if(isset($_POST['zum'])) $zum=1;
			if(isset($_POST['kic'])) $kic=1;
			if($spi==0 && $pes==0 && $zum==0 && $kic==0)
			{
				echo '<script type="text/javascript">alert("No selecciono ninguna actividad")</script>';
				echo '<script type="text/javascript">location.href="tipoSuscripcion.php?id='.$id.'"</script>';
			}
			$extras=$pes+$zum+$kic;
			$tipo = $_POST['tipo'];
			$costo=$_POST['costo'];
			$inicio=date("Y-m-d");
			$motivo="";
			if(isset($_POST['motivo']))$motivo=$_POST['motivo'];
			$vence="";
			switch ($tipo) {
				case 1:
					$vence='+1 week';
					break;
				case 2:
					$vence='+1 month';
					break;
				case 3:
					$vence='+2 month';
					break;
				case 4:
					$vence='+3 month';
					break;
				case 5:
					$vence='+6 month';
					break;
				case 6:
					$vence='+12 month';
					break;
			}
			$vence=date("Y-m-d", strtotime($vence));
			if($costo==NULL)
			{
				$consulta="";
				if($spi==1)
				{
					$consulta="SELECT * FROM costosspining WHERE tipo = '$tipo'";
				}else
				{
					$consulta="SELECT * FROM costos WHERE tipo = '$tipo'";
				}
					$resultado = mysql_query($consulta, $link);
					$registro= mysql_fetch_row($resultado);
					$costo=$registro[$extras];
			}
			$consulta="INSERT INTO suscripciones(id, inicio, vence, costo, spining, pesas, zumba, kickboxing, tipo, motivo) VALUES(".$id.", '".$inicio."', '".$vence."', ".$costo.", ".$spi.", ".$pes.", ".$zum.", ".$kic.", ".$tipo.", '".$motivo."')";
			mysql_query($consulta, $link)or die(mysql_error());
			$consulta="UPDATE clientes SET activo=1 WHERE id=".$id;
			mysql_query($consulta, $link) or die(mysql_error());
			$consulta="INSERT INTO ingresos(id, fecha, cantidad, tipo) VALUES (".$id.", '".$inicio."', ".$costo.", ".$tipo." )";
			mysql_query($consulta, $link)or die(mysql_error());
			echo '<script type="text/javascript">sweetAlert("Datos registrados","","success")</script>';
			echo '<script type="text/javascript">location.href="suscripciones.php"</script>';
		}
	?>
 </div> </div>
</body>
</html>