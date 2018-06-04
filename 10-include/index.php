<?php

include('a.php'); // Execute le contenu du fichier A

// include('aa.php'); Si le fichier n'existe pas, affiche un wartning maius le reste du code s"execute

include('a.php'); // Execute le contenu du fichier A un deuxième fois 

include_once('a.php'); // Affiche le contenu du fichier a seulement s'il n'a pas encore été affiché

require ('b.php'); //Si b.php n'existe pas, le reste du code ne se lance pas.
echo'Reste du site';

var_dump(__DIR__); //Emplacement du répertoire courant sur le serveur
var_dump(__FILE__); // Emplacement du fichier sur le serveur

require(__DIR__.'/b.php');