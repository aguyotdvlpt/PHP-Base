<?php

require('partials/header.php');


$id = $_GET['id'];

$query = $db->prepare('SELECT * FROM brewery WHERE id = :id'); // :id est un paramètre que l'on choisit
$query->bindvalue(':id', $id, PDO::PARAM_INT); // On s'assure que l'id est bien un entier
$query -> execute(); 
$brewerys = $query->fetchAll();

 ?>

<!-- Le contenu de la page -->

<div class="container pt-5">
        <?php foreach($brewerys as $brewery) { ?>
    <h1><?php echo $id . ' : ' . $brewery['name']; ?></h1>
    <div class="row">
            
        <div class="col-md-6">
            <img class="img-fluid" src="img/buxton.png" alt="<?php echo $brewery['name']; ?>">
        </div>
        <div class="col-md-6">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Nom : <?php echo $brewery['name']; ?> </li>
                <li class="list-group-item">Adresse : <?php echo $brewery['address']; ?></li>
                <li class="list-group-item">Ville : <?php echo $brewery['city']; ?></li>
                <li class="list-group-item"> Code Postal : <?php echo $brewery['zip']; ?></li>
                <li class="list-group-item"> Pays : <?php echo $brewery['country']; ?> </li>                          
            </ul>
        </div>
            <?php } ?>
</div>

<?php

require('partials/footer.php');