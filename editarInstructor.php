<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Tavos Gym  | Editar Cliente</title>
  <!-- CSS  -->
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body class="orange lighten-3">

<?php include 'navegacion.php';?>

	<div class="land"></div>
  <div class="container">
    <div class="card paddin-largo">
      
          <?php 
             include("conexion.inc.php");
                $id = $_GET['id'];
                $link=Conectarse();             
                 $result=mysql_query("SELECT * FROM instructores WHERE id = '$id' LIMIT 1",$link);
                 $row = mysql_fetch_row($result);

                  echo '  
                  <div class="row">
                    <div class="col m2 s12"><a href="instructores.php" class="btn-floating tooltipped" data-position="bottom" data-delay="50" data-tooltip="Regresar"><i class="mdi-navigation-arrow-back"></i>Regresar</a></div>
                    <div class="col m6 s12 offset-m1  "><h3 class="center">Editar Datos del Cliente</h3></div>
                  </div>
        <div class="row">

        <form action="editarIns.php" method="POST" class="col m12" enctype="multipart/form-data">
      <input type="hidden" value="'.$id.'" name="id">
          <div class="row">
            <div class="input-field col s4">
              <input id="nom" type="text" class="validate" name="nombre" value="'.$row[3].'">
                 <label for="nom">Nombre</label>
            </div>
            <div class="input-field col s4">
              <label for="ap" >Apellido Paterno</label>
              <input id="ap" type="text" name="paterno" value="'.$row[1].'" >
            </div>
            <div class="input-field col s4">
              <label for="am" >Apellido Materno</label>
              <input id="am" type="text" name="materno" value="'.$row[2].'"  >
            </div>
          </div><!--Nombre-->
          <div class="row">
            <div class="col s6">
              <label for="fecha">Fecha de Nacimiento</label>
              <input id="fecha" type="date" name="nacimiento" class="datepicker" value="'.$row[4].'" >
            </div>
            <div class="col s6">
              <label>Sexo</label>
              <select name="sexo" >

                <option value="masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <label for="tel" >Telefono:</label>
              <input id="tel" type="text" name="telefono" value="'.$row[9].'" >
            </div>
            <div class="input-field col s6">
              <label for="ocu">Salario:</label>
              <input id="ocu" type="text" name="salario" value="'.$row[10].'" >
            </div>
          </div>
          <div class="row">
            <div class="input-field col s5">
              <label for="call">Calle</label>
              <input id="call" type="text" name="calle" value="'.$row[5].'" >

            </div>
            <div class="input-field col s1">
              <label for="num">Numero</label>
              <input id="num" type="number" name="numero" value="'.$row[6 ].'" >
            </div>
            <div class="input-field col s6">
              <label for="fra">Colonia/Fraccionamiento</label>
              <input id="fra" type="text" name="colonia" value="'.$row[7].'" >
            </div>
          </div>
 
          </div>
          <div class="row">
            <div class="center">
              <input class="light-blue darken-4 btn " type="submit" value="Actualizar Datos" >
            </div>  
          </div>
        </form>
      </div>';


        ?>  


    </div>
  </div>

	    <!--SCRIPTS-->
    <script src=" js/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
</body>
</html>