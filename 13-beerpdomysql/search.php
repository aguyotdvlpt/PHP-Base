<?php

//Redirection vers une page 404 s'il n'y a pas eu de recherche
if (!isset($_GET['q']) || empty($_GET['q'])) {
    //Redirection vers la liste des bières
    header('Location: beer_list.php');
}

// Inclure le fichier config/database.php
// Inclure le fihcier partials/header.php

require(__DIR__.'/partials/header.php');

//
$q = $_GET['q'];

$query = $db->prepare("SELECT * FROM beer WHERE `name` LIKE :q");
$query->bindValue(':q', '%'.$q.'%', PDO::PARAM_STR);
$query ->execute();
$beers = $query->fetchAll();

$Q = ucfirst($q); //Fonction toUppercase en php

//var_dump($beers);

?>
    <h1 class='text-center'>RECHERCHE</h1>
    <h3 class='text-center'> Résultat de votre recherche pour : <?php echo $Q ?></h3>

    <div class="row">
<?php     
    foreach($beers as $beer) { ?>
    <div class="container">
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
    </div>
<?php }

?> </div>

<?php
require(__DIR__.'/partials/footer.php');