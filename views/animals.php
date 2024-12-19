<?php
require_once("../common/common.php");
require_once("../common/dbconnect.php");

# get all animals
global $pdo;
$stmt = $pdo->query("
    SELECT
        *
    FROM
        animals
");

$result = $stmt->execute();
$animals = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include '../includes/header.php'; ?>

<a type="button" href="animal-info.php" class="btn btn-primary">Add New Animal</a>

<br /><br />

<table class="table table-hover table-bordered table-clickable">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Species</th>
      <th scope="col">Breed</th>
      <th scope="col">Gender</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($animals as $animal) : ?>
    <tr class="table-active">
      <td><a href="view-animal.php?animal_id=<?php echo $animal['animal_id']?>"><?php echo $animal['name']?></a></td>
      <td><?php echo $animal['species'] ?></td>
      <td><?php echo $animal['breed'] ?></td>
      <td><?php echo $animal['gender'] ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>


<?php include '../includes/footer.php'; ?>