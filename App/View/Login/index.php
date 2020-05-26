<?php $this->title = "Login" ?>

<link rel="stylesheet" href="/Web/css/login.css">
<link rel="stylesheet" href="/Web/css/form.css">

<div id="body">

    <div class="form-login box">

    <h1 data-i18n="LOGIN-title"></h1>
    <h2><a href="/register"><span data-i18n="LOGIN-titlebis"></span></h2></a>

    <p class="error-msg"><?php if(isset($error_login)) { echo $error_login; }?></p>
    <?php echo getText('REGISTER-title'); ?>

      <form method="post">

        <label><i class="far fa-user"></i><span data-i18n="LOGIN-id"></span></label>
        <input type="text" name="mail" placeholder="infinite@measures.com">
        <p class="error-msg"><?php if(isset($error_mail)) { echo $error_mail; }?></p>

        <label><i class="far fa-lock"></i><span data-i18n="LOGIN-password"></span></label>
        <input id="password" type="password" name="password" name="password" placeholder="●●●●●●●●">
        <i id="eye" class="far fa-eye-slash"></i>

        <script>
        // function showHidePassword() {
        //     var input = document.getElementById("password");
        //     if (input.type === "password") {
        //         input.type = "text";
        //         document.getElementById("eye").className = "far fa-eye";
        //     } else {
        //         input.type = "password";
        //         document.getElementById("eye").className = "far fa-eye-slash";
        //     }
        //   }
        </script>

        <a href="/set-new-password"><h3 data-i18n="LOGIN-fortgetpassword">Mot de passe oublié</h3></a>
        <p class="error"><?php if(isset($error_password)) { echo $error_password; }?></p>

        <input type="submit" value="Se connecter" name="login">

      </form>

    </div>

</div>

<script type="text/javascript" src="/Web/js/password.js"></script>
