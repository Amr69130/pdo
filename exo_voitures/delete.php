<?php
//verif presence ID url
var_dump($_GET['id']);


require('connectDB.php');


//Recup en bdd des données grâce à leur ID
$pdo = connectDB();
$requete = $pdo->prepare("SELECT * FROM car WHERE id = :id;");
$requete->execute([
    'id' => $_GET['id']
]);

$car = $requete->fetch();
//verif  si resultat
var_dump($car);
if ($car === false) {

    header('location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {



    $requestDelete = $pdo->prepare("DELETE FROM car WHERE id = :id;");
    $requestDelete->execute(
        [
            ":id" => $car['id']
        ]
    );
    header('location: index.php');
}

?>

<?php
include('header.php');
?>


<form method="POST" action="delete.php?id=<?= $_GET['id'] ?>">
    <button class="btn btn-danger">SUPPRIMER</button>
    <button class="btn btn-secondary" formaction="index.php">ANNULER</button>
</form>


<?php
include('footer.php');
?>