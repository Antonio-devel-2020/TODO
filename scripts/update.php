<?php

include_once'../conexion.php';

$id = $_GET['id'];
$description = $_GET['description'];

$update = 'UPDATE list SET description=? WHERE id=?';
$stm_update = $pdo->prepare($update);
$stm_update->execute(array($description, $id));

header('location: ../index.php');
