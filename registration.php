
			
		
	
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
		<script>
			function showValue(){
				str=document.getElementsByName("campusIDB")[0].value;
				if(str==""){
					document.getElementsByName("budget").value="";
					return;
				}

				if(window.XMLHttpRequest){
					xmlhttp=new XMLHttpRequest();
				}else{
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}

				xmlhttp.onreadystatechange=function(){
					if(xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						text=xmlhttp.responseText;

						
						if(text.charAt(0)=='N'){
							document.getElementsByName("budget")[0].value="";
							alert("This user does not exist!");
						}else{
							document.getElementsByName("budget")[0].value=text;	
						}
						
					}
				}

				xmlhttp.open("GET","scripts/regist.php?id="+str+"&type=budget",true);
				xmlhttp.send();

				}

			function showCaloric(){
				str=document.getElementsByName("campusIDN")[0].value;
				if(str==""){
					document.getElementsByName("caloric").value="";
					return;
				}

				if(window.XMLHttpRequest){
					xmlhttp=new XMLHttpRequest();
				}else{
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}

				xmlhttp.onreadystatechange=function(){
					if(xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						text=xmlhttp.responseText;
						
						if(text.charAt(0)=='N'){
							document.getElementsByName("caloric")[0].value="";
							alert("This user does not exist!");
						
						}else{
							document.getElementsByName("caloric")[0].value=xmlhttp.responseText;
						}
					}
				}

				xmlhttp.open("GET","scripts/regist.php?id="+str+"&type=caloric",true);
				xmlhttp.send();

			}

			function updateValue(id,name,value){

				xmlhttp=new XMLHttpRequest();
				xmlhttp.open("GET","scripts/regist.php?id="+id+"&type="+name+"&behavior=update"+"&value="+value,true);
				xmlhttp.send();


			}

			function updateService(id){

				if(document.getElementsByName("regToN")[0].checked==false) {
					value1=0;
				}else {
					value1=1;
				};

				if(document.getElementsByName("regToB")[0].checked==false) {
					value2=0;
				}else {
					value2=1;
				}



				xmlhttp=new XMLHttpRequest();
				xmlhttp.open("GET","scripts/regist.php?id="+id+"&type=service&behavior=update"+"&value="+value1+value2,true);
				
				xmlhttp.send();

			}

			function showService(){
				var id=document.getElementsByName("campusIDS")[0].value;
				if(window.XMLHttpRequest){
					xmlhttp=new XMLHttpRequest();
				}else{
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}

				xmlhttp.onreadystatechange=function(){
					if(xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						text=xmlhttp.responseText;

						
						
						if(text.charAt(0)=='0'){
							
							document.getElementsByName("regToN")[0].checked=false;
							
						
						}else if(text.charAt(0)=='1'){
							
							document.getElementsByName("regToN")[0].checked=true;
						};

						if(text.charAt(1)=='0'){
							document.getElementsByName("regToB")[0].checked=false;
							
						
						}else if(text.charAt(1)=='1'){
							document.getElementsByName("regToB")[0].checked=true;
						};


					}
				}

				xmlhttp.open("GET","scripts/regist.php?id="+id+"&type=service",true);
				xmlhttp.send();

			}


			



		</script>
	</head>
	<body>
		<div id="container">
			<div id="nav">

				<table width="100%" border="0" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<td width="116">
								<a href="#"><img src="images/logo.png" width="116" height="70" border="0" alt="Campus Cofe Home" id="logo" class="png"></a>
							</td>
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
								</div>
							</td>
							
						</tr>
					</tbody>
				</table>
			</div>
			<div id="content">
				<div id="top"></div>
				
				<div id="middle-container">

					<div id="middle" style="width:500px;">
						<form  >
							<fieldset>
								<legend>Budget Trackings</legend>
									<label style="width:20em;float:left;">CampusID: </label>
									<input type="text" name="campusIDB"><br>
									<label style="width:20em;float:left;">MonthlyBudget:  </label>
									<input type="text" name="budget" ><br>
									
									<button type="button" onclick="showValue()" style="float:right;">Load</button>
									<button type="button" style="float:right;" onclick="updateValue(document.getElementsByName('campusIDB')[0].value,'budget',document.getElementsByName('budget')[0].value)">Save</button>
								    
							</fieldset>
							
							<fieldset>
								<legend>Nutritional Trackings</legend>
									<label style="width:20em;float:left;">CampusID: </label>
									<input type="text" name="campusIDN"><br>
									<label style="width:20em;float:left;">Total Daily Calories:  </label>
									<input type="text" name="caloric"><br>
									
									<button type="button" style="float:right;" onclick="showCaloric()">Load</button>
									<button type="button"  style="float:right;" onclick="updateValue(document.getElementsByName('campusIDN')[0].value,'caloric',document.getElementsByName('caloric')[0].value)">Save</button>
								
									
								
							</fieldset>
							
							
							<fieldset>
								<legend>Service Regi20emstration</legend>
								<label style="width:20em;float:left;">CampusID: </label>
								<input type="text" name="campusIDS"><br>
								<label style="width:20em;float:left;">Registed to Budget Tracking: </label>
								<input type="checkbox" name="regToB" /><br />
								<label style="width:20em;float:left;">Registed to Nutritional Tracking: </label>
								<input type="checkbox" name="regToN" /> <br />	
								<button type="button"  style="float:right;" onclick="showService()">Load</button>
								<button type="button"  style="float:right;" onclick="updateService(document.getElementsByName('campusIDS')[0].value)">Save</button>
							</fieldset>
									
								
							
						</form>		
					</div>	
					
				</div>
				
				<div id="bot"> COEN 276 2012 Fall.  Group P.&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="#">About Us</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="#">Contact Us</a>&nbsp;&nbsp;&nbsp;	</div>
				
			</div>
		</div>

	</body>
</html>
