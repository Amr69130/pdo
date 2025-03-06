<?php
require_once('connectDB.php');

$pdo = connectDB();
// var_dump($pdo);

$requete = $pdo->prepare("SELECT * FROM car;");
$requete->execute();
$cars = $requete->fetchAll();

include_once('header.php');

echo "<div>";
echo "<ul>";

foreach ($cars as $car) {


    echo "<li>";

    echo $car['model'] . "<br>";
    echo $car['brand'] . "<br>";
    echo $car['horsePower'] . "<br>";
    echo "<img src='images/" . $car['image'] . "' alt='" . $car['model'] . "' width='150'><br>";
    echo "</li>";
}

echo "</ul>";
echo "</div>";


include_once('footer.php');