<?php require('partials/header.php');?>



<div class="container pt-5">
    <h2>Ajouter une bière</h2>
    
    <?php
        // Il faut déclarer les variables avant le formulaire pour éviter des "Notices" quand on les affichera dans le formulaire
    $name = null;
    $degree = null;
    $price = null;
    $volum = null;
    $brand = null;
    $type = null;
    $image = null;
    
    
 
    if(!empty($_POST)) {
            $name = $_POST['name']; // Doit faire au moins 3 caractères 
            $degree = $_POST['degree']; // Doit faire entre 0 et 20
            $volum = $_POST['volum']; // Doit faire 250, 330, ou 750
            $price = $_POST['price']; // Doit faire entre 0.01 et 99.99
            $brand = $_POST['brand']; // La marque doit exister dans la base de données
            $type = $_POST['type']; // Le type doit exister dans la base de données

            /* foreach ($POST as $key => $field) {
                $$key = $field (On variabilise une variable = interpolation de variables)
            } */
        }
    if (!empty($_FILES['image']['tmp_name'])) { //Si un fichier a été uploadé
        $image = $_FILES['image'];
    }
    ?>

    <form method="POST" enctype="multipart/form-data" action="">
        <?php
        $fields = ['name' => 'Nom', 'degree' => 'Degrés', 'price' => 'Prix']; // Les champs du formulaire à afficher 
        foreach ($fields as $field => $label) { ?>
            <div class="form-group">
                <label for="<?php echo $field; ?>"><?php echo $label; ?> :</label>
                <input type="text" name="<?php echo $field; ?>" id="<?php echo $field; ?>" class="form-control" value="<?php echo $$field; ?>">
            </div>
            <?php } ?>

            <div class="form-group">
                <label for="volum">Volume :</label>
                <select class="form-control" id="volum" name="volum">
                        <option hidden readonly value="">Choisissez votre volume</option>
                        <option <?php if ($volum == 250) { echo 'selected'; } ?> value="250">25cl</option>
                        <option <?php echo ($volum == 330) ? 'selected': '' ?>value="330">33cl</option> <!-- condition ternaire -->
                        <option <?php echo ($volum == 750) ? 'selected': '' ?>value="750">75cl</option> <!-- condition ternaire -->
                </select>
            </div>

            <div class="form-group">
                <label for="brand"> Marque :</label>
                <input type='text' id='brand' list="brands" name='brand'class="form-control" value="<?php echo $brand; ?>">
                <datalist id='brands'>
                    <select>
                        <option value="Chimay - 1"></option>
                        <option value="Duvel - 2"></option>
                        <option value="Kwak - 3"></option>
                        <option value="Guinness - 4"></option>
                        <option value="Ch'ti -5"></option>
                    </select>
                </datalist>                        
            </div>

            <div class="form-group">
                <label for="type"> Type :</label>
                <input type='text' id='type' list="types" name='type'class="form-control" value="<?php echo $type; ?>">
                <datalist id='types'>
                    <select>
                        <option value="Blonde - 1"></option>
                        <option value="Brune - 2"></option>
                        <option value="Ambrée - 3"></option>
                        <option value="Noire - 4"></option>                        
                    </select>
                </datalist>                        
            </div>

            <div class="form-group">
                <label for"image"> Image : </label>
                <input type="file" name="image" />     
                
            </div>

            <input class="btn btn-primary mb-5" type="submit" value="Enregistrer votre bière">
        </form>
    </div>
