<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Directory Browsing</title>
</head>
<body>
    <h1>Browsing Directory</h1>

    <?php
        //list the content of a directory using
        //opendir(), closedir and readdir

        //grab the current directory

        $current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Php/uploads/';

        //open the directory

        $dir_content = opendir($current_dir);

        echo 'Uploaded directory is '.$current_dir;

        echo "<p>Directory Listing: </p><ul>";

        //read the content of a directory into $file and check for EOF
        while(false !== ($file = readdir($dir_content))){

            //strip '.' and '..'

            if($file!= '.' && $file != '..'){

                //using a link instead 
                echo '<li><a href="filedetails.php?file='.$file.'">'.$file.'</a></li>';
                //echo "<li>".$file."</li>";
            }
            
        }

        echo "</ul>";

        //close the directory

        closedir($dir_content);
    ?>
</body>
</html>