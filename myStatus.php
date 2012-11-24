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
		
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    	<script type="text/javascript">

    	$(document).ready(function(){


    		$('#loadbutton').click(function(){
    			
    			
    			$.ajax({
    				type:'GET',
    				url:'scripts/getChartData.php',
    				data:'id='+$('#campusID').val(),
    				dataType:'json',
    				cache:false,

    				success:function(result){

    					//$('#test').html('id='+$('#campusID').val());

    					
    					$('#test').html(result[0]);
    				}


    			})
    		})
    	})


    // 	function showValue(){

    // 			id=$

				// id=document.getElementsByName("campusID")[0].value;
				// if(window.XMLHttpRequest){
				// 	xmlhttp=new XMLHttpRequest();
				// }else{
				// 	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				// }

				// xmlhttp.onreadystatechange=function(){
				// 	if(xmlhttp.readyState==4 && xmlhttp.status==200)
				// 	{
				// 		text=xmlhttp.responseText;

				// 		document.getElementById("test").innerHTML=text;	
						
						
				// 	}
				// }

				// xmlhttp.open("GET","scripts/getChartData.php?id="+id,true);
				// xmlhttp.send();

				// }



















      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
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
									
									<button type="button" id="loadbutton">Load</button>
																	
							</fieldset>
							
						</form>		
							
						
					
						
					<div class="chartText">Daily Caloric Distribution	</div>
					
						
					
					 <div id="chart_div" style="width: 900px; height: 500px;"></div>
					<div class="chartText">Daily Cost Distribution</div>
						<div id="cost_div"style="width: 900px; height: 500px;"></div>
						


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

