<?php 
	include ("conexion.inc.php");


	$search= '';
	if(isset($_POST['search'])){
		$search= $_POST['search'];
	}
	$link=Conectarse();				
	$result=mysql_query("SELECT * FROM clientes WHERE nombre LIKE '%".$search."%' OR paterno '%".$search."%' ORDER BY paterno",$link);
	$fila = mysql_fetch_row($result);

?>
<?php if($search!='') { ?>
	<h4>Resultados </h4>
	<?php do { ?>
		<?php echo $fila[3]; ?>
	<?php } while($fila = mysql_fetch_row($result)); ?>

<?php } ?>