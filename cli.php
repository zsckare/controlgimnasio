<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Tavos Gym | Registro Cliente</title>

  <!-- CSS  -->
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<body>
	<div class="container">
		<div class="card paddin-largo">
			<div class="row">

				<form action="registroCliente.php" method="POST" class="col m12">
					<div class="row">
						<div class="input-field col s4">
							<input id="nom" type="text" class="validate" name="nombre">
         				 <label for="nom">Nombre</label>
						</div>
						<div class="input-field col s4">
							<label for="ap" >Apellido Paterno</label>
							<input id="ap" type="text" name="paterno">
						</div>
						<div class="input-field col s4">
							<label for="am" >Apellido Materno</label>
							<input id="am" type="text" name="materno">
						</div>
					</div><!--Nombre-->
					<div class="row">
						<div class="col s6">
							<label for="fecha">Fecha de Nacimiento</label>
							<input id="fecha" type="date" name="nacimiento" class="datepicker" >
						</div>
						<div class="col s6">
							<label>Sexo</label>
							<select name="sexo">

								<option>Masculino</option>
								<option>Femenino</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s6">
							<label for="tel" >Telefono:</label>
							<input id="tel" type="text" name="telefono">
						</div>
						<div class="input-field col s6">
							<label for="ocu">Ocupacion:</label>
							<input id="ocu" type="text" name="ocupacion">
						</div>
					</div>
					<div class="row">
						<div class="input-field col s5">
							<label for="call">Calle</label>
							<input id="call" type="text" name="calle">

						</div>
						<div class="input-field col s1">
							<label for="num">Numero</label>
							<input id="num" type="number" name="numero">
						</div>
						<div class="input-field col s6">
							<label for="fra">Colonia/Fraccionamiento</label>
							<input id="fra" type="text" name="colonia">
						</div>
					</div>
					<div class="row">
						<div class="center">
							<input class="btn" type="submit" value="Registrar">
						</div>	
					</div>
				</form>
			</div>
		</div>
		
	</div>


	<?php
		if(isset($_POST['paterno']))
		{
			$paterno=trim($_POST['paterno']);
			$materno=trim($_POST['materno']);
			$nombre=trim($_POST['nombre']);
			$fecha=date("Y-m-d", strtotime($_POST['nacimiento']));
			$sexo=trim($_POST['sexo']);
			$telefono=trim($_POST['telefono']);
			$calle=trim($_POST['calle']);
			$numero=trim($_POST['numero']);
			$colonia=trim($_POST['colonia']);
			$ocupacion=trim($_POST['ocupacion']);
			echo $colonia;
			if($paterno != NULL && $materno != NULL && $nombre != NULL && $fecha != NULL &&
				$sexo != NULL && $telefono != NULL && $calle != NULL && $numero != NULL && $colonia!= NULL)
			{
				$genero=0;
				if($sexo=="Masculino")
				{
					$genero=1;
				}
				include("conexion.inc.php");
				$link=Conectarse();
				$cpaterno = mysql_query("SELECT * FROM clientes WHERE (paterno='".$paterno."' && materno='".$materno."' && nombre='".$nombre."' && fechanac='".$fecha."')")or die(mysql_error());
				$con=mysql_fetch_array($cpaterno);
				echo $con[0];
				$existe = mysql_num_rows($cpaterno);
				if($existe>=1)
				{
					echo '<script type="text/javascript">alert("ESTA PERSONA YA ESTA REGISTRADA DIRIJASE A SUSCRIPCIONES :)");</script>';
				}
				else
				{
					$insertar="INSERT INTO clientes (paterno, materno, nombre, fechanac, calle, numcasa, colonia, genero, telefono, ocupacion ) VALUES ( '".$paterno."', '".$materno."', '".$nombre."', '".$fecha."', '".$calle."', ".$numero.", '".$colonia."', ".$genero.", ".$telefono.", '".$ocupacion."')";
					mysql_query($insertar)or die(mysql_error());
					echo '<script type="text/javascript">alert("REGISTRADO :)");</script>';
					?>
						<SCRIPT LANGUAJE="javascript">
							location.href="registroCliente.php";
						</SCRIPT>
					<?php
				}
			}
			else
			{
				echo '<script type="text/javascript">alert("FALTO LLENAR ALGUN CAMPO :)");</script>';
			}
		}
	?>
	<!--SCRIPTS-->
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="js/materialize.js"></script>
	<script src="js/init.js"></script>
</body>
</html>