<?php
    //master file for sending local header info 

    //if lang is not specified set it to english
    
    if(!(isset($_SESSION['lang'])) (!$_GET['lang'])){

        $_SESSION['lang'] = 'en';

        $current_language = 'en';
    }
    else
    {
        //retrieve the current language specify by the user_error
        $current_language = $_GET['lang'];

        $_SESSION['lang'] = $current_language;
    }

    switch($current_language){

        case "eng":
            define("CHARSET", "ISO-8859-1");
            define("LANGCODE", "en");
            break;

        case "fr":
            define("CHARSET", "UTF-8");
            define("LANGCODE", "fr");
            break;
        
        default:
            define("CHARSET", "ISO-8859-1");
            define('LANGCODE', 'en');
            break;
    }

    //set the header
    header("Content-Type: text/html; Charset=".CHARSET);
    header("Content-Language :".LANGCODE);



?>