<?php
$link = 'mysql:host=localhost;dbname=todos';
$usuario = 'root';
$pass = '';

try{

    $pdo = new PDO($link, $usuario, $pass);

    // foreach($pdo->query('SELECT * FROM list') as $fila){
    //     print_r($fila);
    // }

    // echo 'Conectado';

}catch(PDOException $e){
    print "Error: " .$e->getMessage(). "<br>";
    die();
}