<?php

$nombre1 = 845;
$nombre2 = 312;
$reste = null;
$resultat = null;

while ($nombre1 % $nombre2 !== 0) {
    $nombre1 % $nombre2 = $reste;
    $nombre1 = $nombre2;
    $nombre2 = $reste;
}



/* 845 % 312 = 221;
312 % 221 = 91;
221 % 91 = 39;
91 % 39 = 13;
39 % 13 = 0; */
 
?>
