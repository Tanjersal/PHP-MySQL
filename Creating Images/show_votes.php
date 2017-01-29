<?php

    $votes = $_POST['vote'];

    if(empty($votes)){

        echo "<p>Please make a choice before you submit!</p>";
        exit;
    }

    //insert votes in db 

    $votes_db = new mysqli('localhost', 'root', '', 'poll');

    if(mysqli_connect_errno()){

        echo "<p>Unable to connect to the database</p>";
        exit;
    }

    //add votes
    $vquery = 'update poll_results set num_votes = num_votes + 1 where candidate=?';
    $stmt = $votes_db->prepare($vquery);
    $stmt->bind_param('s', $votes);
    $stmt->execute();

    $stmt->free_result();

    //retrieve vote
    $rquery = 'select candidate, num_votes from poll_results';
    $rstmt= $votes_db->prepare($rquery);
    $rstmt->execute();
    $rstmt->store_result();

    //store the results in those variables
    $rstmt->bind_result($candidate, $num_votes);

    $num_cand = $rstmt->num_rows(); 

    $total_votes = 0;

    while($rstmt->fetch()){

        $total_votes = $total_votes + $num_votes;
    }

    $rstmt->data_seek(0);
?>