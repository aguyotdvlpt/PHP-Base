<?php

require(__DIR__.'/partials/header.php');

// Le contenu de la page
?>

<?php

$query = $db->query('SELECT * FROM brewery ');
$brands = $query->fetchAll();


?>

<div class="container pt-5">
    <h1 class='text-center mb-5'>Liste des brasseries</h1>

<table class="table table-striped text-center">

  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">City</th>
      <th scope="col">Zip</th>
      <th scope="col">Country</th>
      <th scope="col">+ d'infos</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($brands as $brand) { ?>
    <tr>
      <th scope="row"><?php echo $brand['id'] ?></th>
        <?php   echo '<td>' . $brand['name'] . '</td>';
                echo '<td>' . $brand['address'] . '</td>';
                echo '<td>' . $brand['city'] . '</td>';
                echo '<td>' . $brand['zip'] . '</td>';
                echo '<td>' . $brand['country'] . '</td>';
                ?>
                <td>
                  <a href="./brewery_single.php?id=<?php echo $brand['id']?>" class="btn btn-info">+ d'infos</a>
                  <?php if(userIsLogged()) { ?>
                  <a href="./brewery_single.php?id=<?php echo $brand['id']?>" class="btn btn-warning">Modifier</a>
                  <a href="./brewery_delete.php?id=<?php echo $brand['id']?>" class="btn btn-danger confirm-delete">Supprimer</a>
                  <?php } ?>
                  </td>
                </tr>
    <?php } ?>    
    
  </tbody>
</table>

</div>

<?php


// Inclure le fichier partials/footer.php

require(__DIR__.'/partials/footer.php');