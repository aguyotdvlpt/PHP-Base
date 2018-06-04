<?php


// Inclure le fichier partials/header.php

require(__DIR__.'/partials/header.php');

//Récupérer la liste des bières
    //Requête
$query = $db->query('SELECT * FROM beer');
    //Résultat
$beers = $query->fetchAll();

// Le contenu de la page
?>

    <div class="container pt-5">
        <h1 class="text-center">La Liste des Bières !</h1>
        <div class="row">
            <?php 
                // On affiche la liste des bières
                foreach($beers as $beer) { ?>
                    <div class="col-md-3 mt-4">
                        <div class="card mb-4 box-shadow">
                            <?php echo '<img class="beer-img card-img-top" src="'.$beer['image'].'"/>' ?>
                                <div class="card-body d-block text-center font-weight-bold">
                                    <?php echo $beer['name']; ?>
                                    <!-- <button type="button" class="d-block btn btn-primary mt-3 mx-auto">-->
                                    <a href="./beer_single.php?id=<?php echo $beer['id']?>" class="btn btn-primary mt-3 mx-auto btn-block w-75">Voir la bière</a>
                                    <!-- </button>' -->
                                    
                                </div>                             
                        </div>
                    </div>
            <?php } ?>
        </div>
    </div>
<?php
// Inclure le fichier partials/footer.php

require(__DIR__.'/partials/footer.php');