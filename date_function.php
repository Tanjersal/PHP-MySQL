<?php

    //For date display and storing use standard date()
    //For calculations use unix timestamp
    //date()

    echo "Today's date is ".date('jS F Y')."<br><br>";

    //getdate()

    $date = getdate();

    print_r($date);

    echo "<br><br>";
    

    echo $date['yday'];
    echo $date['mday'];
    echo $date['year'];

    echo "<br><br>";
    //check the date with checkdate()

    $res = checkdate(10,0,1063);

    var_dump($res);

    echo "<br><br>";

    //timestamps

    echo strftime('%A<br />');

    echo strftime('%x<br />');

    echo strftime('%c<br />');

    echo strftime('%Y<br />');

    echo "<br><br>";

    //calculate age

    $day = 20;
    $mth = 8;
    $year = 1950;

    //birthday as day month and year - unix timestamp

    $bday_unix = mktime(0, 0, 0, $mth, $day, $year);

    //todays time

    $today_unix = time();

    //calculate

    $age = $today_unix - $bday_unix;

    //converts from seconds to day, month and year
    $age = floor($age/(365 * 24 * 60 * 60));

    echo "Age calculated is: ".$age."<br><br>";




?>