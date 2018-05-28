<?php

//1. Créer un formulaire sur calculator.php
//2. Créer un champ nombre1 et un champ nombre2
// 3. Quand on clique sur le bouton calculer, faire la somme du nombre1 et nombre2
// 4. Ajouter un champ radio ou select permettant de choisir l'opération (+, -, /, *)

//2.

?>

<form method="POST">
    <p>
        <label for="number1">Nombre 1</label>
        <input type="number" id="number1" name="number1" placeholder="saisir votre premier chiffre" />
    </p>

     <p>
        <label for="number2">Nombre 2</label>
        <input type="number" id="number2" name="number2" placeholder="saisir votre second chiffre" />
    </p>
    
    <p> <label for="+">+</label>
        <input type="radio" id="addition" name="operator" value="+">
    </p>

    <p> <label for="-">-</label>
        <input type="radio" id="soustraction" name="operator" value="-">
    </p>

    <p> <label for="*">*</label>
        <input type="radio" id="multiplication" name="operator" value="*">
    </p>

    <p> <label for="/">/</label>
        <input type="radio" id="division" name="operator" value="/">
    </p>

    <button>Calculer</button>

</form>

<?php
/* if (isset($POST['number1']) && isset($_POST['number2']) ) {
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    $result = $number1 + $number2;
    echo '<p> Le résultat de ' . $number1 . ' + ' . $number2 . ' est ' . $result . '</p>;
} */


    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    $operator = $_POST['operator'];

/* if (!empty($POST)) { */
    if ($operator == "+") {

        $result = $number1 + $number2;
        echo '<p> Le résultat de ' . $number1 . " + " . $number2 . ' est ' . $result . '</p>';
    }

    if ($operator == "-") {

        $result = $number1 - $number2;
        echo '<p> Le résultat de ' . $number1 . " - " . $number2 . ' est ' . $result . '</p>';
    }

    if ($operator == "*") {

        $result = $number1 * $number2; 
        echo '<p> Le résultat de ' . $number1 . " * " . $number2 . ' est ' . $result . '</p>';
    }

    if ($operator == "/") {

        $result = $number1 / $number2;
        echo '<p> Le résultat de ' . $number1 . " / " . $number2 . ' est ' . $result . '</p>';
    }
/* } */

    ******************** CORRECTION ********************
/* 
if(!empty($_POST)) {

    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    $operator = $_POST['operator'];
    $result = 0;

    switch ($operator) {
        case '+':
            $result = $number1 + $number2;
            break;

            case '-':
            $result = $number1 - $number2;
            break;

            case '*':
            $result = $number1 * $number2;
            break;
            
            case '/':
            $result = $number1 / $number2;
            break;
    }
    echo $result;
}
 */