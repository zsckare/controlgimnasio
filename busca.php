<?php 
include('conexion.inc.php');
$link=Conectarse();
$buscar = $_POST['b'];
       
      if(!empty($buscar)) {
            buscar($buscar);
      }
       
      function buscar($b) {
            
       
            $sql = mysql_query("SELECT * FROM clientes WHERE nombre LIKE '%".$b."%' OR paterno LIKE '%".$b."%' ");
             
            $contar = mysql_num_rows($sql);
             
            if($contar == 0){
            	echo '<p class="center-align">No se han encontrados resultados para '.$b." ".'<i class="small ion-sad-outline "></i></p>';

            }else{                      

	              		  
                  while($row=mysql_fetch_array($sql)){
                        $nombre = $row['nombre'];
                        $paterno= $row['paterno'];
                        $materno= $row['materno'];
                        $foto= $row['imagen'];
                        $id = $row['id'];
                        $act= $row['activo'];
                        $vence=$row['prox'];
                 if($act==1){
					        echo '
                     <div class="row">
                         <div class="row light-green alto">
                           <div class="col s2 m2 l2 offset-s1 offset-m1 offset-l1 ">
                             <img src="'.$foto.'" alt="" class="responsive-img">   
                           </div>
                           <div class="col s7 m7 l7">
                             <p>'.$nombre." ".$paterno." ".$materno.'</p>
                           </div>
                            <div class="col s2 m2 l2">
                              <a href="asistenciasClientes.php?id='.$id.'&checo=0" class="btn-floating waves-effect waves-light light-green darken-4 tooltipped" style="margin-top:.2em;" data-position="top" data-delay="20" data-tooltip="Registrar Entrada"><i class="ion-checkmark "></i></a>
                            </div>
                         </div>
                       </div>
					        ';
                }else{
                  echo '
                     <div class="row">
                         <div class="row red accent-4 alto">
                           <div class="col s2 m2 l2 offset-s1 offset-m1 offset-l1 ">
                             <img src="'.$foto.'" alt="" class="responsive-img">   
                           </div>
                           <div class="col s8 m8 l8">
                             <p>'.$nombre." ".$paterno." ".$materno.'</p>
                           </div>
                         </div>
                       </div>
                  ';
                }
                  }
             
            }
      }

 ?>
