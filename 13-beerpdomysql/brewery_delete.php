<?php
session_start();
require('config/database.php');
require('config/functions.php');


// Si l'utilisateur n'est pas connecté, on l'empêche de supprimer une brasserie
if (!userIsLogged()) {
    header('HTTP/1.1 403 Forbidden');
    echo 'Accès interdit';
    exit();
}

// Redirection en HTML

// Attention au CSRF token
//echo '<meta http-equiv="refresh" content="2; url=brewery_list.php">';

$query = $db -> prepare('DELETE FROM brewery WHERE id= :id');
$query->bindValue(':id', $_GET['id'], PDO:: PARAM_INT);
if ($query -> execute()) {
    header('Location: brewery_list.php');
} 
