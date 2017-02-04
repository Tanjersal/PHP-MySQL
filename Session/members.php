<?php
    //start the session 

    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Members Only</title>
</head>
<body>
    <h1><strong>Members Page</strong></h1>

    <?php

        //check for variable 
        if(isset($_SESSION['user'])){

            echo '<p>You are logged in as :'.$_SESSION['user'].'</p><br>';

            echo "<p><strong>Welcome visiting member!</strong></p>";
        
        }
        else 
        {
            echo "<p>You are not logged in!</p><br>";

            echo "<p>Only logged in members can access the content! Please log in!</p><br>";
        }
    ?>

    <p><strong><a href="authentification_example.php">Back to login page.</a></strong></p>
</body>
</html>