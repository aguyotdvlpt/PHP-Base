<?php

$people = [
    'Jean',
    'Eric',
    'Jeanne'
];

echo $people; // Ne fonctionne pas 'on ne peut pas afficher un tableau directement
echo '<br/>';

echo '<pre>';
print_r($people); // C'est mieux pour débugger
echo '</pre>';

var_dump($people); // Débug du tableau

echo $people[1]; // Affiche Eric

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
		'prénom' => 'Alex',
		'age' => 36,
		'telephone' => [
            'portable' => '0612542141',
            'fixe' => '0321021021'
        ],
    ],

    [
        'nom' => 'Guyot' ,
     'prénom' => 'Alex',
     'age' => 36,
     'telephone' => [
         'portable' => '0612542141',
         'fixe' => '0321021021'
     ],
 ],


];

var_dump($people);


?>