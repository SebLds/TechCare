<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/connexion.css">
    <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
</head>

  <body>

    <div class="connexion-page">

      <div class="logo">
        <a href="home.php"><img id="logo" src="images/logo.png" alt="logo"></a>
      </div>

      <div class="connexion-body">

        <div class="border">
        <h1>Je me connecte à Infinite Measures</h1>
          <form action="tableau_de_bord.php" method="post">
            <h2>Identifiant</h2>
            <input type="text" name="ID" placeholder="infinite@measures.com">
            <h2>Mot de passe</h2>
            <input type="password" name="password" placeholder="●●●●●●●●">
          </form>
          <button>Je me connecte</button>
          <a href="password.php">J'ai oublié mon mot de passe</a>
        </div>

      </div>

    </div>

  </body>

</html>

      <!--<div class="connexion-header">
        <div class="text">
          <h2>Vous revoilà !</h2>
        </div>

        <div class="quit">
          <button id="button-quit"><img id="img-quit" src="images/quit.png"></button>
        </div>
      </div>-->

      <!--<script type="text/javascript" src="JS/connexion.js"></script>-->
