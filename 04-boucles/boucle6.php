<?php

/* 
5 espaces  1 étoile   5 espaces
4 espaces  3 étoiles  4 espaces
3 espaces  5 étoiles  3 espaces
2 espaces  7 étoiles  2 espace
1 espace   9 étoiles  1 espace
0 espaces  11 étoiles 0 espaces

*/

$start =5;
$size = 1; //Le nombre d'étoiles à afficher

for ($y=0; $y<6; $y++) {
    
    for($x=0; $x<11; $x++){
        if ($x === $start) { // On met une étoile à une position spécifique
            for ($a = 0; $a <$size; $a++) {
                echo "🌕";
            }
            $x += $size-1; //Pour éviter le décalage des étoiles
        } else {
            echo '🌑';
        }
    }
    $start--; // On décrémente la variable à la fin de chaque ligne
    $size += 2; //On ajoute 2 à la fin de chaque ligne
    
    echo "<br />";
}



/* $hauteur= 5;

for ($i = 0; $i < $hauteur; $i++)
{
    for ($k = ($hauteur - $i); $k > 0; $k--)
    {
        echo "&nbsp";
    }
    
    for($j=0;$j<=$i;$j++)
    {
        echo "*";
    }
    echo "<br />";
}
 */



?>