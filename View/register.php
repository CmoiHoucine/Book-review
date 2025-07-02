<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Document</title>
</head>
<body class="auth-body">
    <?php include '../Includes/nav.php'; ?>

    <form action="../Controller/RegisterController.php" method="post">
    <h1>Inscription</h1>
    <label for="username">Nom d'utilisateur:</label>
    <input type="text" id="username" name="username" placeholder="Entrez un nom" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" placeholder="Entrez une adresse mail" required><br>

    <label for="password">Mot de passe:</label>
    <input type="password" id="password" name="password" placeholder="Entrez un mot de passe" required><br>

    <button type="submit" name="submit">S'inscrire</button>
</form>
</body>
</html>