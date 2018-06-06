<?php


// Inclure le fichier partials/header.php

require(__DIR__.'/partials/header.php');

//Récupérer la liste des bières
    //Requête
$query = $db->query('SELECT beer.id, beer.name, beer.image , brand.id as id_brand, brand.name as name_brand, ebc.code, ebc.color 
FROM beer 
INNER JOIN brand ON beer.Brand_id = Brand.id
INNER JOIN ebc ON beer.ebc_id = ebc.id'
);
    //Résultat
$beers = $query->fetchAll();
$countSQL++;

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
                                    <?php echo '<br/> Marque : ' . $beer['name_brand']; ?>
                                    <?php echo '<br/> Couleur : ' . $beer['color']; ?>
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