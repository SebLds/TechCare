<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/Web/css/connexion.css">
    <link rel="stylesheet" href="/Web/css/form.css">
    <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
</head>

  <body>

    <div class="page">

      <div class="logo">
        <a href=""><img id="logo" src="/Web/images/logo.png" alt="logo"></a>
      </div>

      <div class="box">

          <div class="title">
            <h1>Je me connecte à <br>Infinite Measures</h1>
            <h3><a href="register.php">Ou je m'inscris</h3></a>
          </div>

          <div class="form">
            <form action="../../index.php" method="post">
              <label>Identifiant</label>
              <input type="text" name="mail" placeholder="infinite@measures.com" value="<?php if(isset($mail)) { echo $mail; }?>">
              <p><?php if(isset($error_mail)) { echo $error_mail; }?></p>
              <label>Mot de passe</label>
              <input type="password" name="passwword" id="myInput" name="password" placeholder="●●●●●●●●">
              <img id="eye" src="images/hide.png">
              <input type="submit" value="Je me connecte" name="login">
              <a href="password.php"><h3>J'ai oublié mon mot de passe</h3></a>
            </form>
          </div>

      </div>

    </div>

    <script type="text/javascript" src="/Web/js/password.css"></script>

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
