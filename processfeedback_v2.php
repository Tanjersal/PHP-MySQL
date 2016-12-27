<?php

    //create the variables and trim left and right

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $feedback = trim($_POST['feedback']);

    //adding regex 

    $regex = '/^[a-zA-Z0-9_\-\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/';

    if(preg_match($regex, $email) === 0){

        echo "<p>That is not a valid address</p>".
             "<p>Please return to the previuous page and try again</p>";

        exit;

    }

    //set up mail information

    $toaddress = "feedback@example.com"; //default one

    //redirect the email based on $feedback

    if(preg_match('/shop|customer service|retail/', $feedback)){

        $toaddress = "retail@example.com";
    }

    if(preg_match('/deliver|fulfill/',$feedback)){

        $toaddress = "fulfillment@example.com";
    }

    if(preg_match('/bill|account/', $feedback)){

        $toaddress = "accounts@example.com";
    }

    if(preg_match('/bigcustomer\.com/', $feedback)){

        $toaddress = "bob@example.com";
    }


    $subject = "Feedback from Customer Orders";
    $mailcontent = "Customer Name: ".str_replace("\r\n", "", $name)."\n".
                   "Customer Email: ".str_replace("\r\n", "", $email)."\n". 
                   "Customer Feedback: ".substr_replace("\r\n", "", $feedback)."\n";


    $from = "From: webserver@example.com";

    //mail function
    //nl2b replaces \n with <br>

    mail($toaddress, $subject, $mailcontent, $from);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Feedback submitted</title>
</head>
<body>
    <h1>Feedback submitted</h1>

    <p>Your feedback shown below has been sent</p>

    <p><?php echo nl2br(htmlspecialchars($feedback)); ?></p>
</body>
</html>