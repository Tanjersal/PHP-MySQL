<?php

    //create shor variable
    $document_root = $_SERVER['DOCUMENT_ROOT'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bob's auto parts - orders results</title>
</head>
<body>
    <h2>Customer orders:</h2>

    <?php

        //open file for reading - read bin mode

        @$fp = fopen("$document_root/orders/orders.txt", 'rb');

        //lock file for reading

        flock($fp, LOCK_SH);
        
        if (!$fp){

            echo "<p><strong>No order is pending</strong></p><br>
            <p>Please try agin later</p>";

            exit;
        }

        //test for end of file

        while(!feof($fp)){

            $orders = fgets($fp); //$fgets gets line from file pointer

            echo htmlspecialchars($orders)."<br>";
        }

        //release lock

        flock($fp, LOCK_UN);

        echo 'Final position of the file is '.(ftell($fp));

        echo '<br>';

        rewind($fp);

        echo 'After rewinding the position is '.(ftell($fp));


        fclose($fp);

        echo '<br>';

        echo 'Testing array with values and keys';

        $prices = array('Tires'=>100, 'Pneu'=> 200, 'Fab'=>800);


         echo '<br>';

        while (list($products, $prix) = each($prices)){

            echo $products.'|'.$prix.'<br>';

        }

        echo 'Array contents'. '<br>';

        foreach($prices as $key => $values){

            echo $key.' '.$values;
        }

        echo '<br>Or using while loop';

        while($element = each($prices)){

            echo $element['key'].'--'.$element['value'];

            echo '<br>';
        }


        echo '<br><br>';

        echo 'Testing two dimmensional arrays';

        $produits = array(
            
            array('Code' => 'TIres', 'Description' => 'Cars tires', 'Price' => 40),
            array('Code' => 'TV', 'Description'=> 'To watch Netflix', 'Price' => 50),
            array('Code' => 'Frein', 'Description' => 'Stop car', 'Price'=> 190)

        );


        //display the contant

        for($row = 0; $row< 3; $row++){

            while(list($key, $value) = each($produits[$row])){

                echo $key.'|'.$value;
            }

            echo '|<br>';

        }


        //sorting array_sum

        echo '<br>';

        $test = array('file0', 'file1', 'file9');

        sort($test);

        foreach($test as $example){

            echo $example.' ';
        }

        sort($test, SORT_STRING);

        foreach($test as $natural){

            echo $natural.' ';
        }


        echo '<br><br>';

        $anotherTest = array('Voitures' => 2000, 'Maison'=> 300, 'The'=>10);

        asort($anotherTest); //sort by key

        foreach($anotherTest as $key=>$values){

            echo $key.' '.$values;
        }

        echo '<br><br>';

        ksort($anotherTest); //sort by values

        foreach($anotherTest as $key => $values){

            echo $key.' '.$values;
        }

        echo '<br>';
        //testing user define sort for 2 dim array

        $second = array(
            array('TIR', 'Tires', '100'),
            array('VT', 'Tele', '200'),
            array('PIB', 'Money', '4')
        );

        //sort by the first column [0]
         function compare($x, $y){

            if($x[0]==$y[0]){
                return 0;
            }
            else if($x[0]<$y[0]){

                return -1;
            }
            else {

                return 1;
            }
        }


        //call the usort function - usort()

        usort($second, 'compare');

        for($row=0; $row<3; $row++){

            for($Col = 0; $Col<3; $Col++){

                echo $second[$row][$Col].' ';
            }
        }




       

?>
</body>
</html>