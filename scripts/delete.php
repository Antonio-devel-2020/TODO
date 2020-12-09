<?php
include_once'../conexion.php';

$id = $_GET['id'];

$sql_delete = 'DELETE FROM list WHERE id=?';
$stm_delete = $pdo->prepare($sql_delete);
$stm_delete->execute(array($id));

header('location: ../index.php');