<?php

    //create short name variables

    $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

    //use file to open the file and do all the processing - loads the file into and array which is $orders

    $orders = file("$DOCUMENT_ROOT/orders/orders.txt");

    
    //function count to count the number of orders
    $number_of_orders = count($orders);

    
    if($number_of_orders == 0)
    {
        echo '<p><strong>No orders pending, please try again later<strong><p>';
    }
    
    for($i=0; $i<$number_of_orders; $i++){
        
        echo $orders[$i]."<br>";
    }
    

?>   

