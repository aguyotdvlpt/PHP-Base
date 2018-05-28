<?php

//1. Créer une fonction calculant le carré d'un nombre

function carre($nombre) {
    $result = $nombre * $nombre;
    return $result;
}

echo carre(3);
echo '<br/>';
echo '<br/>';

//2. Créer une fonction calculant l'aire d'un rectangle et d'un cercle

function aireRectangle($longueur, $largeur) {
    $aire = $longueur * $largeur;
    return $aire;
}

function aireCercle($rayon) {
    $aire = $rayon * $rayon * M_PI;
    return $aire;
}

//3. Créer une fonction calculant le prix TTC. Nous aurons besoins de 2 variables, le prix HT et le taux

function prixTTC($prixHT, $taux) {
    $prixTTC = $prixHT * (1 + ($taux/100));
    return $prixTTC;
}
echo prixTTC(100,20);
echo '<br/>';
echo '<br/>';

//4. Ajouter un 3ème paramètre à cette fonction permettant de l'utiliser dans les 2 sens

function htToTtc($choix, $prix, $taux) {

    if ($choix === 1) {
        $prixTTC = $prix * (1 + ($taux/100));
    return $prixTTC;
    }

    if ($choix === 2) {
        $prixHT = $prix / (1 + ($taux/100));
    return $prixHT;
    }
}

echo htToTTC(1,100,20);