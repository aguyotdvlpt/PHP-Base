<?php

// mysql, host localhost, dbname movie_catalog, user root, pass ''

// On crée une connexion à la BDD

$db = new PDO('mysql:host=localhost; dbname=movie_catalog; charset=UTF8', 'root', '', [
    // On récupère tous les résultats en tableau associatif
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO:: FETCH_ASSOC
]);
var_dump($db);

// On crée une requête pour récupérer tous les films
$query = $db->query('SELECT * FROM movie');

var_dump($query);


// Pour récupérer les résultats

// Eviter de faire un fetch avant un fetchAll car cela déplace 
// le curseur sur le tableau et de ce fait commence au 2ème index
/* $movie = $query->fetch();
var_dump($movie); */

$movies = $query->fetchAll();
var_dump($movies);

// Parcourir la liste des films et afficher leur titre dans une liste

?>

<ul>
    <?php
        foreach($movies as $movie) {
            $date = strtotime($movie['date']);
            $newdate = date('Y', $date);
            echo '<li>' . $movie['name'] . ' , ' . $newdate .  '</li>';
        }
    ?>
</ul>



