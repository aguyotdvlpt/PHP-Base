<?php

$age = 13;

if ($age >= 18) {
    echo 'Vous pouvez entrer !';
} else {
    echo 'Access denied ! <br />';
}

if ($age >=16 && $age <18) {
    echo 'Vous êtes presque majeur !';   
}

else if ($age >=14 && $age <16) {
    echo 'Vous êtes jeune';
}

else if ($age <14) {
    echo 'Vous êtes trop jeune';
}

?>