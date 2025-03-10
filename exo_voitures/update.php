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
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    if (empty($_POST['brand'])) {
        $errors['brand'] = 'Le champ marque ne peut pas être vide.';
    }

    if (empty($_POST['model'])) {
        $errors['model'] = 'Le champ model ne peut pas être vide.';
    }
    if (empty($_POST['horsePower'])) {
        $errors['horsePower'] = 'Le champ nombre de chevaux ne peut pas être vide.';
    }
    if (empty($_POST['image'])) {
        $errors['image'] = 'Le champ image ne peut pas être vide.';
    }



    if (empty($errors)) {
        $request = $pdo->prepare("UPDATE car SET model = :model, brand = :brand, horsePower = :horsePower, image = :image WHERE id = :id;");

        var_dump($_POST);
        $request->execute([
            ":model" => $_POST['model'],
            ":brand" => $_POST['brand'],
            ":horsePower" => $_POST['horsePower'],
            ":image" => $_POST['image'],
            ":id" => $car['id']
        ]);
        // var_dump('okay');
        header("location: index.php");
    }

}
?>

<?php
require_once('header.php');
// var_dump($_GET);

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


<div class="container text-center">
    <h2 class="mb-4">Modifier une Voiture</h2>
    <form action="update.php?id=<?= $car['id'] ?>" method="POST">


        <div class="mb-3">
            <label for="brand" class="form-label">Marque</label>
            <input type="text" class="form-control" name="brand" id="brand" value="<?= $car['brand'] ?>">
            <?php if (isset($errors['brand'])): ?>
                <p class="text-danger"><?= $errors['brand'] ?></p>
                <?php
            endif;
            // var_dump($errors['brand']);
            ?>
        </div>



        <div class="mb-3">
            <label for="model" class="form-label">Modèle</label>
            <input type="text" class="form-control" name="model" id="model" value="<?= $car['model'] ?>">
            <?php if (isset($errors['model'])): ?>
                <p class="text-danger"><?= $errors['model'] ?></p>
                <?php
            endif;
            // var_dump($errors['model']);
            ?>
        </div>
        <div class="mb-3">
            <label for="horsePower" class="form-label">Nombre de chevaux</label>
            <input type="text" class="form-control" name="horsePower" id="horsePower" value="<?= $car['horsePower'] ?>">
            <?php if (isset($errors['horsePower'])): ?>
                <p class="text-danger"><?= $errors['horsePower'] ?></p>
                <?php
            endif;
            // var_dump($errors['horsePower']);
            ?>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image du véhicule</label>
            <input type="text" class="form-control" name="image" id="image" value="<?= $car['image'] ?>">
            <?php if (isset($errors['image'])): ?>
                <p class="text-danger"><?= $errors['image'] ?></p>
                <?php
            endif;
            // var_dump($errors['image']);
            ?>
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>


    </form>
</div>