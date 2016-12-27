<?php

    //create variables

    $name = $_POST['name'];
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];

    //set up static information to use in mail function

    $toaddress = "thiombianofab2002@yahoo.fr";
    $subject = "Feedback from Bob's website";

    $mailcontent = "Customer Name: ".filter_var($name)."\n".
                   "Customer Email: ".$email."\n".
                   "Feedback from customer: \n".$feedback."\n";

    $fromaddress = "From: webserver@example.com";

    //invoke mail function to send email

    mail($toaddress, $subject, $mailcontent, $fromaddress);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Feedback submitted</title>
</head>
<body>
    <h1>Feedback submitted</h1>

    <p>Your feedback has been sent</p>
</body>
</html>