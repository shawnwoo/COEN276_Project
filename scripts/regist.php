<?php
	



	define('INCLUDE_CHECK',1);

	require "connect.php";

	if(isset($_GET['id'])){
		$id=$_GET['id'];
	}else {
		$id=NULL;
	}

	if(isset($_GET['type'])){
		$type=$_GET['type'];
	}else {
		$type=NULL;
	}

	if(isset($_GET['behavior'])){
		$behavior=$_GET['behavior'];
	}else {
		$behavior=NULL;
	}

	if(isset($_GET['value'])){
		$value=$_GET['value'];
	}else {
		$value=NULL;
	}

	





	

	if($behavior=="update"){

		if($type=="budget"){
			$query="UPDATE users SET budget='$value' WHERE userId='$id' ";
			mysql_query($query);
		};

		if($type=="caloric"){
			$query="UPDATE users SET caloricLimit='$value' WHERE userId='$id' ";
			mysql_query($query);

		};

		if($type=="service"){
			$query1="UPDATE users SET caloricTracking='$value[0]' WHERE userId='$id' ";
			mysql_query($query1);
			$query2="UPDATE users SET budgetTracking='$value[1]' WHERE userId='$id' ";
			mysql_query($query2);


		};






	}else{

		if($type=="budget"){
			$budget=mysql_fetch_assoc(mysql_query("SELECT budget from users WHERE userId= ".$id));	
			
			if(is_null($budget['budget'])){
				echo "Nodata";
			}else {
				echo $budget['budget'] ;	
			}

			
		}

		if($type=="caloric"){
			$calorie=mysql_fetch_assoc(mysql_query("SELECT caloricLimit from users WHERE userId= ".$id));
			
			if(is_null($calorie['caloricLimit'])){
				echo "Nodata";
			}else{
			echo $calorie['caloricLimit'];
			}
		}

		if($type=="service"){
			$tracking=mysql_fetch_assoc(mysql_query("SELECT caloricTracking,budgetTracking from users WHERE userId= ".$id));

			if($tracking['caloricTracking']==0) {
				echo 0;
			}else{
				echo 1;
			}

			if($tracking['budgetTracking']==0){
				echo 0;
			}else{
				echo 1;
			}

		}

	}
	
	

	

	
?>

