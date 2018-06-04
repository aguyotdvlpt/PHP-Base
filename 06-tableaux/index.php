<?php

$people = [
    'Jean',
    'Eric',
    'Jeanne',
    'John',
    'Quelqu\'un'
];

echo $people; // Ne fonctionne pas 'on ne peut pas afficher un tableau directement
echo '<br/>';

echo '<pre>';
print_r($people); // C'est mieux pour débugger
echo '</pre>';

var_dump($people); // Débug du tableau

echo $people[1]; // Affiche Eric

echo '<br />';
//Afficher tous les prénom du tableau
foreach($people as $person) {
    var_dump($person);
}
echo '<br />';
//Affihcer les prénoms et les index du tableau
foreach($people as $index => $person) {
    echo $index . ' : ' . $person . '<br/>';
}




// Si un index est déclaré, les éléments suivants vont être incrémentés par rapport à cet index
$people = [
    'Jean',
    3 => 'Eric',
    'Jeanne'
];

var_dump($people);

// Stocker des contacts dans ce tableau avec les index nom (string), prénom (string), age (int), , téléphone (array => portable (string) et fixe (string)). Il peut y avoir plusieurs contacts.
$people = [
    [
   		'nom' => 'Guyot' ,
		'prenom' => 'Alex',
		'age' => 36,
		'telephones' => [
            'portable' => '0612542141',
            'fixe' => '0321021021'
        ],
    ],

    [
        'nom' => 'Robert' ,
     'prenom' => 'Michel',
     'age' => 94,
     'telephones' => [
         'portable' => '0612652141',
         'fixe' => '0352145784'
     ],
 ],
];

var_dump($people);

/*  Ecrire la boucle foreach qui affiche le texte ci-dessous :
    Alexandre a 36 ans et est joignable au 0612542141
    Michel a [...]
*/

foreach ($people as $person) {
    echo $person['prenom'] . ' a ' . $person['age'] . ' ans et est joignable au ';
  //  echo $person['telephones']['portable'] . ', ' . $person['telephones']['fixe'] . '<br .>';
        foreach ($person['telephones'] as $type => $phone) {
            echo $type . ' : ' . $phone . ', ';
        }
    echo '<br/>';
}

?>






