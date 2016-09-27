<?php

    // short variables from form

    $name = $_POST['name'];
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];

    //set up some static information to insert in mail function

    $toaddress = "feedback@example.com";

    $subject = "feddback from web site";

    $mailcontent = "Customer name: ".$name."\n"."Customer email: "$email."\n"."Customer feedback: ".$feedback."\n";

    $fromaddress = "From: webserver@example.com";

    //call mail function to send mail

    mail($toaddress, $subject, $mailcontent, $fromaddress);

?>


<html>
    <head>
       
        <title>Bob's Auto Parts - Feedback Submitted</title>
        
    </head>
    <body>
       
        <h1>Feedback submitted</h1>
        
        <p>Your feedback has been sent.</p>
        
    </body>
</html>