<?php
require_once('connectDB.php');

$pdo = connectDB();
// var_dump($pdo);

$requete = $pdo->prepare("SELECT * FROM car;");
$requete->execute();
$cars = $requete->fetchAll();

include_once('header.php'); ?>

<div>
    <a href="add.php" class="btn btn-primary">Ajouter une voiture</a>
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
            <a href="update.php?id=<?= $car['id']; ?>" class="btn btn-primary">Modifier</a>
            <a href="delete.php?id=<?= $car['id']; ?>&brand=<?= $car['brand']; ?>&model=<?= $car['model']; ?>&horsePower= <?= $car['horsePower'] ?>&image= <?php
                    $car['image']
                        ?>" class="btn btn-danger">Supprimer</a>

            <?php


            ?>

        </ul>
    </div>
<?php endforeach; ?>
<?php
include('footer.php')
    ?>