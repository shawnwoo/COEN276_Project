<?php

define('INCLUDE_CHECK',1);
require "scripts/connect.php";


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>CampusCafe</title>
		<style type="text/css" media="all">
			@import "css/style.css";
		</style>
		
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    	<script type="text/javascript">
    	

		google.load("visualization", "1", {packages:["corechart"]});
		google.load('visualization', '1', {packages:['table']});

    	function handleButtonClick(){
    		
    		drawVisualization();
    	}



    	function getData(){

    	}

    	function drawVisualization(){
    		var chart_container=document.getElementById('chart_div');
			var table_container=document.getElementById('table_div');
			var costChart_container=document.getElementById('cost_chart_div');
			var cost_table_container=document.getElementById('cost_table_div');
			var response=$.ajax({
    	 			type:'GET',
    	 			url:'scripts/getChartData.php',
    					data:'id='+$('#campusID').val(),
    				dataType:'json',
    				async:false,

    				success:function(result){
    					
    					return result;
    				}

    					
    				}).responseText;
			var responseCost=$.ajax({
    	 			type:'GET',
    	 			url:'scripts/getCostChartData.php',
    					data:'id='+$('#campusID').val(),
    				dataType:'json',
    				async:false,

    				success:function(result){
    					
    					return result;
    				}

    					
    				}).responseText;


			var source=jQuery.parseJSON(response);
			var sourceCost=$.parseJSON(response);

			

			var data = new google.visualization.DataTable(response,0.6);
			var dataview=new google.visualization.DataView(data);

			var dataCost= new google.visualization.DataTable(responseCost);
			

    		var options = {
          title: 'My Caloric Distribution'
        };

        	var options2={title: 'My Cost Distribution'};


         var chart = new google.visualization.ColumnChart(chart_container);
         chart.draw(dataview,options);
        var table=new google.visualization.Table(table_container);
        table.draw(data,null);

        var costChart=new google.visualization.ColumnChart(costChart_container);
        var costTable=new google.visualization.Table(cost_table_container);
        costChart.draw(dataCost,options2);
        costTable.draw(dataCost);




    	}



    	
    </script>
		
	

	</head>
	<body>
		<div id="container">
			<div id="nav">

				<table width="100%" border="0" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<td width="116"><a href="#"><img src="images/logo.png" width="116" height="70" border="0" alt="Campus Cofe Home" id="logo" class="png"></a></td>
							<td>
							<div id="menu">
								<ul class="tabs">
									<li>
										<a href="smartCafe.php" onmouseover="cafe.src='images/cafe2.png';" onmouseout="cafe.src='images/cafe1.png';" class="png"> <img src="images/cafe1.png" alt="cafe" name="cafe" width="117" height="67" border="0" id="cafe" class="png"/  > </a>
									</li>
									<li>
										<a href="forum.php" onmouseover="forum.src='images/forum2.png';" onmouseout="forum.src='images/forum1.png';" class="png"> <img src="images/forum1.png" alt="forum" name="forum" width="85" height="67" border="0" id="forum" class="png"/ > </a>
									</li>

									<li>
										<a href="myStatus.php" onmouseover="status.src='images/status2.png';" onmouseout="status.src='images/status1.png';" class="png"> <img src="images/status1.png" alt="MyStatus" name="status" width="117" height="67" border="0" id="status" class="png"/ > </a>
									</li>
								</ul>
							</div></td>

						</tr>
					</tbody>
				</table>
			</div>
			<div id="content">
				<div id="top"></div>

				<div id="middle-container">
					<div id="middle">
						<div id="test"></div>
							
						<form  >
							<fieldset>
								<legend>Input your Campus ID here:</legend>
									CampusID: 		<input type="text" name="campusID" id="campusID">
									
									<button type="button" id="loadbutton" onclick="handleButtonClick()">Load</button>
									
									<a href="registration.php" style="position:relative;float:right;">My Settings</a>
																	
							</fieldset>
							
						</form>		
							
						
					
						
					<div class="chartText">Daily Caloric Distribution	</div>
					
						
					
					 <div id="chart_div" style="width: 900px; height: 500px;"></div>
					<div class="chartText">Table of Caloric Distribution</div>
						<div id="table_div"style="width: 900px; height: 500px;"></div>
						
						<div class="chartText">Daily Cost Distribution	</div>
					
						
					
					 <div id="cost_chart_div" style="width: 900px; height: 500px;"></div>
					<div class="chartText">Table of Cost Distribution</div>
						<div id="cost_table_div"style="width: 900px; height: 500px;"></div>
						


					</div>
				</div>


			</div>

				<div id="bot">
					COEN 276 2012 Fall.  Group P.&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="#">About Us</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="#">Contact Us</a>&nbsp;&nbsp;&nbsp;
				</div>

			</div>
		</div>

	</body>
</html>

