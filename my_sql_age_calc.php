<?php
    //using mysql date api to calculate someone's age

    $day = 10;
    $month = 12;
    $year = 1960;

    //format birthday -mysql uses ISO 8601 format - month, day, year

    $bday_sql = date('c', mktime(0,0,0, $month, $day, $year));

    //calculate

    $db = mysqli_connect('localhost', 'root', '');

    $response = mysqli_query($db, "select datediff(now(), '$bday_sql')");

    //get the age

    $age = mysqli_fetch_array($response);

    echo 'Your are '.floor($age[0]/365)." years old";


?>