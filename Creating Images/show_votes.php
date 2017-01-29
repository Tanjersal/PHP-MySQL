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

    //perform the calculations

    putenv('GDFONTPATH=Library/Fonts/Baoli.ttc');

    $width = 500;        // width of image in pixels

    $left_margin = 50;   // space to leave on left of graph

    $right_margin= 50;   // space to leave on right of graph

    $bar_height = 40;

    $bar_spacing = $bar_height/2;

    $font_name = 'Baoli';

    $title_size= 16;     // in points

    $main_size= 12;      // in points

    $small_size= 12;     // in points

    $text_indent = 10;   // position for text labels from edge of image

    // Set up initial point to draw from

    $x = $left_margin + 60;  // place to draw baseline of the graph

    $y = 50;                

    $bar_unit = ($width-($x+$right_margin)) / 100;   // one "point" on the graph

    // Calculate height of graph - bars plus gaps plus some margin

    $height = $num_candidates * ($bar_height + $bar_spacing) + 50;

    //create the canvas

    $img = imagecreatetruecolor($width, $height);

    $white = imagecolorallocate($img, 255,255,255);
    $black = imagecolorallocate($img, 0,0,0);
    $blue = imagecolorallocate($img, 0, 64, 128);
    $pink = imagecolorallocate($img, 255, 78,345);

    $text_color = $black;

    $percent_color = $black;

    $bg_color = $white;

    $line_color = $black;

    $bar_color = $blue;

    $number_color = $pink;

    imagefilledrectangle($img, 0,0, $width, $height, $bg_color);
    imagerectangle($img, 0, 0, $width-1, $height-1, $line_color);

    $title = "Voting Results";

    $title_dimensions = imagettfbbox($title_size, 0, $font_name, $title);

    $title_length = $title_dimensions[2] - $title_dimensions[0];

    $title_height = abs($title_dimensions[7] - $title_dimensions[1]);

    $title_above_line = abs($title_dimensions[7]);

    $title_x = ($width-$title_length)/2;  // center it in x

    $title_y = ($y - $title_height)/2 + $title_above_line; // center in y gap

    imagettftext($img, $title_size, 0, $title_x, $title_y,

                $text_color, $font_name, $title);

    // Draw a base line from a little above first bar location

    // to a little below last

    imageline($img, $x, $y-5, $x, $height-15, $line_color);

    //fill in graph with date 

    while ($rstmt->fetch()){

         if ($total_votes > 0) {

        $percent = intval(($num_votes/$total_votes)*100);

    } else {

        $percent = 0;

    }

    // Display percent for this value

    $percent_dimensions = imagettfbbox($main_size, 0, $font_name, $percent.'%');

    $percent_length = $percent_dimensions[2] - $percent_dimensions[0];

    imagettftext($img, $main_size, 0, $width-$percent_length-$text_indent,

                $y+($bar_height/2), $percent_color, $font_name, $percent.'%');

    // Length of bar for this value

    $bar_length = $x + ($percent * $bar_unit);

    // Draw bar for this value

    imagefilledrectangle($img, $x, $y-2, $bar_length, $y+$bar_height, $bar_color);

    // Draw title for this value

    imagettftext($img, $main_size, 0, $text_indent, $y+($bar_height/2),

                $text_color, $font_name, $candidate);

    // Draw outline showing 100%

    imagerectangle($img, $bar_length+1, $y-2,

                    ($x+(100*$bar_unit)), $y+$bar_height, $line_color);

    // Display numbers

    imagettftext($img, $small_size, 0, $x+(100*$bar_unit)-50, $y+($bar_height/2),

                $number_color, $font_name, $num_votes.'/'.$total_votes);

    // Move down to next bar

    $y=$y+($bar_height+$bar_spacing);


   
    }

    header('Content-type:  image/png');

    imagepng($img);


    $rstmt->free_result();

    $votes_db->close();

    imagedestroy($img);



?>