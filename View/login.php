<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Document</title>
</head>

<body class="auth-body">
  <?php include '../Includes/nav.php'; ?>

  <div class="form-wrapper">
    <div id="login-error" class="form-error"></div>

    <form id="login-form">
      <h1>Connexion</h1>
      <label for="username">Nom d'utilisateur:</label>
      <input type="text" id="username" name="username" placeholder="Entrez un nom" required><br>

      <label for="password">Mot de passe:</label>
      <input type="password" id="password" name="password" placeholder="Entrez un mot de passe" required><br>

      <button type="submit" name="submit">Se connecter</button>
      <br>
      <div class="register">
        <span>Pas de compte ?</span> <a href="../View/register.php">Inscrivez vous </a>
      </div>
    </form>
  </div>

  <script src="../js/login.js"></script>
</body>


</html>