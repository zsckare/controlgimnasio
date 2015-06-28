<?php 

$buscar = $_POST['b'];
       
      if(!empty($buscar)) {
            buscar($buscar);
      }
       
      function buscar($b) {
            $con = mysql_connect('localhost','root', '');
            mysql_select_db('gimnasio', $con);
       
            $sql = mysql_query("SELECT * FROM clientes WHERE nombre LIKE '%".$b."%' OR paterno LIKE '%".$b."%' ",$con);
             
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
                    <a href="verCliente.php?id='.$row[0].'"class="row center-align">
                    <ul>';
                     if($vence==1){
                      echo '<li class="blue alto">';
                     } else{
                      echo '<li class="light-green alto">';
                     }
                    
                    echo '<p>
                    <img src="'.$foto.'" alt="" class="responsive-img col m2">'
                    .''.$nombre." ".$paterno." ".$materno.''.'
                    </p></li>
                    </ul>
                    </a>
					        ';
                }else{
                  echo '
                    <a href="verCliente.php?id='.$row[0].'"class="row center-align">
                    <ul>
                    <li class="red accent-4 alto"><p>
                    <img src="'.$foto.'" alt="" class="responsive-img col m2">'
                    .''.$nombre." ".$paterno." ".$materno.''.'
                    </p></li>
                    </ul>
                    </a>
                  ';
                }
                  }
             
            }
      }

 ?>