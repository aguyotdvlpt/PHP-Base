<?php

// mysql, host localhost, dbname movie_catalog, user root, pass ''

// On crée une connexion à la BDD

$db = new PDO('mysql:host=localhost; dbname=movie_catalog; charset=UTF8', 'root', '', [
    // On récupère tous les résultats en tableau associatif
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO:: FETCH_ASSOC
]);

// Ecrire une requête qui récupère un film par son ID
// L'ID doir provenir de l'URL
// Exemple : Si je saisis movie.php?id=43, la requête doit récupérer le film qui a l'id 43.

$id = $_GET['id'];
/* var_dump($id); */

$query = $db->query('SELECT * FROM movie WHERE id ='. $id);
/* var_dump($query); */

$movies = $query->fetchAll();
/* var_dump($movies); */

foreach($movies as $movie) {
echo 'Le film qui a l\'id n°' . $id . ' est : ' .$movie['name'];
}
