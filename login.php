<?php
require 'config.php';
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['id'];
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Email ou mot de passe incorrect";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Connexion</h2>
        <?php if(isset($error)) { echo "<p class='error'>$error</p>"; } ?>
        <form method="POST" action="">
            <label>Email</label>
            <input type="text" name="email" required>
            <label>Mot de passe</label>
            <input type="password" name="password" required>
            <button type="submit" name="login">Se connecter</button>
        </form>
        <p>Pas encore de compte ? <a href="register.php">Inscription</a></p>
    </div>
</body>
</html>
