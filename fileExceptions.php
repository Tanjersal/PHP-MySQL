<?php
    //user defined exception that will be used later for file opening, writing and lock to read/write

    class fileOpenException extends Exception
    {   
        //toString() function

        function __toString()
        {
            return "fileOpenExcetion ".$this->getCode()." : ".$this->getMessage()." in line ".$this->getLine();
        }

    }

    class fileWriteException extends Exception
    {
        function __toString()
        {
            return "fileWriteException ".$this->getCode()." : ".$this->getMessage()." in line ".$this->getLine();
        }
    }

    class fileLockException extends Exception
    {

        function __toString()
        {
            return "fileLockException ".$this->getCode()." : ">$this->getMessage()." in line ".$this->getLIne();
        }
    }

?>