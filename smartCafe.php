<?php
    
        session_start();
    
        define('INCLUDE_CHECK',1);
        require "scripts/functions.php";
        require "scripts/connect.php";
        
        // toggles whether personal options are displayed
        $personalOptionDisplay = false;
        
        
        // database varibles
        $menuArray = array();
        $con;
        
        // personal variables
        $caloricLimit;
        $budget;
        
        
        function populateMenu(){

            $result = mysql_query("select * from menu");
            $i = 0;
            global $menuArray;
            while($foodItem = mysql_fetch_array($result)){
                array_push($menuArray, $foodItem);
                $i++;
                //echo $foodItem['item_name'];
                
            }
            
        }
        
        
        function getItemInfo($num){
            global $menuArray;
            echo "<div class='item'>";
            echo "<div class = 'itemHeader'><span class='itemName'>".$menuArray[$num]['item_name']."</span>";
            echo "<span class = 'type'>" . $menuArray[$num]['type']. "</span>";
            echo "<span class = 'price'>".$menuArray[$num]['price']."</span></div>";
            echo "<img class='foodImg' src=" . $menuArray[$num]['imgSrc']. " alt='sushi'/>";
            echo "<div class='itemFooter'>";
            echo "<span class='descrip'> D </span>";
            echo "<span class = 'hiddenDescrip'>".$menuArray[$num]['description']."</span>";
            echo "<span class='cal'>".$menuArray[$num]['calories']."</span>";
            echo "<span class='order'>";
            echo "<label for='orderQty'>Order</label>";
            echo "<select name='Order Qty' id = '".$menuArray[$num]['item_name']."'/>";
            echo "<option value='0'>0</option>";
            echo "<option value='1'>1</option>";
            echo "<option value='2'>2</option>";
            echo"</select>";
            echo "</span>";
            echo "</div>";
            echo "</div>";
        }
        
        
        function connectToDb(){
            
            global $con;
            $con = mysql_connect("localhost:8888", "root", "root");
            if(!$con)
            {
                die('Could not connect');
                
            }
            mysql_select_db("csf", $con);
        }
        
        
        function validateUser(){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $result = mysql_query("select * from users where userId = ".$username ." and password=".$password);
            global $row;
            if ( $row = mysql_fetch_array($result) ){
                $_SESSION['userId'] = $row['userId'];
                return true;
            }
            else
            {
                echo "incorrect login";
                return false;
            }
        }
        
        
        function getPersonalOptions(){
            
            $result = mysql_query("select * from users where userId = ".$_SESSION['userId']);
            if ($row = mysql_fetch_array($result))
            {
                global $caloricLimit, $budget;
                $caloricLimit = $row['caloricLimit'];
                $budget = $row['budget'];
            }
        }
        
        
        // grab the menu
        //connectToDb();
        populateMenu();
        
        // check state
        if (isset($_SESSION['userId'])){ //userId known
            //connectToDb();
            getPersonalOptions();
            $personalOptionDisplay = true;
            
        }
        elseif ( isset($_POST['username']) and isset($_POST['password']) )
        {
            //connectToDb();
            if (validateUser()){
                getPersonalOptions();
                $personalOptionDisplay = true;
            }
        }
        else{
            
            // user not logged in and not trying to log in 
        }
        
        mysql_close($con);
        
    
    
?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Smart Cafe</title>
		<style type="text/css" media="all">
			@import "css/style.css";
			@import "css/cafe.css";
		</style>
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script type="text/javascript" src="scripts/smartCafe.js"></script>

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
											<a href="#" onmouseover="cafe.src='images/cafe2.png';" onmouseout="cafe.src='images/cafe1.png';" class="png">
												<img src="images/cafe1.png" alt="cafe" name="cafe" width="117" height="67" border="0" id="cafe" class="png">
											</a>
										</li>
										<li>
											<a href="#" onmouseover="forum.src='images/forum2.png';" onmouseout="forum.src='images/forum1.png';" class="png">
												<img src="images/forum1.png" alt="forum" name="forum" width="85" height="67" border="0" id="forum" class="png">
											</a>
										</li>
										
										<li>
											<a href="#" onmouseover="status.src='images/status2.png';" onmouseout="status.src='images/status1.png';" class="png">
												<img src="images/status1.png" alt="MyStatus" name="status" width="117" height="67" border="0" id="status" class="png">
											</a>
										</li>

