<?php
    $phrase = "I love food";
    

    if( preg_match("/I/", $phrase)){
        
        echo "Yes, indeed I love food";
    }
    else{
        
        echo "Nooooo :(";
    }
    
    //test split
    $email = "username@example.com";
    $arr = preg_split("/\.|@/", $email);

    print_r($arr);
?>
