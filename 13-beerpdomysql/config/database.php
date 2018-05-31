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
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, //Active les erreurs SQL
]);

} catch (Exception $e) {
    echo $e->getMessage(); // On récupère le message de l'exception
    echo '<img src="img/confused-travolta-50.gif" />';

    //On peut rediriger vers une autre page suite à l'erreur :
    /* header('Location: http://www.stackoverflow.com');
    exit(); */

    //On peut ouvrir un nouvel onglet qui effectue une recherche sur Google avec l'erreur qu'on a obtenu
    /* echo '<script>window.open("http://www.google.fr/search?q='.$e->getMessage().'";
    </script>'; */


}