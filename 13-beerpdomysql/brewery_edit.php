<?php

require('partials/header.php');

// Création d'une fonction qui permet de vérifier si une brasserie existe ou non en BDD (true or false)

//Est-ce qu'un id existe dans l'url ? Est-ce que la brasserie existe en BDD ?
$brewery = breweryExists($_GET['id']); 

if (empty($_GET['id']) || !$brewery) { 
    header('HTTP/1.0 404 Not Found'); //Permet de renvoyer une 404 si la brasserie n'existe pas
    echo'<div class="container"<h1>404</h1></div>'; 
    require('partials/footer.php');
    exit();
} ?>

<div class="container pt-5">
    <h2 class='text-center'>Modifier la brasserie <?php echo $brewery['name'];?></h2>
    
    <?php
        // Il faut déclarer les variables avant le formulaire pour éviter des "Notices" quand on les affichera dans le formulaire
    $name = $brewery['name'];
    $address = $brewery['address'];
    $city = $brewery['city'];
    $zip = $brewery['zip'];
    $country = $brewery['country'];
           
    if(!empty($_POST)) {
            $name = $_POST['name']; // Doit faire au moins 3 caractères 
            $address = $_POST['address']; // Au minimum 10 caractères
            $city = $_POST['city']; // Doit faire au moins 3 caractères 
            $zip = $_POST['zip']; // De 1 à 5 caractères
            $country = $_POST['country']; // La marque doit exister dans la base de données
        
        
//Détecter quand le formulaire est soumis
        // Définir un tableau d'erreur vide qui va se remplir pour chaque erreur
        $errors = [];
          
        if (strlen($name) < 3) {                      
            $errors['name'] = 'Le nom n\'est pas valide';
        };
          
        if (strlen($address) < 10) {
            $errors['address'] = 'L\'adresse n\'est pas valide';
        };
            
        if (strlen($city) < 3) {
            $errors['city'] = 'La ville n\'est pas valide';
        };
            
        if (strlen($zip) < 1 ||  (strlen($zip) > 5)) {
            $errors['zip'] = 'Le code postal n\'est pas valide';
        };
            
        $allowedCountries = ['France', 'Belgique', 'Royaume-Uni', 'Irlande', 'Allemagne', 'Italie' ];
            if (!in_array($country, $allowedCountries)) { // Si le pays n'est pas présent dans le tableau des pays autorisées
                $errors['country'] = 'Le nom du pays n\'est pas valide';
            }

            //Quand le formulaire est valide, on ajoute dans la Base de Données
            if(empty($errors)) {
                $query = $db -> prepare('UPDATE brewery SET
                `name` = :name, address = :address, city = :city, zip = :zip, country = :country
                WHERE id = :id');
                
                $query -> bindValue(':id', $brewery['id'], PDO::PARAM_INT);
                $query -> bindValue(':name', $name, PDO::PARAM_STR);
                $query -> bindValue(':address', $address, PDO::PARAM_STR);
                $query -> bindValue(':city', $city, PDO::PARAM_INT);
                $query -> bindValue(':zip', $zip, PDO::PARAM_STR);
                $query -> bindValue(':country', $country, PDO::PARAM_STR);
                $result = $query->execute();
                
                if ($result) {  //On s'assure que la requête s'est bien déroulée
                echo '<div class="alert alert-success">
                        La brasserie a été modifiée.
                        </div>';
                }
            }

            //Quand le formulaire n\'est pas valide
        if (!empty($errors)) {
            echo '<div class="alert alert-danger">';
            foreach($errors as $error) {
                echo '<p>' . $error . '</p>';
            }
            echo '</div>';
            //var_dump($errors);
        }
    }    
?>

      <!--       ********************************************************************************
                 *    * * *  * * *  * * *   *   *   *   *  *       * *    *   * * *    * * *    *
                 *    *      *   *  *   *   ** **   *   *  *      *   *   *   *   *    *        *
                 *    * *    *   *  * *     * * *   *   *  *      * * *   *   * *      * * *    *
                 *    *      *   *  *  *    *   *   *   *  *      *   *   *   *  *     *        *
                 *    *      * * *  *    *  *   *   * * *  * * *  *   *   *   *    *   * * *    *
                 *                                                                              *
                 ********************************************************************************     -->


    <form method="POST" enctype="multipart/form-data" action="">
        <?php
        $fields = ['name' => 'Nom', 'address' => 'Adresse', 'city' => 'Ville', 'zip' => 'Code Postal']; // Les champs du formulaire à afficher 
        foreach ($fields as $field => $label) { ?>
            <div class="form-group">
                <label for="<?php echo $field; ?>"><?php echo $label; ?> :</label>
                <input type="text" name="<?php echo $field; ?>" id="<?php echo $field; ?>" class="form-control" value="<?php echo $$field; ?>">
            </div>
            <?php } ?>

            <div class="form-group">
                <label for="country">Pays :</label>
                <select class="form-control" id="country" name="country">
                        <option >France</option>
                        <option>Belgique</option>
                        <option>Royaume-Uni</option>
                        <option>Irlande</option>
                        <option>Allemagne</option>
                        <option>Italie</option>
                </select>
            </div>
                <button class="btn btn-primary">Modifier</button>
        </form>
    </div>
<?php
        
                        //Débug du formulaire
            //var_dump($_POST);


// Inclure le fichier partials/footer.php
require(__DIR__.'/partials/footer.php');

?>
























