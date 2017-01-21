<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Uploading...</title>
</head>
<body>
    <h1>File is uploading...</h1>

    <?php

        //start the session to get some stats

        session_start();
        //file manipulations 

        //basename() should be used to rename files name as it will prevent from file upload attacks
        //$_FILES['the_file']['tmp_name'] tmp name and locaiton where the file has been temporary stored
        //$_FILES['the_file']['error'] error code associated with file uploading
        //$_FILES['the_file']['name'] the name of the file
        //$_FILES['the_file']['size'] the size of the file
        ///$_FILES['the_file']['type'] the MIME type of the file -- text/plain o image 

        if ($_FILES['the_file']['error'] > 0){

            echo "There is a problem : ";

            switch($_FILES['the_file']['error'])
            {
                case 1:
                    echo "Uploading file exceed the limits";
                    break;

                case 2:
                    echo "Uploading file exceed the limits specified in html";
                    break;

                case 3:
                    echo "The uploading file was partially uploaded!";
                    break;

                case 4:
                    echo "No file was uploaded";
                    break;

                case 6:
                    echo "Missing a temporary folder";
                    break;

                case 7:
                    echo "Failed to write to disk";
                    break;
                
                case 8:
                    echo "A PHP extension blocked the upload!";
                    break;
            }
            exit;
        }

        //check the MIME type of the file

        if($_FILES['the_file']['type'] != 'image/png'){

            echo "Problem...File is not a png file";
            exit;
        }

        //stored the file

        $uploadedFile = '/Applications/XAMPP/xamppfiles/htdocs/Php/uploads/'.$_FILES['the_file']['name'];

        //if the file is uploaded to the temp folder

        if (is_uploaded_file($_FILES['the_file']['tmp_name'])){

            //move the file to temporay destination
            if(!move_uploaded_file($_FILES['the_file']['tmp_name'], $uploadedFile)){

                echo "Problem...Could not move file to destination folder";
                exit;
            }
            
        }
        else{

                echo "Possible file upload attack. Filename: ".$_FILES['the_file']['name'];
                exit;
        }

        echo "File upload was successful!";
        echo 'You uploaded the following file';

        #echo  '<img src="uploads/'.$_FILES['the_file']['name'].'"/>';
        
        echo '<pre>';
        var_dump($_SESSION);
        echo '</pre>';
    ?>
    
</body>
</html>