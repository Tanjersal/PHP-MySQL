<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stock Quotes</title>
</head>
<body>
    <?php

        //stock to request

        $stock = 'GOOG';

        //url to request quote 
        //API variables used
        //sl1d1t1c1ohgv - s(ymbol), l1(last trade price), d1(last trade date), t1(last trade time), c1(change), o(open), 
        //h(high), g(days low), v(volume)
        
        $url = 'http://download.finance.yahoo.com/d/quotes.csv'.'?s='.$stock.'&e=.csv&f=sl1d1t1c1ohgv';;

        echo "Below is the stock quote for ".$stock."<br>";

        if(!($contents = file_get_contents($url))){

            die('Error - Failed to open'.$url);
        }

        //parse the data with list to assign returned values to variables

        list($symbol, $quote, $date, $time) = explode(',', $contents);

        //trim the data
        $date = trim($date. '');
        $time = trim($time, '"');

        echo "<p>".$symbol." was last sold at $".$quote."</p>";

        echo "<p>Quote is current as of ".$date."at ".$time."</p>";

        echo "<p>The information is retrieved from <br>".$url."</p>";

    ?>
</body>
</html>