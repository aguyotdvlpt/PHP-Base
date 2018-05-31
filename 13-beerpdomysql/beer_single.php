<?php

require('partials/header.php');

//Récupérer l'id de la bière dans l'URL
$id = $_GET['id'];
// $id = intval($_GET['id']);  Le intval permet d'éviter certaines injections SQL

// Récupérer les informations de la bière
    // Risque d'Injection SQL
//$query = $db->query('SELECT * FROM beer WHERE id = '.$id);

// Une requête préparée permet de se prémunir des injections SQL
$query = $db->prepare('SELECT * FROM beer WHERE id = :id'); // :id est un paramètre
$query->bindvalue(':id', $id, PDO::PARAM_INT); // On s'assure que l'id est bien un entier
$query -> execute(); // Execute la requête
// var_dump($query);
$beer = $query->fetch();
// var_dump($beer);
 
// Récupérer la marque de la bière
$query = $db->query('SELECT * FROM brand WHERE id = '.$beer['Brand_id']);
$brand = $query->fetch();

// Récupérer l\'ECB de la bière

$query = $db->prepare('SELECT * FROM ebc WHERE id = :id'); // :id est un paramètre
$query->bindvalue(':id', $beer["EBC_id"], PDO::PARAM_INT); // On s'assure que l'id est bien un entier
$query -> execute(); // Execute la requête
// var_dump($query);
$ebc = $query->fetch();


?>

<!-- Le contenu de la page -->

<div class="container pt-5">
    <h1><?php echo $id . ' : ' . $beer['name']; ?></h1>
    <div class="row">
        <div class="col-md-6">
            <img class="img-fluid" src="<?php echo $beer['image']; ?>" alt="<?php echo $beer['name']; ?>">
        </div>
        <div class="col-md-6">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Nom : <?php echo $beer['name']; ?> </li>
                <li class="list-group-item">Degrés : <?php echo $beer['degree']; ?>°</li>
                <li class="list-group-item">Volume : <?php echo $beer['volum']; ?> mL</li>
                <li class="list-group-item"> Prix : <?php echo $beer['price']; ?> € </li>
                <li class="list-group-item"> Marque : <?php echo $brand['name']; ?> </li>
                <li class="list-group-item" >
                    Type : <?php echo $ebc['code']; ?>
                    <span class="ml-3 d-inline-block" style="background-color: #<?php echo $ebc['color']; ?>; width: 50px; height:25px"</span>
                </li>
            </ul>
        </div>
</div>

<?php

require('partials/footer.php');