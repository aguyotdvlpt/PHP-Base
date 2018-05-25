<?php

$eleves = [
    0 => [
        'nom' => 'Matthieu',
        'notes' => [10, 8, 16, 20, 17, 16, 15, 2]
    ],

    1 => [
        'nom' => 'Thomas',
        'notes' => [4, 18, 12, 15, 13, 7]
    ],

    2 => [
        'nom' => 'Jean',
        'notes' => [17, 14, 6, 2, 16, 18, 9]
    ],

    3 => [
        'nom' => 'Enzo',
        'notes' => [1, 14, 6, 2, 1, 8, 9]
    ],
];

/* 
 1°) Afficher la liste de tous les élèves avec leur note.
    "Matthieu a eu 10, 8 ... et 2"
*/
echo "Réponse 1 : <br/><br/>";

    foreach($eleves as $eleve) {
        echo $eleve['nom'] . ' a eu ' ;
        foreach($eleve['notes'] as $notes => $note) {
        echo $note . ',' ;
        }
        echo '<br/>';
    }

    echo '<br/>';
/* 2°) Calculer la moyenne de Jean. On part de $eleves[2]['notes']
    La fonction count permet de compter les éléments d'un tableau */

    echo "Réponse 2 : <br/><br/>";


    $totalNotes = 0;
    
        foreach ($eleves[2]['notes'] as $notes => $note) {
            $totalNotes = $totalNotes + $note;
        }
       /*  echo $totalNotes . '<br/>'; */
    
        $nombreNotes = count($eleves[2]['notes']);
       /*  echo $nombreNotes . '<br/>';
 */
        $moyenne = $totalNotes / $nombreNotes;
        echo 'Jean a ' . $moyenne . " de moyenne";

        echo '<br/><br/>';   
    

/* 3°) Combien d'élèves ont la moyenne ? */

echo "Réponse 3 : <br/><br/>";

    foreach($eleves as $eleve) {
        $totalNotes = 0;
        foreach ($eleve['notes'] as $notes => $note) {
            
            $totalNotes = $totalNotes + $note;
        }
        
        $nombreNotes = count($eleve['notes']);
        $moyenne = $totalNotes / $nombreNotes;
        
        if ($moyenne >= 10) {
            echo $eleve['nom']. ' a la moyenne <br/>';
            }
        else  {
            echo $eleve['nom']. ' n\'a pas la  moyenne <br/>';
        }
    }

    echo '<br/>'; 
/* 4°) Quel(s) élève(s) a(ont) la meilleure note ? */
    echo "Réponse 4 : <br/><br/>";

        $notemax = 0;
    foreach($eleves as $eleve) {
       
        foreach ($eleve['notes'] as $notes => $note) {
            
           if ($notemax < $note) {
               $notemax = $note;
           }  
           else ($notemax = $notemax);        
        }    
    }
    /* echo $notemax; */

    foreach($eleves as $eleve) {
       
        foreach ($eleve['notes'] as $notes => $note) {
            
           if ($note == $notemax) {
              echo $eleve['nom'] . ' a la meilleure note : ' . $notemax . '<br/>';
           }                  
        }    
    }
    
    echo '<br/>'; 

/* 5°) Qui a eu au moins 20 ? */

    echo "Réponse 5 : <br/><br/>";

        foreach($eleves as $eleve) {
            
            foreach ($eleve['notes'] as $notes => $note) {
                
            if ($note >= 18) {
                echo $eleve['nom'] . ' a la note minimale de 18 ' . '(' . $note . ')' . '<br/>';
            }                  
            }    
        }

echo '<br/>'; 
echo '<br/>'; 


?>