<?php

// Vérifier si le dossier log existe à la racine du projet
// S'il n'existe pas, on doit le créer

$folder = __DIR__.'/../log'; // c://xampp\htdocs\PHP-base\13-beerpdomysql\log

if (!is_dir($folder)) {
    mkdir($folder); // On crée le dossier s'il n'existe pas
} 


if (isset($_GET['q'])) {
// Définis le fichier de log pour la recherche
$filename = $folder.'/search.log'; // c://xampp\htdocs\PHP-base\13-beerpdomysql\log\search.log

// On ouvre le fichier et on place le curseur à la fin
$file = fopen($filename, 'a+');

// On écrit dans le fichier. On ajoute une ligne
// [Recherche] Un utilisateur a cherché "Duvel" le 05/06/2018 à 11h45
$query = $_GET['q'];
$log = '[Recherche] Un utilisateur a cherché " '. $query .'" le ' . date('d/m/Y à H\hi') . PHP_EOL; // PHP EOL = PHP End Of line permet le retour à la ligne ( \n\r)
fwrite($file, $log);
fclose($file);
}