
<?php
$servername = "localhost";  // Ou l'adresse de ton serveur MySQL
$username = "phpmyadmin";         // Ton nom d'utilisateur MySQL
$password = "123456";             // Ton mot de passe MySQL
$dbname = "AP5"; // Le nom de ta base de données

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}
?>