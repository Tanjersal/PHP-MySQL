<?php

    //add the exceptions file

    require_once('fileExceptions.php');

    //create a short variables name

    $tireqty = $_POST['tireqty'];
    $oilqty = $_POST['oilqty'];
    $sparksqty = $_POST['sparksqty'];
    $address = $_POST['address'];
    $date = date('H:i jS F Y'); // date variable 

    $find = $_POST['find'];

    $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT']; // to get to the root of the directory

?>

<html>
    <head>
        <title>Bob's Auto parts - Order results</title>
    </head>
    <body>
        <h1>Bob's Auto parts</h1>
        <h2>Order results</h2>
        
        <?php 
            echo "<p>Order processed at ".$date."</p>";
            
            //The dot . is used to concatenate the php with html 
        
            echo '<p> Your order is as follows: </p>';
            
            $totalqty = 0;
            
            $totalqty = $tireqty + $oilqty + $sparksqty;
            echo "Items ordered: ".$totalqty."<br>";
        
            //check validity of orders
        
            if($totalqty==0)
            {
                echo 'You did not placed any order on the previous page! <br>';
            }
            else
            {
                if($tireqty > 0)
                {
                    echo $tireqty." tires. <br>";
                }
                
                if($oilqty > 0)
                {
                    echo $oilqty." bottles of oil. <br>";
                }
                
                if($sparksqty > 0)
                {
                    echo $sparksqty." spark plugs. <br>";
                }
            }
        
            //calculate the amount
            
            $totalamount = 0.0;
            
            //define constants
            define('TIREPRICE',100);
            define('OILPRICE', 10);
            define('SPARKPRICE', 4);
        
            
            $totalamount = $oilqty * OILPRICE + $tireqty * TIREPRICE + $sparksqty * SPARKPRICE;
        
            echo "<p>Total of order is $".$totalamount.".</p>";
            echo "<p>Address to ship to is ".$address.".</p>";
        
           // $outputString = $date."\t".$tireqty." tires \t".$oilqty." oil\t".$sparksqty." spark plugs\t\ $".$totalamount."\t".$address."\n";
            
              $outputString = $date."\t".$tireqty." tires \t".$oilqty." oil \t" .$sparksqty." spark plugs \t \$".$totalamount."\t". $address."\n";
        
            //open file for appending the order @ is for suppressing the warning
            

            //using exception now

            try
            {
                if(!$fp = @fopen("$DOCUMENT_ROOT/orders/orders.txt", 'ab'))
                {   
                    //exception thrown manually
                    throw new fileOpenException();
                }
                

                if(!flock($fp, LOCK_EX))
                {
                    //exception thrown manually
                    throw new fileLockException();
                }
            
                //actually write into the file
                if (!fwrite($fp, $outputString, strlen($outputString))) 
                {
                    //exception thrown manually
                     throw new fileWriteException();
                }
            
                flock($fp, LOCK_UN);
                fclose($fp);
            
                echo "<p>Order was written successfully.<p>";
                    
                switch($find){

                    case "a":
                        echo "<p>Regular Customer</p>";
                        break;

                    case "b":
                        echo "<p>TV Advertisement</p>";
                        break;
                    case "c":

                        echo "<p>Phone directory</p>";
                        break;
                    default:

                        echo "<p>NOT KNown</p>";
                        break;

                }
            
            }
            catch(fileOpenException $e)
            {
                 echo "<p><strong>Orders file could not be opened.<br/>";

            }
            catch(Exception $e)
            {
                echo "<p><strong>Your order could not be processed at this time.<br/>
                        Please try again later.</strong></p>";
            }
        ?>
    </body>
</html>