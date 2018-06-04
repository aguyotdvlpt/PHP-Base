<?php

// Acronyme : Créer une fonction qui prend en argument une chaine (World of Warcraft) et qui retourne les initiales de chaque mot en majuscule


function acronyme($chaine) {
    $mots = explode(" ", $chaine);
    $acronyme ='';
    foreach ($mots as $mot) {
        $acronyme .= strtoupper($mot[0]);
    }
    return $acronyme;
}

    echo acronyme("World Of warcraft");

    echo '<br />';
    echo '<br />';
// Conjugaison : Creér une fonction qui permet de conjuguer un verbe (chercher par exemple)
//               Cela doit renvoyer toutes les conjugaisons au présent.

   

$verb = "chercher";
    $racine = " ";

    function present($verb) {

        function racine($verb) {
            $racine = substr($verb, 0, (strlen($verb)-2));
            return $racine;
        }
        /* echo racine("chercher"); */
    
    echo "Conjuguaison du verbe " . racine($verb) . "er au présent :" . "<br />";
    echo "je " . racine($verb) . "e" . "<br />";
    echo "tu " . racine($verb) . "es" . "<br />";
    echo "il / elle / on " . racine($verb) . "e" . "<br />";
    echo "nous " . racine($verb) . "ons" . "<br />";
    echo "vous " .racine($verb) . "ez" . "<br />";
    echo "ils " .racine($verb) . "ent" . "<br />";
    }

    echo present($verb);