<?php
require('connectDB.php');
$pdo = connectDB();
$pass = password_hash("admin", PASSWORD_DEFAULT);
var_dump($pass)
    ?>

<form method="POST" action="login.php">
    <label>Username</label>
    <input required type="text" name="username">
    <label>Password</label>
    <input required type="password" name="password">
    <button class="btn btn-outline-succes">Se connecter</button>
</form>