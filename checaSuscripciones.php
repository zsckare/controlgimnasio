<?php

	date_default_timezone_set("America/Mexico_City");
	include("conexion.inc.php");
	$link=Conectarse();
	$hoy=date("Y-m-d");
	$consulta = "SELECT id FROM suscripciones WHERE vence < '".$hoy."'";
	$resultado = mysql_query($consulta, $link)or die(mysql_error());
	$numbajas=mysql_num_rows($resultado);
	if($numbajas>0){
		echo '<table class="striped"><tr><td colspan=2><h4 class="center-align">Suscripciones Vencidas</h4></td><tr>';
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
	$consulta="SELECT clientes.nombre, clientes.paterno, clientes.materno, suscripciones.vence FROM clientes, suscripciones WHERE (clientes.id=suscripciones.id) AND (suscripciones.vence<='".$fechaprox."')";
	$resultado=mysql_query($consulta, $link)or die(mysql_error());
	$num=mysql_num_rows($resultado);
	if($num!=0)
	{
		echo '<table><tr><td colspan=3>Suscripciones Proximas a vencer:</td><tr>';
		echo '<tr><td></td><td>Cliente</td><td>Vence</td></tr>';
		$con=1;
		while ($cliente=mysql_fetch_row($resultado)) {
			echo '<tr><td>'.$con.'</td><td>'.$cliente[0].' '.$cliente[1].' '.$cliente[2].' </td><td>'.$cliente[3].'</td></tr>';
			$con++;
		}
		echo "</table>";
	}
?>