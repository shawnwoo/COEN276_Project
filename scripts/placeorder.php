<?php
    session_start();
    $userId = $_SESSION['userId'];
    
    
    define('INCLUDE_CHECK',1);
    require "connect.php";
    
    mysql_query("insert into orderNumbers (order_num) values(NULL)");
    
    foreach($_POST as $key => $value)
    {

        $sql = "insert into orders (order_num, date, userId, item_name, qty) values (last_insert_id(), now(), $userId, '$key', $value)";
        mysql_query($sql);
    }

?>