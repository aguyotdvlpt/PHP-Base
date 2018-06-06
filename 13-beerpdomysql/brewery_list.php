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
</div>
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
                <td><a href="./brewery_single.php?id=<?php echo $brand['id']?>" class="btn btn-primary mx-auto btn-block w-75">Plus d'informations</a></td>
    
                </tr>
    <?php } ?>
    
    
  </tbody>
</table>


<?php











// Inclure le fichier partials/footer.php

require(__DIR__.'/partials/footer.php');