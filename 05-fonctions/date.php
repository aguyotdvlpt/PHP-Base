<?php

echo strtotime('4 december 1981');
echo "<br/>";
echo date('l d m Y z' ,376268400);
echo "<br/>";
echo "<br/>";

$t = time();
/* echo $t; */
echo date('l d F Y, \i\l\ \e\s\t\ G\hi \e\t s\ \s\e\c\o\n\d\e\s ');

echo "<br/>";
// Trouver la date qu'il sera dans 10 jours
echo date('l d F Y',$t+(10*3600*24));
echo '<br /> Dans 10 jours, nous serons le ' . date('d / m / Y', strtotime('+10 days'));
?>