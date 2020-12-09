<?php

include_once'../conexion.php';

if($_POST){

    $description = $_POST['description'];

    $save = 'INSERT INTO list(description) VALUES (?)';
    $stm_save = $pdo->prepare($save);
    $stm_save->execute(array($description));

    header('location: ../index.php');

}