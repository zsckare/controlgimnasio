<?php 
	include("../conexion.inc.php");
	$link=Conectarse();

	$user_name=trim($_POST['username']);
	$user_pwd=trim($_POST['userpwd']);


	$result=mysql_query("SELECT * FROM usuarios WHERE user_name='$user_name' AND user_password='$user_pwd' ",$link);
		if($resultado = mysql_fetch_row($result)){
		session_start();
		$_SESSION['username']=$user_name;
		$_SESSION['user_access']=$resultado[3];

		header("Location: ../home.php");
		

	}else{
		header("Location: ../index.php");
	}
 ?>