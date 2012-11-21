<?php
	



	define('INCLUDE_CHECK',1);

	require "connect.php";

	$id=$_GET["id"];
	$type=$_GET["type"];


	// if(!isset($_POST['campusIDB'])){
	// 	$_POST['campusIDB']="12345";
	// }
	// $idB=$_POST['campusIDB'];

	if($type=="budget"){
		$budget=mysql_fetch_assoc(mysql_query("SELECT budget from users WHERE userId= ".$id));	
		echo $budget['budget'] ;
	}

	if($type=="calorie"){
		$calorie=mysql_fetch_assoc(mysql_query("SELECT caloricLimit from users WHERE userId= ".$id));
		echo $calorie['caloricLimit'];
	}

	
	

	


	
?>

