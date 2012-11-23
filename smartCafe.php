<?php
    
        session_start();
    
        define('INCLUDE_CHECK',1);
        require "scripts/connect.php";

                
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
            echo "<div class='item'>\n";
            echo "<div class = 'itemHeader'><span class='itemName'>".$menuArray[$num]['item_name']."</span>";
            echo "<span class = 'type'>" . $menuArray[$num]['type']. "</span>";
            echo "<span class = 'price'>".$menuArray[$num]['price']."</span></div>\n";
            echo "<img class='foodImg' src=" . $menuArray[$num]['imgSrc']. " alt='sushi'/>\n";
            echo "<div class='itemFooter'>\n";
            echo "<span class='descrip'> D </span>\n";
            echo "<span class = 'hiddenDescrip'>".$menuArray[$num]['description']."</span>\n";
            echo "<span class='cal'>".$menuArray[$num]['calories']."</span>\n";
            echo "<span class='order'>\n";
            echo "<label for='orderQty'>Order</label>\n";
            echo "<select name='Order Qty' id = '".$menuArray[$num]['item_name']."'/>\n";
            echo "<option value='0'>0</option>\n";
            echo "<option value='1'>1</option>\n";
            echo "<option value='2'>2</option>\n";
            echo"</select>";
            echo "</span>";
            echo "</div>";
            echo "</div>\n\n\n";
        }
        
        
        
        
        // grab the menu
        populateMenu();
    
    
    
        /* check state
        if (isset($_SESSION['userId'])){ //userId known
            
            getPersonalOptions();
            
            
        }*/
    
    
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

<p>
    <input type = "text" name = "username" id = "username" value = ""/>
    <input type = "text" name = "password" id = "password" value = ""/>
    <input type = "button" name = "login" id = "login" value = "login"/>
    <br/><p id = "invalidLoginMsg"></p>
</p>

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


                    <div id="personal" class= "cafeHorizonatal"></div>
					<div class= "cafeHorizontal">
						<div class = "horizontalRight">
							<table id="orderDetails" class="cafeTable">
                                <caption>Your Order Details</caption>
                                <tr>
                                    <td>Subtotal</td>
                                    <td id = "subtotal"></td>
                                </tr>
                                <tr>
                                    <td>Discount (10% if registered)</td>
                                    <td id = "discount"></td>
                                </tr>
                                <tr>
                                    <td>Tax (8.25%)</td>
                                    <td id = "tax"></td>
                                </tr>
                                <tr>
                                    <td>Delivery</td>
                                    <td id = "delivery"></td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td id = "total"></td>
                                </tr>
                                </table>
						</div>

						<div class="horizontalLeft">
							<table class="cafeTable">
								<caption>Delivery Options</caption>
								<tr>
									<td>
										<form>
											<input type="radio" name="deliveryopt" value="0.00"/>Pickup<br><br>
											<input type="radio" name="deliveryopt" value="1.00"/>Deliver (add $1.00)
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