<li>
<form action = "http://localhost:8888/smartCafe.php" method = "post">
<p><input type = "text" name = "username" value = "id"/>
<input tyoe = "text" name = "password" value = "password"/>
<input type = "submit" value = "login"/></p>
</form>
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
				
					<div id = "cafeInfo" class= "cafeHorizontal">
						<img id="cafeImg" src="images/coffeemain.png" alt="coffee cup"/>
						<h1>SmartCafe</h1>
						<p>Open Daily: 9am-9pm<br/>Located on Building E<br/>408-555-5555</p>
						
						
					</div>						
			
					<div class= "cafeHorizontal">
						<p> Main Dishes </p>
                        <?php getItemInfo(0); ?>
                        <?php getItemInfo(1); ?>
                        <?php getItemInfo(2); ?>
                        <?php getItemInfo(3); ?>
						
					</div>
					
					<div class= "cafeHorizontal">
						<p> Sandwiches </p>
                        <?php getItemInfo(4); ?>
                        <?php getItemInfo(5); ?>
                        <?php getItemInfo(6); ?>
                        <?php getItemInfo(7); ?>

					</div>

					<div class= "cafeHorizontal">
						<p> Treats </p>
                        <?php getItemInfo(8); ?>
                        <?php getItemInfo(9); ?>
                        <?php getItemInfo(10); ?>
                        <?php getItemInfo(11); ?>

					</div>

					<div class= "cafeHorizontal">
						<p> Drinks</p>
                        <?php getItemInfo(0); ?>
                        <?php getItemInfo(1); ?>
                        <?php getItemInfo(2); ?>
                        <?php getItemInfo(3); ?>
					</div>



					<div id = "personal"  class= "cafeHorizontal">
						<div class="horizontalRight">
							<table class="cafeTable">
								<caption> Nutritional Tracking</caption>
								<tr><td>Daily Calories Allowed</td><td></td></tr>
								<tr><td>Total Calories Consumed Today</td><td></td></tr>
								<tr><td>Total Calories This Order</td><td></td></tr>
								<tr><td>Preferred Meal Type</td><td></td></tr>								
							</table>						
						</div>				
						<div class="horizontalLeft">
							<table class="cafeTable">
								<caption>Budget Tracking</caption>
								<tr><td>Monthly Budget</td><td></td></tr>
								<tr><td>Balance Available</td><td></td></tr>
								<tr><td>Total this Order</td><td></td></tr>
								<tr><td>Some Other Field</td><td></td></tr>
							</table>							
						</div>				
	
					</div>							
					<div class= "cafeHorizontal">
						<div class = "horizontalRight">
							<table id="orderDetails" class="cafeTable">
								<caption>Your Order Details</caption>
								<tr>
									<td>Subtotal</td>
									<td></td>
								</tr>
								<tr>
									<td>Discount (10% if registered)</td>
									<td></td>
								</tr>
								<tr>
									<td>Tax (8.25%)</td>
									<td></td>
								</tr>
								<tr>
									<td>Delivery</td>
									<td></td>
								</tr>
								<tr>
									<td>Total</td>
									<td></td>
								</tr>
							</table>
						</div>

						<div class="horizontalLeft">
							<table class="cafeTable">
								<caption>Delivery Options</caption>
								<tr>
									<td>
										<form>
											<input type="radio" name="deliveryopt" value="Pickup">Pickup<br>
											<br> <input type="radio" name="deliveryopt"
											value="Delivery">Deliver (add $1.00)
										</form>
									</td>
									<td>Name<br />
									<br />
										<form action="">
											<label for="building">Bldg</label> <select name="Bldg"><option
												value="1">1</option></select> <label for="room">Room</label> <select
												name="Room"><option value="1">1</option></select>
										</form>
									</td>
								</tr>
							</table>
						</div>
					</div>	
					<div id="reviewOrder"  class= "cafeHorizontal">
						<form id="continueOrder" action="">
							<p id="sp"><input id="btn" type="button" value="Review Order"></p>
						</form>
					</div>

				</div>
				
				<div id="bot"> COEN 276 2012 Fall.  Group P.&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="#">About Us</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="#">Contact Us</a>&nbsp;&nbsp;&nbsp;	</div>
				
			</div>
		</div>

	</body>
</html>
