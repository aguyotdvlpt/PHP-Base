<?php
$a = 15;
$b = 5;
$c = 8;

$resultat1 = $a+$b+$c;
$resultat2 = $a*($b-$c);
$resultat3 = ($c-$b)/$a;

echo $a . " + " . $b . " + " . $c . " = " . $resultat1;
echo "<br />";
echo $a . " x (" . $b . " - " . $c . ") = " . $resultat2;
echo "<br />";
echo "(" . $c . " - " . $b . ") / " . $a . " = " . $resultat3;
echo "<br />";

if ($resultat1 < 20 || $resultat2 < 20 || $resultat3 < 20) {
    echo "<br /> Une des opérations renvoie moins de 20";
}



?>