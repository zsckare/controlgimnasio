<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tavos Gym | Datos Instructor</title>

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
            <div class="col m2 s12">
              <a href="instructores.php" class="btn-floating tooltipped" data-position="right" data-delay="50" data-tooltip="Regresar"><i class="mdi-navigation-arrow-back"></i>Regresar</a>
            </div>
          </div>
          <?php 
             include("conexion.inc.php");
                $id = $_GET['id'];
                $link=Conectarse();             
                 $result=mysql_query("SELECT * FROM instructores WHERE id = '$id' LIMIT 1",$link);
                 $row = mysql_fetch_row($result);
                 echo '<div class="row">';
                    echo '<div class="col s12 m6">';
                      echo '<img src='.'"'. $row[11].'"' .'class="responsive-img">';
                    echo "</div>";

                    echo '<div class="col s12 m6 ">';
                        echo '<div class="row borde-abajo">';
                            echo '<h3 class="center-align">'.$row[3]." ".$row[1]." ".$row[2]." ".'</h3>';
                        echo '</div>';

                        echo '<div class="row borde-abajo">';
                            echo '<div class="col s12 m12 ">';
                            echo "<h5>"."Calle: ".$row[5].", #".$row[6].", ".$row[7]."</h5>";
                            echo "</div>";
                        echo "</div>";
                        echo '<div class="row borde-abajo">';
                          echo '<div class="col s12 m5 ">';
                            echo "<h5>Salario:"." ".$row[10]."</h5>";
                          echo "</div>";
                          echo '<div class="col s12 m7 ">';
                            echo "<h5>Telefono:"." ".$row[9]."</h5>";
                          echo "</div>";
                        echo '</div>';
                    echo "</div>";
                 echo "</div>";   
            
            
        ?>  

        </div>
    </div>
         

    <!--SCRIPTS-->
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
</body>
</html>