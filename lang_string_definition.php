<?php

    function diff_Strings(){

        //select $_SESSION

        switch($_SESSION['lang']){

            case "en":
                define(TXT, "Welcome to our site!");
                define(LANG_CHOICE, "Choose a language");
                break;
            
            case "fr":
                define(TXT, "Bienvenue á notre site internet!");
                define(LANG_CHOICE, "Choisissez une langue");
                break;

            default:
                define(TXT, "Welcome to our site!");
                define(LANG_CHOICE, "Choose a language");
                break;
        }
    }

?>