<?php
require('connectDB.php');
$pdo = connectDB();
// echo ('vous êtes bien connecté');

if (!isset($_SESSION["username"])) {
    header("Location: index.php");
}
?>