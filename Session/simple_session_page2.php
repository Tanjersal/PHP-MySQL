<?php
    
    //start cookie session
    session_start();

    //display and unset 
    echo 'The content of $_SESSION[myVariable] is '.$_SESSION['myVariable']."<br><br>";

    //unset variable
    unset($_SESSION['myVariable']);

?>

<a href="simple_session_page3.php">Third page</a>