<?php 
	include("conexion.inc.php");
	$link=Conectarse();

	$user_name=trim($_POST['username']);
	$user_pwd=trim($_POST['userpwd']);


	$result=mysql_query("SELECT * FROM usuarios WHERE user_name='$user_name' AND user_password='$user_pwd' ",$link);
	$resultado = mysql_fetch_row($result);
	$existe=mysql_num_rows($resultado);
	if($existe > 0){
		$_SESSION['user_access']=$resultado[3];
	}else{
		header("Location: index.php");
	}

 ?>