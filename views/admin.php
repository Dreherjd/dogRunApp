<?php
require_once("../common/common.php");
require_once("../common/dbconnect.php");

# get active runs assinged to logged in user
global $pdo;
$stmt = $pdo->query("
SELECT
    *
FROM
    runs
WHERE
    state = 'In Progress'
    AND coord = 3
");
$result = $stmt->execute();
$runs = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>


<?php include '../includes/header.php'; ?>

<h3>Your Active Runs</h3>
<table class="table table-hover table-bordered table-clickable">
  <thead>
    <tr>
      <th scope="col">Animal</th>
      <th scope="col">Start</th>
      <th scope="col">End</th>
      <th scope="col">Status</th>
      <th scope="col">Start Time</th>
      <th scope="col">End Time</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($runs as $run) : ?>
    <tr class="table-active">
      <td><a href="views/view-run.php?run_id=<?php echo $run['run_id']?>"><?php echo getAnimalById($run['animal']) ?></a></td>
      <td><?php echo $run['start_dest'] ?></td>
      <td><?php echo $run['end_dest'] ?></td>
      <td><?php echo $run['state'] ?></td>
      <td><?php echo $run['start_time'] ?></td>
      <td><?php echo $run['end_time'] ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<h3>Your Past Runs</h3>

<?php include '../includes/footer.php'; ?>