<?php 
session_start();
// Configuration de PDO pour la base de données
// On utilise la notation en absolue pour se repérer
require(__DIR__.'/../config/database.php');
// Inclure le fichier avec toutes nos fonctions PHP
require(__DIR__.'/../config/functions.php');
?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
    <title>Beer PDO</title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link href="sticky-footer-navbar.css" rel="stylesheet">
  <link  rel="stylesheet" href="css/style.css">
</head>

<body>

  <header>
 
  </header>

  <body>

     <!-- *************   LE MENU   ****************  -->
    <div class="">
      <nav class="navbar navbar-expand-lg navbar-dark top bg-dark">
          <div class="container">
            <img class="logo mr-3" src="./img/logo.png" />
            <a class="navbar-brand" href="#">Beer PDO</a>

      <!-- Formulaire de recherche -->
   
       
      <form class="form-inline my-2 mx-auto" method="GET" action="search.php">
        <label class="sr-only" for="search">Search</label>
        <input type="search" class="form-control mb-2 mr-sm-2 mx-5" name="q" id="search" placeholder="Recherche">
        <button type="submit" class="btn btn-warning mb-2 mx-auto">Rechercher !</button>
      </form>
      
      <!-- Fin du Formulaire de recherche -->

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <?php
          $page = basename($_SERVER['REQUEST_URI'], '.php'); ?>
           <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?php echo ($page == 'index') ? 'active' : '' ?>">
                        <a class="nav-link" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item dropdown <?php echo ($page == 'beer_list' || $page == 'beer_add') ? 'active' : '' ?>">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                            Bières
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="beer_list.php">Les Bières</a>
                            <a class="dropdown-item" href="beer_add.php">Ajouter une bière</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown <?php echo ($page == 'brewery_list' || $page == 'brewery_add') ? 'active' : '' ?>">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                            Brasseries
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="brewery_list.php">Les Brasseries</a>
                            <a class="dropdown-item" href="brewery_add.php">Ajouter une brasserie</a>

            <!-- Si un utilisateur existe dans la session, on affiche son email et un lien vers logout.php pour se déconnecter
                S'il n'y a pas d'utilisateur dans la session, on affiche les 2 liens pour s'inscrire et se connecter -->
            <?php if (isset($_SESSION['user'])) {?>
              <li class="navbar-text text-warning pl-3" >
               <?php echo $_SESSION['user']['email'] ?>
              </li>
              <li class="nav-item <?php echo ($page =='logout') ? 'active' : '' ?>">
                <a class="nav-link" href="logout.php">Se déconnecter</a>
              </li>    

            <?php } 
            
            else { ?>  

              <li class="nav-item <?php echo ($page =='register') ? 'active' : '' ?>">
                <a class="nav-link" href="register.php">Inscription</a>
              </li>
              <li class="nav-item <?php echo ($page =='login') ? 'active' : '' ?>">
                <a class="nav-link" href="login.php">Login</a>
              </li>
            <?php } ?> 

            </ul>
        </div>
    </div>
      </nav>
  