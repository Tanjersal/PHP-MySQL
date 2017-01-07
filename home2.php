<?php

    //include the page.php 

    include("page.php");

    //create the home page 
    
    $homepage = new Page();

    //add content

    $homepage->content = "<section> 
                                <h2>Welcome to the home of LTA Consulting LTD.</h2>
                                <p>Please some time to get to know our business.</p>
                                <p>We are leaders in the services we provide to our community.</p>
                        </section>";

    //call display function to display the page 

    $homepage->Display();


?>