<?php
require_once('connectDB.php');

$pdo = connectDB();
// var_dump($pdo);

$requete = $pdo->prepare("SELECT * FROM car;");
$requete->execute();
$cars = $requete->fetchAll();

include_once('header.php'); ?>

<div>
    <a href="add.php">Ajouter une voiture</a>
</div>
<?php



foreach ($cars as $car): ?>

    <div>
        <ul>

            <img src="images/<?php echo $car['image'] ?>" alt=" <?php echo $car["model"] ?>">
            <h2><?php echo $car['model'] ?></h2>
            <p><?php
            echo $car["brand"]
                ?></p>
            <p> <?php
            echo $car["horsePower"]
                ?>chevaux</p>
            <a href="update.php?id=<?php echo $car['id']; ?>&brand=<?php echo urlencode($car['brand']); ?>&model=<?php echo urlencode($car['model']); ?>"
                class="btn btn-primary">Modifier</a>

            <?php


            ?>

        </ul>
    </div>
<?php endforeach; ?>
<?php
include('footer.php')
    ?>