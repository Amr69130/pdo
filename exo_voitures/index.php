<?php
require_once('connectDB.php');

$pdo = connectDB();
var_dump($pdo);

$requete = $pdo->prepare("SELECT * FROM car;");
$requete->execute();
$cars = $requete->fetchAll();
?>