<?php
// Créer une boucle qui affiche 10 étoiles

// Imbriquer la boucle dans une autre boucle afin d'afficher 10 lignes de 10 étoiles

for ($i=0; $i<10; $i++) {
    
    for($j=0; $j<10; $j++){
        echo "*";
    }
    echo "<br />";
}

echo '<br />';


/* $ligne = "";

for ($k=0; $k<10; $k++) {
    
        $ligne = $ligne . "*";
       echo $ligne . "<br />";
} */

for ($y=0; $y<11; $y++) {           //Affiche chaque ligne
      
    for($x=0; $x<$y; $x++){         // Affiche chaque colonne
        echo "*";
    }
    echo "<br />";
}

?>