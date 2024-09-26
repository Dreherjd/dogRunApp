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
}
?>
<?php include ("includes/header.php"); ?>


<?php include("includes/footer.php"); ?>