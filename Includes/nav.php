<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<link rel="stylesheet" href="/Projet_web_de_con_la/css/style.css">
<nav class="navbar">
  <a href="../View/index.php">Accueil</a>
  


  <?php if (isset($_SESSION['username'])): ?>
    | <a href="../View/mon_profil.php">Mon profil</a>
    | <a href="../View/ajouter_livre.php">Ajouter un livre</a>
    | <a href="../Controller/LogoutController.php">Déconnexion</a>
  <?php else: ?>
    | <a href="../View/login.php">Connexion</a>
    | <a href="../View/register.php">Inscription</a>
  <?php endif; ?>

  <!-- Barre de recherche live -->
  <div class="search-container">
    <input type="text" id="search" placeholder="Rechercher un livre ou un profil..." autocomplete="off">
    <div id="search-results"></div>
  </div>
</nav>

<!-- Script de live search -->
<script src="../js/live_search.js"></script>
