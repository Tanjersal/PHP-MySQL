<?php

    //start session 
    session_start();

    if(isset($_POST['username']) && isset($_POST['password'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        //start a connection to the db 

        $db = new mysqli('localhost', 'root', '', 'auth');

        if(mysqli_connect_errno()){

            echo "Connection to database failed :".mysqli_connect_errno();
            exit;
        }

        //query db to select auth users 
        $query = "select * from authorized_users where name='".$username."' and password=sha1('".$password."')";

        //result

        $results = $db->query($query);

        //check to register the user in session
        if($results->num_rows > 0){

            $_SESSION['user'] = $username;
        }

        $db->close();
     }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1><strong>Home Page</strong></h1>

    <?php
        if(isset($_SESSION['user'])){

            echo "<p>You are logged in as : ".$_SESSION['user']."</p><br><br>";
            
            echo '<p><a href="logout.php">Log out</a></p>';
        }
        else
        {
            //if log in was not approved
            if(isset($username)){

                echo "<p>Could not log you in please try again.</p>";
            }
            else
            {
                echo "<p>You are not logged in.</p>";
            }
        }

        //login form
        echo '<form action="authentification_example.php" method="POST">';

        echo '<fieldset>';

        echo '<legend>Login Now!</legend>';

        echo '<p><label for="username">Username:</label>';

        echo '<input type="text" name="username" id="username" size="30"/></p>';

        echo '<p><label for="password">Password:</label>';

        echo '<input type="password" name="password" id="password" size="30"/></p>';

        echo '</fieldset>';

        echo '<button type="submit" name="login">Login</button>';

        echo '</form>';
    ?>

    <p><a href="members.php">Members Section</a></p>
</body>
</html>