<?php $this->title = "Login" ?>

<link rel="stylesheet" href="/Web/css/login.css">
<link rel="stylesheet" href="/Web/css/form.css">

<div id="body">

  <div class="box">

    <div class="form-login">

    <h1>Je me connecte à Infinite Measures</h1>
    <h2><a href="/register">Ou je m'inscris</h2></a>

      <form action="../../Web/index.php" method="post">

        <label>Identifiant</label>
        <input type="text" name="mail" placeholder="infinite@measures.com" value="<?php if(isset($mail)) { echo $mail; }?>">
        <p><?php if(isset($error_mail)) { echo $error_mail; }?></p>

        <label>Mot de passe</label>
        <input type="password" name="passwword" id="myInput" name="password" placeholder="●●●●●●●●">
        <img id="eye" src="images/hide.png">
        <a href="/set-new-password"><h3>Mot de passe oublié</h3></a>

        <input type="submit" value="Se connecter" name="login">

      </form>

    </div>

  </div>

</div>

      <!--<div class="connexion-header">
        <div class="text">
          <h2>Vous revoilà !</h2>
        </div>

        <div class="quit">
          <button id="button-quit"><img id="img-quit" src="images/quit.png"></button>
        </div>
      </div>-->

      <!--<script type="text/javascript" src="JS/connexion.js"></script>-->
