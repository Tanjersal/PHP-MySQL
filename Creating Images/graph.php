<?php
    //create a canvas, draw a shape and output image

    //canvas

    $height = 200;
    $width = 200;

    //create black and white image
    $img = imagecreatetruecolor($width, $height);

    //set the background to white and bleu

    $white = imagecolorallocate($img, 255, 255, 255);
    $blue = imagecolorallocate($img, 0, 0, 255);

    //draw

    imagefill($img, 0, 0, $blue);
    imageline($img, 0, 0, $width, $height, $white);
    imageline($img, 100, 0, $height, $width, $white);

    imagestring($img, 5,38,100, 'Hello World!', $white);
    //output image as png and clean resource
    header("Content-Type: image/png");
    imagepng($img);
    imagedestroy($img);
?>


