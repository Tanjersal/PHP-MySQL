<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>submission results</title>
</head>
<body>
    <h1>Results</h1>

    <?php

        //get the form submission

        $url = $_POST['url'];
        $email = $_POST['email'];

        //parse url and retrieve the host only
        $url = parse($url);

        $host = $url['host'];

        if(!($ip = gethostname($host))){

            echo 'The host does not have a valid IP address';
            die();
        }

        echo "The host ".$host." is at ip address ".$ip."<br>";

        //check email

        $email = explode('@', $email);

        $e_host = $email[1];

        if (!getmxrr($e_host, $mxhostsarray)){

            echo 'Email address is not at valid host';
            exit;
        }

        echo 'Mail is delivered via: <br>';

        foreach($mxhostsarray as $mx){

            echo $mx;
        }

        echo "Submission was perfect!";

    ?>
</body>
</html>