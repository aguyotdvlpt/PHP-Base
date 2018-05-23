<?php

/* $min = 20;
$max = 50;
$resultat = $max - $min;

while ($resultat !== 0) {
    $resultat - $min = $resultat;
    
}
 echo $resultat;
 */

$a = 120;
$b = 45;

while ($a != $b) {
    if( $a > $b ){ 
        $a = $a - $b; 
    }
    else if( $a < $b ) { 
        $b = $b - $a; 
    }
echo $a;

?>