<?php

require('partials/header.php');

// Création d'une fonction qui permet de vérifier si une brasserie existe ou non en BDD (true or false)

function breweryExists($id) {
    global $db; // Permet d'utiliser la variable $db définie en dehors de la fonction
    $query = $db->prepare('SELECT * FROM brewery WHERE id = :id');
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $brewery = $query->fetch();

    return $brewery; // La fonction retourne un tableau avec la brasserie ou false si la brasserie n'existe pas
}

/* $id = $_GET['id'];

$query = $db->prepare('SELECT * FROM brewery WHERE id = :id'); // :id est un paramètre que l'on choisit
$query->bindvalue(':id', $id, PDO::PARAM_INT); // On s'assure que l'id est bien un entier
$query -> execute(); 
$brewerys = $query->fetchAll(); */

//Est-ce qu'un id existe dans l'url ? Est-ce que la brasserie existe en BDD ?
$brewery = breweryExists($_GET['id']); 

if (empty($_GET['id']) || !$brewery) { 
    header('HTTP/1.0 404 Not Found'); //Permet de renvoyer une 404 si la brasserie n'existe pas
    echo'<h1>404</h1>'; 
    require('partials/footer.php');
    exit();
}
 ?>

<!-- Le contenu de la page -->

<div class="container pt-5">
                   
    <h1><?php echo $brewery['name']; ?></h1>

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
</div>

<?php

require('partials/footer.php');