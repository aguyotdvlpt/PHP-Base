<!-- Pour afficher plus d'un espace en html -->
<h1>toto &nbsp;&nbsp;&nbsp;&nbsp;toto</h1>

<?php

$maVariable = 'Ma variable ';
$monAge = 26;
$c = 10;
$d = $monAge + $c; //26 + 10 (36)

// L'opérateur de concaténationen PHP est le .

echo $maVariable . $d . "<br />"; // Ma variable 36

echo 'a' . 'b' . "<br />"; //Affiche ab
echo 1 . 1 . "<br />"; //Affiche 11
echo 1 + 1 . "<br />"; // Affiche 2

// Interpolation de variables possibles grâce aux doubles quotes
echo "$maVariable $d <br />";