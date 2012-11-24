<?php
	



	define('INCLUDE_CHECK',1);

	require "connect.php";

	if(isset($_GET['id'])){
		$id=$_GET['id'];
	}else {
		$id=NULL;
	}


	

	$orderAssc=mysql_fetch_assoc(mysql_query("SELECT order_num FROM orders where userId='$id' limit 1"));
	$orderNum=$orderassc['order_num'];

	echo json_encode($name);		
?>