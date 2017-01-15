<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insert Results</title>
</head>
<body>
    <h1><strong>Book insertion result</strong></h1>

    <?php

        //create variables

        $isbn = $_POST['ISBN'];
        $author = $_POST['Author'];
        $title = $_POST['Title'];
        $price = $_POST['Price'];

        $price = doubleval($price);

        //check to see if the variables have been set or null

       if(!isset($isbn) || !isset($author)|| !isset($title) || !isset($price)){

           echo "<p>Please entered all the required details before you proceed.</p>";

           exit;
       }

       //connect to db 

       @$db = new mysqli('localhost', 'root', '', 'books');

       //test for connection_status

       if(mysqli_connect_errno()){

           echo "<p>Error: Could not connect to database. <br>
           Please try again later</p>";
       }

       //db query

       $query = 'insert into books values (?, ?, ?, ?)';

       $stmt = $db->prepare($query);
       $stmt->bind_param('sssd', $isbn, $author, $title, $price);
       $stmt->execute();

       //if there is insertion 
       if($stmt->affected_rows > 0){

           echo "<p>Your insertion of ".$isbn.$author.$title.$price." was successfull!</p>";
       }
       else{

           echo "<p>An error occured and the item was not added! Please try again.</p>";
       }
    ?>
</body>
</html>