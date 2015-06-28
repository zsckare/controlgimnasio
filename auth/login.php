<?php 
	$user_name=trim($_POST['username']);
	$user_pwd=trim($_POST['userpwd']);


	$result=mysql_query("SELECT * FROM usuarios WHERE user_name='$user_name' AND user_password='$user_pwd'  ");
	
 ?>