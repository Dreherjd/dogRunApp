<?php
require_once("common/common.php");
require_once("common/dbconnect.php");
require('controllers/index.php');

session_start();

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST["setUserJustin"])){
        setUser(1);
    } else if(isset($_POST["setUserDarian"])){
        setUser(2);
    } else if(isset($_POST["setUserTammy"])){
        setUser(3);
    } else if(isset($_POST["setUserRon"])){
        setUser(4);
    }
}
$user_id = 1;

function setUser($user_id) {
    global $pdo;
    $stmt = $pdo->query("
        SELECT
            *
        FROM
            Users
        WHERE
            user_id = $user_id
    ");
    $current_user = $stmt->fetch();
    $_SESSION['current_user'] = serialize($current_user);
    $current_user = unserialize($_SESSION['current_user']);
    echo $current_user[0];
}

    global $pdo;
    $stmt = $pdo->query("
    SELECT
        *
    FROM
        runs
    ");
    $result = $stmt->execute();
    $runs = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<?php include ("includes/header.php"); ?>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Animal</th>
      <th scope="col">Start</th>
      <th scope="col">End</th>
      <th scope="col">State</th>
      <th scope="col">Start Time</th>
      <th scope="col">End Time</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($runs as $run) : ?>
    <tr class="table-active">
      <td scope="row"><a href="views/view-run.php?id=<?php echo $run['run_id']?>"><?php echo getAnimalById($run['animal']) ?></a></td>
      <td scope="row"><a href="views/view-run.php?id=<?php echo $run['run_id']?>"><?php echo $run['start_dest'] ?></a></td>
      <td><a href="views/view-run.php?id=<?php echo $run['run_id']?>"><?php echo $run['end_dest'] ?></a></td>
      <td><a href="views/view-run.php?id=<?php echo $run['run_id']?>"><?php echo $run['state'] ?></a></td>
      <td><a href="views/view-run.php?id=<?php echo $run['run_id']?>"><?php echo $run['start_time'] ?></a></td>
      <td><a href="views/view-run.php?id=<?php echo $run['run_id']?>"><?php echo $run['end_time'] ?></a></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php include("includes/footer.php"); ?>