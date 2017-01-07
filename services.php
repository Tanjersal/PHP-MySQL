<?php
    //services page - inherits page.php and override display()

    require('page.php');


    //create ServicesPage class 

    class ServicesPage extends Page
    {
        //row of buttons for services

        private $rowsButtons = array(

            'Re-engineering'=>'reengineering.php',
            'Standards Compliance'=>'standards.php',
            'Buzzword Compliance'=>'buzzword.php',
            'Mission Statements'=>'mission.php'

        );

        //override display 
        public function Display()
        {
            echo "<html>\n<head>\n";

            $this->DisplayTitle();

            $this->DisplayKeywords();

            $this->DisplayStyles();

            echo "</head>\n<body>\n";

            $this->DisplayHeader();

            //first row of buttons from page
            $this->Menu($this->buttons);

            //second row of buttons from services
            $this->Menu($this->rowsButtons);

            echo $this->content;

            $this->DisplayFooter();

            echo "</body>\n</html>\n";
        }
    }

    //create the services page 

    $services = new ServicesPage();

    //add content
    $services->content = "<p>At TLA Consulting, we offer a number

  of services.  Perhaps the productivity of your employees would

  improve if we re-engineered your business.</p>";


  //call the dispaly function
  $services->Display();

?>