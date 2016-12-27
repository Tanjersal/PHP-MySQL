<?php

    //short variable namespace

    $document_root = $_SERVER['DOCUMENT_ROOT'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bob's customer orders</title>

    <style>
        table, th, td{

            border-collapse: collapse;
            border: 1px solid black;
            padding: 6px;
        }        

        th {

            background:#ccccff;
        }
    </style>
</head>
<body>
    <h1>Bob's Auto Parts</h1>

    <h2>Customer Orders</h2>

        <?php

            //read the entire file

            $orders = @file("$document_root/orders/orders.txt");

            //count the number of orders

            $number_orders = count($orders);

            //check orders

            if($number_orders == 0){

                echo "<p>No order is available to be processed.</p>";

            }

            //contruct the table

            echo "<table>\n";

            echo '<tr>
                    <th>Order Date</th>
                    <th>Tires</th>
                    <th>Oil</th>
                    <th>Sparks plugs</th>
                    <th>Total</th>
                    <th>Address</th>
                </tr>';

            //loop throught the orders

            for($count = 0; $count < $number_orders; $count++){

                //split the lines

                $lines = explode("\t", $orders[$count]);

                //keep only the numbers ordered

                $lines[1] = intval($lines[1]);
                $lines[2] = intval($lines[2]);
                $lines[3] = intval($lines[3]);

                //output each order

                echo "<tr>
                        <td>".$lines[0]."</td>
                        <td>".$lines[1]."</td>
                        <td>".$lines[2]."</td>
                        <td>".$lines[3]."</td>
                        <td>".$lines[4]."</td>
                        <td>".$lines[5]."</td>

                </tr>";
            }


            echo '<table';
        
        ?>
</body>
</html>