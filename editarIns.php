<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <!-- CSS  -->
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
    <script src="js/sweetalert.min.js"></script>
</head>
<body>

    <?php
  $id=$_POST['id'];
  $paterno=trim($_POST['paterno']);
  $materno=trim($_POST['materno']);
  $nombre=trim($_POST['nombre']);
  $fecha=date("Y-m-d", strtotime($_POST['nacimiento']));
  $sexo=trim($_POST['sexo']);
  $telefono=trim($_POST['telefono']);
  $calle=trim($_POST['calle']);
  $numero=trim($_POST['numero']);
  $colonia=trim($_POST['colonia']);
  $salario=trim($_POST['salario']);

  include ("conexion.inc.php");
  $link=Conectarse();
          $genero=0;
        if($sexo=="Masculino")
        {
          $genero=1;
        }
$sSQL="UPDATE `gimnasio`.`instructores` SET `paterno` = '$paterno',
`materno` = '$materno',
`nombre` = '$nombre',
`fechanac` = '$fecha',
`calle` = '$calle',
`numcasa` = '$numero',
`colonia` = '$colonia',
`genero` = '$genero',
`telefono` = '$telefono',
`salario` = '$salario' WHERE `instructores`.`id` =3 LIMIT 1  ";
 #$sSQL="UPDATE `gimnasio`.`instructores` SET `paterno` = '$paterno', `materno` = '$materno', `nombre` = '$nombre', `fechanac` = '$fecha', `calle` = '$calle', `numcasa` = '$numero', `colonia` = '$colonia', `genero` = '$genero', `telefono` = '$telefono', `salario` = '$salario' WHERE `instructores`.`id` = $id LIMIT 1";
  mysql_query($sSQL)or die(mysql_error()); 
  echo '
  <SCRIPT LANGUAJE="javascript">
    sweetAlert("Datos Actualizados","","success");
    location.href="instructores.php";
  </SCRIPT>
    
  ';
  ?>
    <script src=" js/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
</body>
</html>