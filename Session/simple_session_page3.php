<?php

    //start session 
    session_start();

    //display 
    echo 'The content of $_SESSION[myVariable] is '.$_SESSION['myVariable']."<br><br>";

    //clean up session ID

    session_destroy();
?>