<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tavos Gym</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/materialize.css">
	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>
<body class="orange lighten-3" >
	<div class="land">
		<div class="center-align">
			<img class="white circle" src="img/logo.png" alt="">		
		</div>
	</div>

	<div class="container">
		<div class="row ">
		<div class="card col s10 m10 l10 offset-s1 offset-m1 offset-l1" style="margin-top:15em; padding:3em;">
			<form action="auth/login.php" method="POST">
				<div class="row">
					<div class="input-field col s8 m8 l8 offset-s2 offset-m2 offset-l2 ">
					<i class=" ion-person prefix"></i>
						<input type="text" id="name" name="username" >
						<label for="name">Usuario</label>
					</div>					
				</div>
				<div class="row">
					<div class="input-field col s8 m8 l8 offset-s2 offset-m2 offset-l2 ">
						<i class="ion-key prefix "></i>
						<input type="password" id="psw" name="userpwd">
						<label for="psw">Contraseña</label>
					</div>
				</div>
				<div class="row">
					<div class="center">
						<input type="submit" class="btn" value="Entrar">
					</div>
				</div>
				
			</form>
		</div>
	

	</div>
	</div>


    <script src=" js/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
</body>
</html>