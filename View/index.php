
<?php
           if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
           
?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Document</title>
</head>
<body>

<div class="section-derniers-livres">
  <h2>📚 Livres les plus récents</h2>

  <div class="liste-derniers-livres">
    <?php foreach ($RequiredBooks as $livre): ?>
      <div class="livre-card">
        <div class="flip-card">
          <div class="flip-card-inner">

            <div class="flip-card-front">
              <img src="<?= htmlspecialchars($livre['couverture']) ?>" alt="Couverture">
            </div>

            <div class="flip-card-back">
              <h4><?= htmlspecialchars($livre['titre']) ?></h4>
              <p><?= substr(htmlspecialchars($livre['resumer']), 0, 150) . '...' ?></p>
              <a href="/Projet_web_de_con_la/Controller/livreController.php?id=<?= $livre['id'] ?>">Voir plus</a>
            </div>

          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>