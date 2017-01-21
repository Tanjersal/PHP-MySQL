<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Scan Directory</title>
</head>
<body>
    <h1>Use scandir functions to sort directory</h1>
    
    <?php
        //directory

        $file_dir = '/Applications/XAMPP/xamppfiles/htdocs/Php/uploads/';

        //scan the directory

        $file1 = scandir($file_dir);

        $file2 = scandir($file_dir, 1);

        echo 'uploaded directory is '.$file_dir.'<br><br>';

        echo 'Directory contains sorted descending :';

        foreach($file1 as $file){

            if($file != '.' && $file != '..'){
                
                echo '<p>'.$file.'</p>';
            }
        }

        echo 'Directory contains sorted ascending :';

        foreach($file2 as $file2){

            if($file2 != '.' && $file2 != '..'){

                echo '<p>'.$file2.'</p>';
            }
        }

    ?>
</body>
</html>