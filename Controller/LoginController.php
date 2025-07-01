<?php
require_once '../model/database.php'; 
$bdd = getDatabaseConnection();   
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
   if ($username != "" && $password != "") {
        $stmt = $bdd->prepare("SELECT * FROM utilisateurs WHERE pseudo = ?");
        $stmt->execute(params: [$username]);
        $requete = $stmt->fetch();
        
    if ($requete && password_verify($password, $requete['mdp'])) {
            session_start();
            $_SESSION['username'] = $username;
            header("Location: ../View/index.php");
            exit();
        } else {
            echo "❌ Nom d'utilisateur ou mot de passe incorrect.";
        }
    } else {
        echo "❌ Veuillez remplir tous les champs.";
    }
}
?>