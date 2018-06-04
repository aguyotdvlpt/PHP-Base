<?php

require('partials/header.php');

?>


<!-- <div class="container">
    <form method="post" action="">
        <p>
            <label for="name">Nom :</label>
            <input type="text" name="nom" placeholder="Nom de la bière"/>
        </p>

        <p>
            <label for="degree">Nombre de degrés :</label>
            <input type="text" name="degree" />
              
        </p>

        <p>
            <label for="volume">Conditionnement :</label>
                <select id="volume" name="volume">
                    <option value="25">25 cL</option> 
                    <option value="33" selected>33 cL</option>
                    <option value="75">75 cL</option>
                </select>
        </p>

        <p>
            <label for="price">Prix :</label>
                <input type="text" name="price" size="10" maxlength="5"/>
        </p>

        <p>
            // <label for="brand">Marque :</label>
            <select id="brand" name="brand">
                    <option value="chimay">Chimay</option> 
                    <option value="chti">Ch'ti</option>
                    <option value="duvel">Duvel</option>
            </select> //

            <label for="brand">Marques :</label>
            <input list="marques" id="brand" name="brand"/>
                <datalist id="marques">
                    <option value="Chimay">
                    <option value="Ch'ti">
                    <option value="Chimay">
                    <option value="Guinness">
                    <option value="Kwak">
                </datalist>
           
        </p>

        <p>
        <label for="type">Type :</label>
            <select id="type" name="type">
                    <option value="4">Blonde</option>
                    <option value="26">Ambrée</option>
                    <option value="39">Brune</option>
                    <option value="57">Noire</option>
            </select>

        
        </p>

        <input class="btn btn-primary mb-5" type="submit" value="Enregistrer votre bière">
            
    </form>
</div> -->

 <!-- ****************** CREATION DE LA FONCTION SLUGIFY *********************** -->

<?php
        


?>

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
    
    function slugify($str) {
        //Supprimer les espaces avant et après
        $str = trim($str);
        //Mets en minusucule
        $str = strtolower($str);
        // Remplace les caractères spéciaux
        $str = str_replace("é", "e", $str);
        $str = str_replace("ë", "e", $str);
        $str = str_replace("ê", "e", $str);
        $str = str_replace("è", "e", $str);
        $str = str_replace("à", "a", $str);
        $str = str_replace("â", "a", $str);
        $str = str_replace("î", "i", $str);
        $str = str_replace("ï", "i", $str);
        $str = str_replace("ï", "i", $str);
        $str = str_replace("ö", "o", $str);
        $str = str_replace("ô", "o", $str);
        $str = str_replace("û", "u", $str);
        $str = str_replace("ü", "u", $str);
        $str = str_replace("ù", "u", $str);
        //Enlève les apostrophes
        $str = str_replace("'","", $str);
        //Remplace les espaces par des "-"
        $str = str_replace(" ", "-", $str);          

    return $str;
    }
    // Test de la fonction
    /* $marque = " Ch'ti ambrée ";
    $marque = slugify($marque);
    echo $marque; */

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
        
       /*  $query = $db->prepare('SELECT * FROM beer WHERE id = :nom'); // :name est un paramètre que l'on choisit
        $query->bindvalue(':nom', $brand, PDO::PARAM_STR); // On s'assure que l'id est bien un entier
        $query -> execute(); // Execute la requête

        $brands = $query->fetch();
        var_dump($brands);

        $query = $db->prepare('SELECT * FROM beer WHERE id = :nom'); // :name est un paramètre que l'on choisit
        $query->bindvalue(':nom', $type, PDO::PARAM_STR); // On s'assure que l'id est bien un entier
        $query -> execute(); // Execute la requête

        $type1 = $query->fetch();
        var_dump($type1); */
       

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


                    echo '<div class="alert alert-success">La bière a bien été ajouté.</div>';
            }
            
            //Débug du formulaire
            //var_dump($_POST);

            //Débug de l'upload
            var_dump($filename);
            

/* if(isset($_POST['nom'])) {
    $name = $_POST['nom'];
}
if(isset($_POST['degree'])) {
    $degree = $_POST['degree'];
}
if(isset($_POST['volume'])) {
    $volume = $_POST['volume'];
}
if(isset($_POST['price'])) {
    $price = $_POST['price'];
}
if(isset($_POST['brand'])) {
    $brand = $_POST['brand'];
}
if(isset($_POST['type'])) {
    $type = $_POST['type'];
}
$degree = $_POST['degree'];
$volume = $_POST['volume'];
$price = $_POST['price'];
$brand = $_POST['brand'];
$type = $_POST['type'];

var_dump($name);
var_dump($degree);
var_dump($volume);
var_dump($price);
var_dump($brand);
var_dump($type); */










// Inclure le fichier partials/footer.php
require(__DIR__.'/partials/footer.php');

?>