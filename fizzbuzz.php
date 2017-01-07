<?php
    //example program implementing generator inside foreach

    function buzzwords($start, $end)
    {
        //set current to the start number
        $current = $start;

        while($current <= $end)
        {
            if($current%2==0)
            {
                yield 'Merry Christmas!';
            }
            elseif($current%3==0)
            {
                yield 'Happy Thanksgiving!';
            }
            elseif($current%2==0 && $current%3==0)
            {
                yield 'Happy New Year 2017!';
            }
            else
            {
                yield $current;
            }

            //increment index 
            $current++;
        }
        
    }

    //try it now

    foreach(buzzwords(1,30) as $number)
    {
        echo 'Function ouput: '.$number."<br>";
    }

?>