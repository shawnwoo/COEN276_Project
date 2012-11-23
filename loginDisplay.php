<?php
    session_start();
    define('INCLUDE_CHECK',1);
    require "scripts/connect.php";

    
    // personal variables
    $caloricLimit;
    $budget;
    
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
    
    
    function generate_tables(){

        echo "<div class='horizontalRight'>";
        echo "<table class='cafeTable'>";
        echo "<caption>Nutritional Tracking</caption>";
        echo "<tr><td>Daily Calories Allowed</td><td>$caloricLimit</td></tr>";
        echo "<tr><td>Total Calories Consumed Today</td><td></td></tr>";
        echo "<tr><td>Total Calories This Order</td><td></td></tr>";
        echo "<tr><td>Preferred Meal Type</td><td></td></tr>";
        echo "</table>";
        echo "</div>";
        echo "<div class='horizontalLeft'>";
        echo "<table class='cafeTable'>";
        echo "<caption>Budget Tracking</caption>";
        echo "<tr><td>Monthly Budget</td><td>$budget</td></tr>";
        echo "<tr><td>Balance Available</td><td></td></tr>";
        echo "<tr><td>Total this Order</td><td></td></tr>";
        echo "<tr><td>Some Other Field</td><td></td></tr>";
        echo "</table>";
        echo "</div>";
    }
    
    if (validateUser()){
        
        getPersonalOptions();
        generate_tables();
        
    } else{
        echo "Invalid login";
    }
    
    
    ?>