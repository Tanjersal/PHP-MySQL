<?php
    //relection API used to get information about a php file

    //example using page.php 

    require_once('Page.php');

    $info = new ReflectionClass('Page');

    echo "<pre>".$info."</pre>";

?>