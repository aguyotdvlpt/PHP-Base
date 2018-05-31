<?php

// Une constante en PHP est une variable qui ne varie pas.
// Les constantes sont en majuscules par convention
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'beer_pdo');
// Connexion à la BDD

try {
$db = new PDO('mysql:host='.HOST.';dbname='.DB.';charset=utf8', USER, PASS , [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);

} catch (Exception $e) {
    echo $e->getMessage(); // On récupère le message de l'exception
}