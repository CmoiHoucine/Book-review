<?php
require_once '../model/database.php'; 
$bdd = getDatabaseConnection();   

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (trim($username) === '' || trim($password) === '') {
        echo "❌ Veuillez remplir tous les champs.";
        exit;
    }

    $stmt = $bdd->prepare("SELECT * FROM utilisateurs WHERE pseudo = ?");
    $stmt->execute([$username]);
    $requete = $stmt->fetch();

    if (!$requete) {
        echo "❌ Nom d'utilisateur incorrect.";
        exit;
    }

    if (!password_verify($password, $requete['mdp'])) {
        echo "❌ Mot de passe incorrect.";
        exit;
    }

    session_start();
    $_SESSION['username'] = $username;
    echo "success";
    exit;
}
?>
