<?php 
session_start();
	if(isset($_SESSION['user_access'])){

    }
    else{
     header("Location: ../index.php");
    } 
    ?><!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Tavos Gym | Registro Cliente</title>

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
			<div class="row">
                    <div class="col m2 s12"><a href="suscripciones.php" class="btn-floating tooltipped" data-position="bottom" data-delay="50" data-tooltip="Regresar"><i class="mdi-navigation-arrow-back"></i>Regresar</a></div>
                    <div class="col m6 s12 offset-m1  "><h3 class="center">Nuevo Cliente</h3></div>
                  </div>
			<div class="row">

				<form action="" method="POST" class="col m12" enctype="multipart/form-data">
					<div class="row">
						<div class="input-field col s4">
							<input id="nom" type="text" class="validate" name="nombre" required>
         				 <label for="nom">Nombre</label>
						</div>
						<div class="input-field col s4">
							<label for="ap" >Apellido Paterno</label>
							<input id="ap" type="text" name="paterno" required>
						</div>
						<div class="input-field col s4">
							<label for="am" >Apellido Materno</label>
							<input id="am" type="text" name="materno" required>
						</div>
					</div><!--Nombre-->
					<div class="row">
						<div class="col s6">
							<label for="fecha">Fecha de Nacimiento</label>
							<input id="fecha" type="date" name="nacimiento" class="datepicker" required>
						</div>
						<div class="col s6">
							<label>Sexo</label>
							<select name="sexo" required>

								<option value="masculino">Masculino</option>
								<option value="Femenino">Femenino</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s6">
							<label for="tel" >Telefono:</label>
							<input id="tel" type="text" name="telefono" required>
						</div>
						<div class="input-field col s6">
							<label for="ocu">Ocupacion:</label>
							<input id="ocu" type="text" name="ocupacion" required>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s5">
							<label for="call">Calle</label>
							<input id="call" type="text" name="calle" required>

						</div>
						<div class="input-field col s1">
							<label for="num">Numero</label>
							<input id="num" type="number" name="numero" required>
						</div>
						<div class="input-field col s6">
							<label for="fra">Colonia/Fraccionamiento</label>
							<input id="fra" type="text" name="colonia" required>
						</div>
					</div>
					<div class="row">
						<div class="file-field input-fieldcol s5">
							<input class="file-path validate" type="text"/>
						      <div class="btn light-blue darken-4">
						        <span>Foto</span>
						        <input type="file"name="imagen"/>
						      </div>
							
						</div>
					</div>
					<div class="row">
						<div class="center">
							<input class="light-blue darken-4 btn " type="submit" value="Registrar" required>
						</div>	
					</div>
				</form>
			</div>
		</div>
		
	</div>


	<?php
		
		if(isset($_POST['paterno']))
		{
			$phat="img/";
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
			$archivo=$_FILES['imagen']['name'];
            $phat = $phat . basename( $_FILES['imagen']['name']);
            $mover=move_uploaded_file($_FILES['imagen']['tmp_name'], $phat);
			if($mover)
			{

				$genero=0;
				if($sexo=="Masculino")
				{
					$genero=1;
				}
				include("conexion.inc.php");
				$link=Conectarse();
				$cpaterno = mysql_query("SELECT * FROM clientes WHERE (paterno='".$paterno."' && materno='".$materno."' && nombre='".$nombre."' && fechanac='".$fecha."')")or die(mysql_error());
				list($con)=mysql_fetch_array($cpaterno);				
				if($con)
				{
					echo '<script type="text/javascript">sweeAlert("ESTA PERSONA YA ESTA REGISTRADA DIRIJASE A SUSCRIPCIONES :)","","info");</script>';
				}
				else
				{
					$insertar="INSERT INTO clientes  VALUES ( null,'$paterno', '$materno', '$nombre', '$fecha', '$calle', '$numero', '$colonia', '$genero', '$telefono', '$ocupacion','0','$phat' )";
					mysql_query($insertar)or die(mysql_error());
					echo '<script type="text/javascript">sweetAlert("REGISTRADO :)","","success");</script>';
					?>
						<SCRIPT LANGUAJE="javascript">
							location.href="suscripciones.php";
						</SCRIPT>
					<?php
				}

			}
			else
			{
				echo "Fallo al mover";
			}

		}
	?>
	<!--SCRIPTS-->
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
</body>
</html>