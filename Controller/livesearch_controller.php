<?php 
require_once '../model/database.php'; 
$bdd = getDatabaseConnection();  

if (isset($_GET['query'])) {
    $query = htmlspecialchars($_GET['query']);

    // Recherche de livres
    $stmtLivres = $bdd->prepare("SELECT id, titre, couverture  FROM livres WHERE titre LIKE :query OR auteur = :query LIMIT 3");
    $stmtLivres->execute(['query' => '%' . $query . '%']);
    $livres = $stmtLivres->fetchAll(PDO::FETCH_ASSOC);

    // Recherche d'utilisateurs
    $stmtUtilisateurs = $bdd->prepare("SELECT id, pseudo FROM utilisateurs WHERE pseudo LIKE :query LIMIT 3");
    $stmtUtilisateurs->execute(['query' => '%' . $query . '%']);
    $utilisateurs = $stmtUtilisateurs->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($livres)) {
        echo "<h3>Livres trouvés</h3><ul>";
        foreach ($livres as $livre) {
                       echo "<li>
        <img src='{$livre['couverture']}' class='mini-couverture'>
        <a href='../livre.php?id={$livre['id']}'>" . htmlspecialchars($livre['titre']) . "</a>
      </li>";

                        

        }
        echo "</ul>";
    }

    if (!empty($utilisateurs)) {
        echo "<h3>Utilisateurs trouvés</h3><ul>";
        foreach ($utilisateurs as $utilisateur) {
                        echo "<li><a href='../profil.php?id={$utilisateur['id']}'>" . htmlspecialchars($utilisateur['pseudo']) . "</a></li>";

        }
        echo "</ul>";
    }

    exit(); 
}
