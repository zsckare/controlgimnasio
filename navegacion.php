
<?php
$acceso=$_SESSION['user_access'];
$acs=trim($acceso);

$a='class=""';
$b='class=""';
$c='class=""';
$d='class=""';
$seccion="";
$archivo_actual = basename($_SERVER['PHP_SELF']); //Regresa el nombre del archivo actual
switch($archivo_actual) //Valido en que archivo estoy para generar mi CSS de selección
 {
   case "home.php":
   $a = 'class="activo"';
   break;
   case "checarAsistencia.php":
   $b = ' class="activo"';
   break;
  case "reportes.php":
   $c = ' class="activo"';
   break;
     case "reporteAsistencias.php":
   $c = ' class="activo"';
   break;
     case "reportesIngresos.php":
   $c = ' class="activo"';
   break;
     case "administrar.php":
   $d = ' class="activo"';
   break;


 }
 ?>


  <link href="css/ionicons.css" rel="stylesheet" type="text/css" />
	<nav class="light-blue darken-4"	>
	  <div class="nav-wrapper container ">
	    <a href="home.php" class="brand-logo pacifico	">Tavo's Gym</a>
	          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="ion-android-apps"></i></a>
	    <ul class="right hide-on-med-and-down">
	      <!-- Dropdown Trigger -->
	      <li <?php echo $a; ?>  ><a href="home.php"><i class="ion-home left"></i>Inicio </a></li>
	      <li <?php echo $b; ?>  ><a href="checarAsistencia.php"><i class="ion-clock left" ></i> Checador</a></li>
	      <li <?php echo $c; ?>  ><a href="reportes.php"><i class="ion-android-document left"></i>Reportes</a></li>
	      <?php 
	      if ($acceso==1) {
	      	echo '<li '.$d .'><a href="administrar.php"><i class="ion-ios-cog-outline left"></i>Administración</a></li>';
	      }
	       ?>
	      
	      <li><a href="auth/logout.php">Cerrar Sesion <i class="left ion-log-out"></i> </a></li>
	    </ul>
	    <ul class="side-nav" id="mobile-demo">
	      <li><a href="home.php"><i class="ion-home left"></i>Inicio</a></li>
	      <li><a href="checarAsistencia.php"><i class="ion-clock left" ></i> Checador</a></li>
	      <li><a href="reportes.php"><i class="ion-android-document left"></i>Reportes</a></li>
	      <li><a href="administrar.php"><i class="ion-ios-cog-outline left"></i>Administración</a></li>
	    </ul>
	  </div>
	</nav>