<?php

    session_start();

    //store session variable

    $stored_session = $_SESSION['user'];

    //unset variable

    unset($_SESSION['user']);

    //destroy session ID

    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log out Page</title>
</head>
<body>
    <p><strong>Log out</strong></p>

    <?php

        if(!empty($stored_session)){

            echo "<p>Thank you for your visit. You have been logged out!</p>";
        }
        else
        {
            echo "<p>You have not logged in to log out!</p>";
        }
    ?>

    <p><strong><a href="authentification_example.php">Back to login page.</a></strong></p>
</body>
</html>