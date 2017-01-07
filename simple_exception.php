<?php

    //example try and catch block - exceptions are thrown manually in php

    try
    {
        throw new Exception('A terrible error has occured', 7);
    }
    catch(Exception $e)
    {
        echo "Exception ".$e->getCode().": ".$e->getMessage()."<br>"." in ".$e->getFile()." on line ".$e->getLine();
    }

?>