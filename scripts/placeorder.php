<?php
    session_start();
    
    if(isset($_SESSION['userId']))
        $userId = $_SESSION['userId'];
    else
        $userId = 0;
    
    
    define('INCLUDE_CHECK',1);
    require "connect.php";
    
    mysql_query("insert into orderNumbers (order_num) values(NULL)");
    
    // get the order number to return to user
    $result = mysql_query("select last_insert_id()");
    if($row = mysql_fetch_array($result))
    {
        $orderNumber = $row['last_insert_id()'];
    }
    
    
    foreach($_POST as $key => $value)
    {
        $key = str_replace("_", " ", $key);  // post adds underscores
        
        if ( strcmp($key, "grandTotal") )
        {
            $sql = "insert into orders (order_num, date, userId, item_name, qty) values (last_insert_id(), now(), $userId, '$key', $value)";
            mysql_query($sql);
        }
        else // it is grandTotal
        {
            $sql_2 = "select balance from users where userId = $userId";
            $result_2 = mysql_query($sql_2);
            if ($row_2 = mysql_fetch_array($result_2))
            {
                $balance = $row_2['balance'];
                $currentBalance = $balance - $value;
            
            }
        }
    }
    
    // update balance
    $sql_3 = "update users set balance = $currentBalance where userId = $userId";
    mysql_query($sql_3);
    
    // return order number
    echo $orderNumber;
    unset($_SESSION['userId']);
    session_destroy();

?>