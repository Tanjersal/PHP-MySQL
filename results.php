<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results</title>
</head>
<body>
    <h1>Search Results</h1>
    <?php

        //create those short list variables and trim the search term for white spaces
        $searchType = $_POST['searchType'];
        $searchTerm = trim($_POST['SearchTerm']);

        //check to see if there is any input 

        if(!$searchTerm || !$searchType){

            echo "<p>There is no input, please specify a search type and search term</p>";
        }

        //whitelist the search type to make sure we are getting good data

        switch($searchType){

            case 'Title':
            case 'Author':
            case 'ISBN':
                break;
            default:
                echo "<p>This choice is not valid!</p>";

                exit;
        }

        //connection to the db - OOP Version
        @$db = new mysqli('localhost', 'root', '', 'books');

        //if connection returns an error number tell user
        if(mysqli_connect_errno()){

            echo "<p>Error connecting to the database!.</p><br>
            <p>Please try again later</p>";

            exit;
        }

        //query the database - placing ? againts sql injection

        $query= "select ISBN, Author, Title, Price from books where $searchType = ?";

        //prepare the query 
        $stmt = $db->prepare($query);

        //bind the variables searchtype = searchterm with 's' indicating input is string
        $stmt->bind_param('s', $searchTerm);

        //execute query
        $stmt->execute();

        //collect the result
        $stmt->store_result();

        //bind them with those 4 variables
        $stmt->bind_result($isbn, $author, $title, $price);

        echo "<p>Number of books found: ".$stmt->num_rows."</p>";

        //fetch the db
        while($stmt->fetch()){

            echo "<p><strong>Title: ".$title."</strong>";
            echo "<br>Author: ".$author;
            echo "<br>ISBN: ".$isbn;
            echo "<br>Price: $".number_format($price, 2)."</p>";

        }
    ?>
</body>
</html>