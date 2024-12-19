<?php

function getAnimalById($animal_id){
    global $pdo;
    if($animal_id){
        $sql = $pdo->prepare("
            SELECT
                *
            FROM
                animals
            WHERE
                animal_id = :animal_id
        ");
        $result = $sql->execute(
            array(
                'animal_id' => $animal_id
            )
            );
        if($result){
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            return $row;
        } else {
            return null;
        }
    }
}