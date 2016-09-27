<?php

    //load the pictures in the array

    $pictures = array('tire.jpg', 'oil.jpg', 'spark_plug.jpg', 'door.jpg') ;
    
    //shuffle the pictures
    shuffle($pictures);
?>
<htm>
    <head>
        <title>Bob's Auto Parts - fornt page</title>
    </head>
    <body>
        
        <h1>Bob's Auto Parts</h1>
        
        <div align="center">
            
            <table width="100%">
               
               <tr>
                   
                   <?php
                   
                        for($i=0; $i< 3;$i++)
                        {
                            echo "<td align=\"center\"><img src=\"";
                            echo $pictures[$i];
                            echo "\"/></td>";
                        }
                   
                   ?>
                   
               </tr>
                
            </table>
            
        </div>
        
    </body>
</htm>