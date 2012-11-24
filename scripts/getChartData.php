<?php
	



	define('INCLUDE_CHECK',1);

	require "connect.php";

	if(isset($_GET['id'])){
		$id=$_GET['id'];
	}else {
		$id=NULL;
	}


	

	$name=mysql_fetch_row(mysql_query("SELECT item1,item2,item3,item4,item5 FROM orders where userId='$id'"));echo json_encode($name);		
?>