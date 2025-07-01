<?php 
require_once '../model/database.php'; 
$bdd = getDatabaseConnection();  
if (isset($_GET['query'])) {
    $query = htmlspecialchars($_GET['query']);
    
    // Préparation de la requête pour rechercher dans les livres
    $stmtLivres = $bdd->prepare("SELECT id, titre FROM livres WHERE titre LIKE :query OR auteur = :query LIMIT 3");
    $stmtLivres->execute(['query' => '%' . $query . '%']);
    $livres = $stmtLivres->fetchAll(PDO::FETCH_ASSOC);
    
    // Préparation de la requête pour rechercher dans les utilisateurs
    $stmtUtilisateurs = $bdd->prepare("SELECT id, pseudo FROM utilisateurs WHERE pseudo Like :query Limit 3");
    $stmtUtilisateurs->execute(['query' => '%' . $query . '%']);
    $utilisateurs = $stmtUtilisateurs->fetchAll(PDO::FETCH_ASSOC);
   
    foreach ($livres as $livre) {
        echo "<h3>Livres trouvés</h3><ul><li>" . htmlspecialchars($livre['titre']) . "</li></ul>";
    }
    foreach ($utilisateurs as $utilisateur) {
        echo "<h3>Utilisateurs trouvés</h3><ul><li>" . htmlspecialchars($utilisateur['pseudo']) . "</li></ul>";
    }
    exit();
}
