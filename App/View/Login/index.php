<?php $this->title = "Login" ?>

<link rel="stylesheet" href="/Web/css/login.css">
<link rel="stylesheet" href="/Web/css/form.css">

<div id="body">

    <div class="form-login box">

    <h1>Je me connecte à Infinite Measures</h1>
    <h2><a href="/register">Ou je m'inscris</h2></a>

    <p class="error-msg"><?php if(isset($error_login)) { echo $error_login; }?></p>

      <form method="post">

        <label>Identifiant</label>
        <input type="text" name="mail" placeholder="infinite@measures.com" value="<?php if(isset($mail)) { echo $mail; }?>">
        <p class="error-msg"><?php if(isset($error_mail)) { echo $error_mail; }?></p>

        <label>Mot de passe</label>
        <input id="password" type="password" name="password" name="password" placeholder="●●●●●●●●">
        <i id="eye" class="far fa-eye-slash" onclick="showHidePassword();"></i>

        <script>
        function showHidePassword() {
            var input = document.getElementById("password");
            if (input.type === "password") {
                input.type = "text";
                document.getElementById("eye").className = "far fa-eye";
            } else {
                input.type = "password";
                document.getElementById("eye").className = "far fa-eye-slash";
            }
          }
        </script>
        <!--<img id="eye" src="images/hide.png">-->
        <a href="/set-new-password"><h3>Mot de passe oublié</h3></a>
        <p class="error"><?php if(isset($error_password)) { echo $error_password; }?></p>

        <input type="submit" value="Se connecter" name="login">

      </form>

    </div>

</div>
