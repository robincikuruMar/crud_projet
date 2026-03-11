<?php
require 'config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$id = $_GET['id'];
$query = "SELECT * FROM users WHERE id=$id";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $update_query = "UPDATE users SET name='$name', email='$email', password='$password' WHERE id=$id";
    mysqli_query($conn, $update_query);
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Modifier</h2>
        <form method="POST" action="">
            <label>Nom</label>
            <input type="text" name="name" value="<?php echo $user['name']; ?>" required>
            <label>Email</label>
            <input type="text" name="email" value="<?php echo $user['email']; ?>" required>
            <label>Mot de passe</label>
            <input type="text" name="password" value="<?php echo $user['password']; ?>" required>
            <button type="submit" name="update">Modifier</button>
        </form>
        <p><a href="dashboard.php">Retour au Tableau de bord</a></p>
    </div>
</body>
</html>
