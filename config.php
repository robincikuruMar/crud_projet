<?php
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "crud_db";
$conn = mysqli_connect("localhost:3307", "root", "", "crud_db");
if (!$conn) {
    die("Erreur de connexion");
}
?>
