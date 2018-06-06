<?php require('partials/header.php');?>


<div class="container pt-5">
    <h2 class='text-center'>Ajouter une brasserie</h2>
    
    <?php
        // Il faut déclarer les variables avant le formulaire pour éviter des "Notices" quand on les affichera dans le formulaire
    $name = null;
    $address = null;
    $city = null;
    $zip = null;
    $country = null;
   
        
    if(!empty($_POST)) {
            $name = $_POST['name']; // Doit faire au moins 3 caractères 
            $address = $_POST['address']; // Au minimum 10 caractères
            $city = $_POST['city']; // Doit faire au moins 3 caractères 
            $zip = $_POST['zip']; // De 1 à 5 caractères
            $country = $_POST['country']; // La marque doit exister dans la base de données
            
           
        }
        
//Détecter quand le formulaire est soumis
        // Définir un tableau d'erreur vide qui va se remplir pour chaque erreur
        $errors = [];
          
        if (strlen($name) < 3) {                      
            $errors['name'] = 'Le nom n\'est pas valide';
        };
          
        if (strlen($address) < 10) {
            $errors['address'] = 'L\'adresse n\'est pas valide';
        };
            
        if (strlen($city) < 3) {  {
            $errors['city'] = 'La ville n\'est pas valide';
        };
            
        if (strlen($zip) <= 1 ||  (strlen($city) >= 5)) {
            $errors['zip'] = 'Le code postal n\'est pas valide';
        };
            //Vérifier que la marque existe dans la base de données
                       //Requête pour aller chercher
                $query = $db ->prepare('SELECT * FROM brewery WHERE id = :id');
                $query -> bindvalue(':id', $country, PDO::PARAM_INT);
                $query -> execute();
                $country = $query -> fetch();

        if (!$country) { // Si brand ne renvoie pas true => Si brand renvoie false (Si la marque n'existe pas en BDD)
            $errors['country'] = 'Le pays n\'existe pas dans la base de données';
        }

           }
        //var_dump($errors);
            // s'il n'y a pas d'erreurs dans le formulaire
            if (empty($errors)) {
                $query = $db -> prepare('
                    INSERT INTO brewery (`name`, address, city, zip, country)
                    VALUES (:name, :address, :city, :zip, :country)
                ');
                $query -> bindValue(':name', $name, PDO::PARAM_STR);
                $query -> bindValue(':address', $address, PDO::PARAM_STR);
                $query -> bindValue(':city', $city, PDO::PARAM_STR);
                $query -> bindValue(':zip', $zip, PDO::PARAM_STR);
                $query -> bindValue(':country', $country, PDO::PARAM_STR);
                
                if ($query -> execute()); // On insère la bière dans la BDD
    
                    echo '<div class="alert alert-success">La brasserie a bien été ajoutée.</div>';
            } else {
                foreach($errors as $error) {
                    if (!empty($error)) {

                        ?>
                        <div class='' style='color:red '>
                            <?php echo $error . '<br/>';?>
                        </div>
<?php                    }
                }
            }
?>


 <!-- ********************* FORMULAIRE ********************************-->
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
                        <option value="France">France</option>
                        <option value="Belgique">Belgique</option>
                        <option value="Royaume-uni">Royaume-Uni</option>
                        <option value="Irlande">Irlande</option>
                        <option value="Allemagne">Allemagne</option>
                        <option value="Italie">Italie</option>
                </select>
            </div>

            

            <input class="btn btn-primary mb-5" type="submit" value="Enregistrer votre brasserie">
        </form>
    </div>
<?php
        
                        //Débug du formulaire
            //var_dump($_POST);


// Inclure le fichier partials/footer.php
require(__DIR__.'/partials/footer.php');

?>