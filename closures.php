<?php

    //closure example like in javascript - use keyword is used to bring the global varibale in closure

    $printer = function($value){

        echo "$value <br>";
    };

    $products = [

        'Tires' =>100,
        'Roue' =>200,
        'Oil'=>209
    ];

    $markup = 0.20;

    $apply = function(&$val) use ($markup){

        $val = $val * (1 + $markup);
    };

    array_walk($products,$apply); // to just print the arry values

    array_walk($products, $printer); // to add markup and print value

?>