<htm>
    <body>
        <table border="0" cellpadding="3">
            <tr>
               <td align="center" bgcolor="#cccccc">Distnace</td>
               <td align="center" bgcolor="#cccccc">Cost</td> 
            </tr>
            
            <?php
            
            $distance = 50;
            
            while($distance<=250)
            {
                echo "<tr>\n <td align=right>".$distance."</td>";
                
                echo "  <td align = right>". $distance / 10 ."</td>\n</tr>\n";
                
                $distance = $distance + 50;
            }
            
            ?>
            
        </table>
    </body>
</htm>