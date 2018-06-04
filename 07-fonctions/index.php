<?php

// ************ Pour créer une fonction en PHP ***********************
    function addition () {
    echo 'ma fonction';
}

addition(); // On appelle une fonction


// ************ Une fonction renvoie toujours quelquechose ***********************

function addition() {
    echo 10 + 3;
    return;
}

echo addition();


// ************ Les Arguments ***********************

function addition($argument1, $argument2) {
    return $argument1 + $argument2;
}

//Les arguments sont obligatoires lors de l'appel de la fonction.
echo addition(2, 12);

// possible de mettre des arguments par défaut, dans ce cas il ne sont plus obligatoires lors de l'appel
function addition ($argument1 = 1, $argument2 =2) {
    return $argument1 + $argument2;
}
echo addition();