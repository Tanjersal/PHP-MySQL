<?php
    //start the session 
    session_start();

    //register variable
    $_SESSION['myVariable'] = 'Hello PHP!';

    echo 'The content of $_SESSION[myVariable] is '.$_SESSION['myVariable']."<br><br>";
?>

<!--next page-->

<a href="simple_session_page2.php">Second page</a>