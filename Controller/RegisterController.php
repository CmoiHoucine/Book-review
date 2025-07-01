<?php
require_once __DIR__ . '/../Model/database.php';
$bdd = getDatabaseConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = htmlspecialchars( string: (string)$_POST['username']);
    $email = htmlspecialchars( string: $_POST['email']);
    $password = $_POST['password'];
 
    // Vérification si l'email existe déjà
    $check = $bdd->prepare("SELECT COUNT(*) FROM utilisateurs WHERE email = :email");
    $check->execute(['email' => $email]);
    if ($check->fetchColumn() > 0) {
        echo "❌ L'email est déjà utilisé.";
        exit;
    }

    // Insertion sécurisée
    $requete = $bdd->prepare("INSERT INTO utilisateurs (pseudo, email, mdp) VALUES (:pseudo, :email, :mdp)");
    $requete->execute([
        'pseudo' => $name,
        'email' => $email,
        'mdp' => password_hash(password: $password, algo: PASSWORD_DEFAULT)
    ]);

    header("Location: ../View/login.php");
}
?>