<?php

try{
    $pdo = new PDO("mysql:host=localhost;dbname=dogrunapp","root","");
} catch(PDOException){
    die();
}

?>