<?php 
// Configuration de PDO pour la base de données
// On utilise la notation en absolue pour se repérer
require(__DIR__.'/../config/database.php');
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
            <li class="nav-item <?php echo ($page =='index') ? 'active' : '' ?>">
              <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php echo ($page =='beer_list') ? 'active' : '' ?>">
              <a class="nav-link" href="beer_list.php">Bières</a>
            </li>
            <li class="nav-item <?php echo ($page == 'beer_add') ? 'active' : '' ?>">
              <a class="nav-link" href="beer_add.php">Ajouter une bière</a>
            </li>            
          </ul>
        </div>
</div>
      </nav>
     <?php //var_dump(basename($_SERVER['REQUEST_URI'], '.php')); ?>