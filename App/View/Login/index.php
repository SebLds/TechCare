<?php use src\Controller;

$this->title = "Se connecter" ?>

<link rel="stylesheet" href="/Web/css/form.css">
<link rel="stylesheet" href="/Web/css/login.css">

<div id="body">

    <div class="form-login box">

    <h1 data-i18n="LOGIN-title"></h1>
    <h2><a href="/register"><span data-i18n="LOGIN-titlebis"></span></h2></a>

    <?php if (isset($error_login)): ?>
    <div class="msg">
        <p class="warning-msg"><i class="far fa-exclamation-triangle"></i>Votre mot de passe et/ou identifiant est incorrect</p>
    </div>
    <?php endif; ?>

      <form method="post">

        <label><i class="far fa-user"></i><span data-i18n="LOGIN-login"></span></label>
        <input type="text" name="mail" placeholder="infinite@measures.com">
        <p class="error-msg"><?php if(isset($error_mail)) { echo $error_mail; }?></p>

        <label><i class="far fa-lock"></i><span data-i18n="LOGIN-password"></span></label>
        <input id="password" type="password" name="password" placeholder="●●●●●●●●">
          <span id="eye-pass"><i id="eye" class="fal fa-eye-slash"></i></span></input>

        <a href="/set-new-password"><h3 data-i18n="LOGIN-fortgetpassword">Mot de passe oublié</h3></a>
        <p class="error"><?php if(isset($error_password)) { echo $error_password; }?></p>

        <input type="submit" value="Se connecter" name="login">

      </form>

    </div>

</div>

<script type="text/javascript" src="/Web/js/password.js"></script>
