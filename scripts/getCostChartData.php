<?php
	



	define('INCLUDE_CHECK',1);

	require "connect.php";

	if(isset($_GET['id'])){
		$id=$_GET['id'];
	}else {
		$id=NULL;
	}


	

	// $orderAssc=mysql_fetch_assoc(mysql_query("SELECT order_num FROM orders where userId='$id' limit 1"));
	// $orderNum=$orderassc['order_num'];

	$items_query=mysql_query("SELECT item_name from orders where userId='$id'");

	$items=array();
	while($row=mysql_fetch_array($items_query)){
		
		array_push($items,$row["item_name"]);
	}


	

	$price=array();

	foreach ($items as $i) {
		$price[$i]=0;
	}



	foreach($items as $i){
		
		$cal=mysql_fetch_row(mysql_query("SELECT price from menu where item_name='$i'"));

		$price[$i]+=$cal[0];
		
	}


	

	$names=array_unique($items);





	echo "{\"cols\": [{\"id\": \"foodNames\", \"label\": \"Food Name\", \"type\": \"string\"},{\"id\": \"price\", \"label\": \"Cost\", \"type\": \"number\"}], \"rows\":[";

    foreach($names as $i){
    	echo "{\"c\":[{\"v\":\"$i\"},{\"v\":\"$price[$i]\"}]}";
    	if($i!=end($names)){
    		echo ",";
    	}
    };

    echo "]}" ;
		
