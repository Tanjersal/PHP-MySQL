<?php
    //page class will be used to build pages dynamically

    class Page
    {
        //attributes are things that will be changed dynamically in pages

        public $content;
        public $setTitle = "TLA Consulting Pty Ltd";
        public $keywords = "consulting, parts, auto";

        //navigation buttons - array

        public $buttons = array(

            'Home'=>'home.php',
            'Contact'=>'contact.php',
            'Services'=>'services.php',
            'Site Mao'=>'siteMap.php'

        );

        //accessors and mutators functions

        public function __set($name, $value)
        {
            $this->$name = $value;
        }

        //display function - Html

        public function Display()
        {

            echo "<html>\n<head>\n";

            $this->DisplayTitle();
            $this->DisplayKeywords();
            $this->DisplayStyles();

            echo "</head>\n<body>";

            $this->DisplayHeader();
            $this->Menu($this->buttons);
            echo $this->content;
            $this->DisplayFooter();

            echo"</body>\n</html>\n";
        }

        //function - title

        public function DisplayTitle()
        {
            echo "<title>".$this->setTitle."</title>";
        }

        //function - keywords

        public function DisplayKeywords()
        {
            echo "<meta name='keywords' content='".$this->content."'>";
        }

        //function - styles
        public function DisplayStyles()
        {
           ?>
                <link href="styles.css" type="text/css" rel="stylesheet">

            <?php
        }

        //function - header

        public function DisplayHeader()
        {
            ?>
                <!---page Header-->

                <header>
                    <img src="logo.gif" heigth="70" width="70">
                    <h1>TLA Consulting LTD</h1>
                </header>

            <?php
        }


        //function - Menu
        public function Menu($buttons)
        {
            echo "<---Menu---> <nav>";

            //loop through array

            while(list($name, $url) = each($buttons)){

                $this->DisplayButtons($name, $url, !$this->isURLCurrentPage($url));
            }


            echo "</nav>\n";
        }

        //function - isURLCurrentPage checks if we are on the current page. 
        //strpos($_SERVER['PHP_SELF'], $url) returns a number if the string $url is inside the superglobal variable $_SERVER['PHP_SELF']

        public function isURLCurrentPage($url)
        {
            if(strpos($_SERVER['PHP_SELF'], $url) === false)
            {
                return false;
            }
            else
            {
                return true;
            }
        }

        //function DisplayButtons
        //display the menu button active or not depending on the current page status

        public function DisplayButtons($name, $url, $active=true)
        {
            if($active)
            {
                ?>

                    <div class="menuitem">
                        <a href="<?=$url?>">
                            <img src="s-logo.gif" heigth="20" weigth="20">
                            <span class="menutext"><?=$name?></span>
                        </a>
                    </div>

                <?php
            }
            else
            {
                ?>
                    <div class="menuitem">
                        <img src="side-logo.gif">
                        <span class="menutext"><?=$name?></span>
                    </div>

                <?php
            }
        
        }

        //function footer

        public function DisplayFooter()
        {
            ?>

            <!--page footer-->

            <footer>
                 <p>&copy; TLA Consulting Pty LTD.</p>

                 <p>Please see our <a href="legal.php"> legal information page.</a></p>
            </footer>

            <?php
        }

    }
?>