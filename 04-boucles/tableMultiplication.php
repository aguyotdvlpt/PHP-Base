
<table>
<?php

    echo "<tr>";
for ($i =0; $i<11; $i++) {
        if($i ==0) {
            echo "<td>" . "x" . "</td>";
        } else {
            echo "<td>" . $i ."</td>";
        }
    
}
for ($i=0; $i<11; $i++) {
    echo "<tr>";
        for($j=0; $j<11; $j++) {
            
                if ($j == 0) {
                    echo "<td>" . $i . "</td>";
                }else{
                    echo "<td>" . $j * $i . "</td>";
                }

            }
        
        
    echo "</tr>";
}   






?>
</table>