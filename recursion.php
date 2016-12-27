<?php

    //building recursion

    function reverse_r($somestring){

        if(strlen($somestring) > 0){

            reverse_r(substr($somestring, 1));
        }

        echo substr($somestring, 0, 1);

        return;
    }


    function reverse_i($something){

        for($i=0; $i<=strlen($something); $i++){

            echo substr($something, -$i, 1);
        }

        return;
    }


    reverse_r('Hello');

    echo '<br>';

    reverse_i('Hello');
?>