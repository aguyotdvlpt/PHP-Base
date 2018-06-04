<?php

echo "<h2> 3. Ecrire le code permettant de trouver le PGCD de 2 nombres</h2>";
$nombre1 = 845;
$nombre2 = 312;
$reste = null;
$pgcd = null;

// Le var_dump peut nous aider à comprendre le résultat d'une comparaison
var_dump(null !== 0);

echo 'Le PGCD de ' . $nombre1 . ' et ' .$nombre2 . ' est : ';

/* 845 % 312 = 221;
312 % 221 = 91;
221 % 91 = 39;
91 % 39 = 13;
39 % 13 = 0; */


$dividande = $nombre1;
$divisor = $nombre2;
while ($reste !== 0) {
    $pgcd = $divisor; // Le PGCD potentiel
  
    $reste = $dividande % $divisor; // 845 % 312 = 221;
    $dividande = $divisor; // 845 devient 312
    $divisor = $reste; // 312 devient 221 (321 % 221 = 91);

    if ($reste == 0) {
        echo $pgcd;
    }
}
 
?>
