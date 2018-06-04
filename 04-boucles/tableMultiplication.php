
<table border="1" style="border-collapse: collapse">
<?php

    echo "<tr>";
for ($k =0; $k<11; $k++) {
        if($k == 0) {
            echo "<td align='center' style='width: 30px; height:30px' ><strong>" . "x" . "</strong></td>";
            echo "<td align='center' style='width: 30px; height:30px'><strong>" . $k ."</strong></td>";
        } else {
            echo "<td align='center' style='width: 30px; height:30px'><strong>" . $k ."</strong></td>";
        }
    
}
for ($i=0; $i<11; $i++) {
    echo "<tr>";
        for($j=0; $j<11; $j++) {
            
                if ($j == 0) {
                    echo "<td align='center' style='width: 30px; height:30px'><strong>" . $i . "</strong></td>";
                    echo "<td align='center' style='width: 30px; height:30px'>" . $j * $i . "</td>";
                }else{
                    echo "<td align='center' style='width: 30px; height:30px'>" . $j * $i . "</td>";
                }
            }
    echo "</tr>";
}   

?>
</table>