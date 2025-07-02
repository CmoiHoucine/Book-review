<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
  <title><?php echo htmlspecialchars($livre['titre']); ?></title>
</head>
<body>
<?php include '../Includes/nav.php'; ?>
<div class="livre-container">
  <div class="livre-image">
    <img src="<?php echo htmlspecialchars($livre['couverture']); ?>" alt="Couverture du livre">
  </div>
  <div class="livre-details">
    <h1><?php echo htmlspecialchars($livre['titre']); ?></h1>
    <p><strong>Auteur :</strong> <?php echo htmlspecialchars($livre['auteur']); ?></p>
    <p><strong>Année :</strong> <?php echo htmlspecialchars($livre['anne']); ?></p>
    <p><strong>Genre :</strong> <?php echo htmlspecialchars($livre['genre']); ?></p>

    <div class="livre-resume">
      <?php echo nl2br(htmlspecialchars($livre['resumer'])); ?>
    </div>
  </div>
</div>
</body>
</html>