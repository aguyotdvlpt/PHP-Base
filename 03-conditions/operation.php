<?php
$a = 15;
$b = 5;
$c = 8;

$resultat1 = $a+$b+$c;
$resultat2 = $a*($b-$c);
if ($a > 0) { // On vérifie que le nombre a est supérieur à 0 pour la division
$resultat3 = ($c-$b)/$a;
} else {
    // die('Bonjour'); // Arrête le script PHP
    $resultat3 = 'Division par 0 impossible';
}

echo $a . " + " . $b . " + " . $c . " = " . $resultat1;
echo "<br />";
echo $a . " x (" . $b . " - " . $c . ") = " . $resultat2;
echo "<br />";
echo "(" . $c . " - " . $b . ") / " . $a . " = " . $resultat3;
echo "<br />";

/* INTERPOLATION 
echo "($nombre3 - $nombre2) / $nombre1 = $resultat3";
*/

if ($resultat1 < 20 || $resultat2 < 20 || $resultat3 < 20) {
    echo "<br /> Une des opérations renvoie moins de 20";
}

?>