<?php
        //Détecter quand le formulaire est soumis
        // Définir un tableau d'erreur vide qui va se remplir pour chaque erreur
        $errors = [];
            // $name doit comporter au moins 3 caractères
        if (strlen($name) < 3) {                      
           // array_push($errors, "Le nom n'est pas valide");
            $errors['name'] = 'Le nom n\'est pas valide';
        };
            // $degree doit être compris entre 0 et 20
        if (!is_numeric($degree) || $degree<= 0 || $degree > 20) {
            $errors['degree'] = 'Le degré n\'est pas valide';
        };
            //$price doit être compris entre 0.01 et 99.99
        if (!is_numeric($price) || $price <= 0.01 || $price > 99.99) {
            $errors['price'] = 'Le prix n\'est pas valide';
        };
            //$volum doit faire 250 330 ou 750
        if (!in_array($volum, [250, 330,750])) {
            $errors['volum'] = 'Le volume n\'est pas valide';
        };
            //Vérifier que la marque existe dans la base de données

            $brand_id = intval(substr($brand, -1)); // Le intval() permet de s'assurer que le dernier caractère soit un chiffre sinon il retourne 0.

            //Requête pour aller chercher
                $query = $db ->prepare('SELECT * FROM brand WHERE id = :id');
                $query -> bindvalue(':id', $brand_id, PDO::PARAM_INT);
                $query -> execute();
                $brand = $query -> fetch();

        if (!$brand) { // Si brand ne renvoie pas true => Si brand renvoie false (Si la marque n'existe pas en BDD)
            $errors['brand'] = 'La marque n\'existe pas';
        }

        //Vérifier que le type existe dans la base de données
        $type_id = intval(substr($type, -1)); 
                
            $query = $db ->prepare('SELECT * FROM ebc WHERE id = :id');
            $query -> bindvalue(':id', $type_id, PDO::PARAM_INT);
            $query -> execute();
            $type = $query -> fetch();

    if (!$type) { 
        $errors['type'] = 'Le type n\'existe pas';
    }
        // Vérification de l'imgae :

            // Erreur si pas d'image uploadée
    if ($image === null) {
        $errors['image'] = "Aucune image n'a été selectionnée";
    }

            // Erreur si l'image uploasée n'a pas le bon mimetype (Utilsation de finfo_file)
            
    if ($image) {
        $file = $image['tmp_name'];                 //L'emplacement temporaire du fichier uploadé
        $finfo = finfo_open(FILEINFO_MIME_TYPE);     // Permet d'ouvrir un fichier
        $mimeType = finfo_file($finfo, $file);                  // Ouvre le fichier
        $allowedExtensions = ['image/jpg', 'image/jpeg', 'image/gif', 'image/png']; // Dans cette variable je définis tous les types de fichiers que l'on peut uploader

            // Si l'extension n'est pas autorisée, il y a une erreur
            if (!in_array($mimeType, $allowedExtensions)) {
                $errors['image'] = "Le format de l'image sélectionné n'est pas autorisé.";
            }

            // Si la taille de l'image est trop élevée 
            if ($image['size']> '2097152') {
                $errors['image'] = "La taille du fichier excède la limite de 2Mo";
            }
    }
    

        
       

        var_dump($errors);
            // s'il n'y a pas d'erreurs dans le formulaire
            if (empty($errors)) {
                $query = $db -> prepare('
                    INSERT INTO beer (`name`, degree, volum, `image`, price, EBC_id, brand_id)
                    VALUES (:name, :degree, :volum, :image, :price, :EBC_id, :brand_id)
                ');
                $query -> bindValue(':name', $name, PDO::PARAM_STR);
                $query -> bindValue(':degree', $degree, PDO::PARAM_STR);
                $query -> bindValue(':volum', $volum, PDO::PARAM_INT);
                $query -> bindValue(':image', null, PDO::PARAM_STR);
                $query -> bindValue(':price', $price, PDO::PARAM_STR);
                $query -> bindValue(':EBC_id', $type_id, PDO::PARAM_INT);
                $query -> bindValue(':brand_id', $brand_id, PDO::PARAM_INT);

                if ($query -> execute()); // On insère la bière dans la BDD

                // Traitement de l'upload de l'image
                //Récupère l'emplacement temporaire du fichier
                    $file = $_FILES['image']['tmp_name'];

                // Récupérer l'extension du fichier
                        $originalName = $_FILES['image']['name'];
                        $extension = pathinfo($originalName)['extension']; //Retourne jpg

                // Générer le nom de l'image
                // Ch'ti -> chti
                // Ch'ti Ambrée -> chti-ambree

                $brand = slugify($brand ['name']);
                $name = slugify($name);

                $filename = $brand . '-' . $name . '.' .$extension;

                //Déplacer le fichier dans le dossier img
                move_uploaded_file($file, __DIR__.'/img/'.$filename);

                //Requête pour mettre à jour la bière en BDD afin d'associer l'image
                $query = $db->prepare('UPDATE beer SET `image` = :image WHERE id = :id');
                $query->bindValue(':image', 'img/'.$filename, PDO::PARAM_STR);
                $query->bindValue(':id', $db->lastInsertId(), PDO::PARAM_INT); //On récupère l'id de la dernière bière ajoutée
                $query->execute();


                    echo '<div class="alert alert-success">La bière a bien été ajouté.</div>';
            }
            
            //Débug du formulaire
            //var_dump($_POST);

            //Débug de l'upload
            var_dump($_FILES);
            




// Inclure le fichier partials/footer.php
require(__DIR__.'/partials/footer.php');

?>