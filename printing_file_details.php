<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File details</title>
</head>
<body>
    <h1>Printing file details</h1>

    <?php

        //clear the clearstatcache

        clearstatcache();
        
        //check if the file is in the query

        if(!isset($_GET['file'])){

            echo 'File has not been provided';
        }
        else{

            $dir = '/Applications/XAMPP/xamppfiles/htdocs/Php/uploads/';

            //delete some directory information for security

            $uploaded_file = basename($_GET['file']);

            //store the safe file in the directory to the variable
            $good_file = $dir.$uploaded_file;

            echo "File details: ".$good_file."<br>";
            echo "<h2>Data</h2>";
            echo "<br>";
            echo "Last Accessed: ".date('j F Y H:i', fileatime($good_file));
            echo "<br>";
            echo "Last Modified: ".date('j F Y H:i', filemtime($good_file));
            echo "<br>";
            
            //get user information using $file_owner()
            //posix_getpwuid - get the current user id
            $user_information = posix_getpwuid(fileowner($good_file));

            echo 'File owner: '.$user_information['name']."<br>";

            $file_group = posix_getgrgid(filegroup($good_file));


            echo "File group: ".$file_group['name']."<br>";

            echo 'Permissions: '.decoct(fileperms($good_file)).'<br/>';

            echo 'File Type: '.filetype($good_file).'<br/>';

            echo 'File Size: '.filesize($good_file).' bytes<br>';

            echo '<h2>File Tests</h2>';

            echo 'Directory?: '.(is_dir($good_file) ? 'true' : 'false').'<br/>';

            echo 'Executable?: '.(is_executable($good_file) ? 'true' : 'false').'<br/>';

            echo 'File?: '.(is_file($good_file) ? 'true' : 'false').'<br/>';

            echo 'A link?: '.(is_link($good_file) ? 'true' : 'false').'<br/>';

            echo 'Readable?: '.(is_readable($good_file) ? 'true' : 'false').'<br/>';

            echo 'Writable?: '.(is_writable($good_file) ? 'true' : 'false').'<br/>';

        }



    ?>
</body>
</html>