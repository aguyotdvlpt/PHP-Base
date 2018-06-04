<?php

// Créer un formulaire avec 3 champs Email sujet message
// L'email doit être valide
// Le sujet ne doit pas être vide
// Le message doit faire au minimum 15 caractère
?>
<?php

//On déclare les variables au début pour éviter les erreurs

$email = null;
$subject = null;
$message = null;

if (!empty($_POST)) {
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
}

?>

<form method="POST">
    <p>
        <label for="Email">Email</label>
        <input type="text" id="email" name="email" placeholder="saisir votre email" />
    </p>

     <p>
        <label for="subject">Sujet du message :</label>
        <input type="text" id="subject" name="subject"  />
    </p>
    
    <p> <label for="message">Votre message :</label>
        <input type="text" id="message" name="message">
    </p>

    <button>Envoyer</button>
</form>


<?php
  

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) { //Vérifie si l'email est valide
        $isValid = false;
        echo 'Votre email n\'est pas valide';
        exit();
    } else {
        echo 'E-mail : ' . $email . '<br />';
    }
    
    if (!empty($_POST['subject'])) {
        $isValid = false;
    echo 'Sujet : ' .$subject . '<br />';
    }
    else {
        echo 'Merci de renseigner le sujet de votre email ! <br />';
        exit();
    }


    if (strlen($message) > 14) {
        $isValid = true;
        echo 'Message : ' . $message . '<br />';
    }
    else {
        echo 'Votre message doit avoir au minimum 15 caractères : <br/>';
        exit();
    }

    if ($isValid) {
        echo 'Le formulaire a été envoyé !';
    }
?>
   
