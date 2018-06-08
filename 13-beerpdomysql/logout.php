<?php 
session_start();

// Supprimer la session

//Il vaut mieux détruire seulement l'utilisateur plutôt que de détruire complétement la session
if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
}

// Supprimer le cookie s'il existe
if (isset($COOKIE['user'])) {
    unset($COOKIE['user']);
    setcookie('id', '', time() - 3600);
    unset($_COOKIE['token']);
    setcookie('token', '', time() - 3600);
}

// Rediriger vers l'accueil
header('Location: index.php');
exit();

