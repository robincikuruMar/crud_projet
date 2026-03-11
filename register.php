<?php
require 'config.php';
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    mysqli_query($conn, $query);
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Inscription</h2>
        <form method="POST" action="">
            <label>Nom</label>
            <input type="text" name="name" required>
            <label>Email</label>
            <input type="text" name="email" required>
            <label>Mot de passe</label>
            <input type="password" name="password" required>
            <button type="submit" name="register">S'inscrire</button>
        </form>
        <p>Déjà un compte ? <a href="login.php">Connexion</a></p>
    </div>
</body>
</html>
