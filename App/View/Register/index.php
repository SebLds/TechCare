<?php $this->title = "Register" ?>

    <link href="/Web/css/register.css" rel="stylesheet">
    <link href="/Web/css/form.css" rel="stylesheet">
    <link href="/Web/css/rules.css" rel="stylesheet">

<div id="body">

  <div class="form-register box">

    <h1>Je m'inscris à Infinite Measures</h1>
    <h2><a href="/login">Ou je me connecte</h2></a>

    <form method="post">

      <div class="fields">

        <div class="left">

          <label>Prénom</label>
          <input type="text" name="firstName" placeholder="Romuald" value="<?php if(isset($firstName)) { echo $firstName; }?>">
          <p class="error-msg"><?php if(isset($error_firstName)) { echo $error_firstName; }?></p>

          <label>Date de naissance</label>

          <div class="birthdate">
            <input class="date" id="day" maxlength="2" type="text" name="day" placeholder="JJ">
            <input class="date" id="month" maxlength="2" type="text" name="month" placeholder="MM">
            <input class="date" id="year" maxlength="4" type="text" name="year" placeholder="AAAA">
          </div>
          <p class="error-msg"><?php if(isset($error_birthdate)) { echo $error_birthdate; }?></p>

          <label>Adresse email</label>
          <input type="text" name="mail" placeholder="infinite@measures.com" value="<?php if(isset($mail)) { echo $mail; }?>">
          <p class="error-msg"><?php if(isset($error_mail)) { echo $error_mail; }?></p>

          <label>Confirmation adresse email</label>
          <input type="text" name="mailConfirm" placeholder="infinite@measures.com">
          <p class="error-msg"><?php if(isset($error_mailConfirm)) { echo $error_mailConfirm; }?></p>

        </div>

        <div class="right">

          <label>Nom</label>
          <input type="text" name="lastName" placeholder="Monteiro" value="<?php if(isset($lastName)) { echo $lastName; }?>">
          <p class="error-msg"><?php if(isset($error_lastName)) { echo $error_lastName; }?></p>

          <label>Médecin référent</label>
          <input type="text" name="doctor" placeholder="Dupont" value="<?php if(isset($doctor)) { echo $doctor; }?>">
          <p class="error-msg"><?php if(isset($error_doctor)) { echo $error_doctor; }?></p>

          <label>Mot de passe</label>
          <input id="myInput" type="password" name="password" placeholder="●●●●●●●●" value="<?php if(isset($password)) { echo $password; }?>">
          <i class="far fa-eye-slash"></i>
          <p class="error-msg"><?php if(isset($error_password)) { echo $error_password; }?></p>
           <!--<img id="eye" src="images/hide.png">-->

          <label>Confirmation du mot de passe</label>
          <input type="password" name="passwordConfirm" placeholder="●●●●●●●●">
          <p class="error-msg"><?php if(isset($error_passwordConfirm)) { echo $error_passwordConfirm; }?></p>

        </div>

      </div>

      <div class="CGU">
        <input type="checkbox" name="check">
        <p id="text-CGU">J'accepte et comprends les <span><a id="link-cgu" href="/cgu">conditions générales d'utilisations</a></span></p>
      </div>
      <p class="CGU" ><?php if(isset($error_cgu)) { echo $error_cgu; }?></p>

      <div class="submit">
        <input type="submit" value="S'inscrire"  name="register">
      </div>

    </form>

  </div>

</div>

  <script type="text/javascript" src="/Web/js/password.js"></script>
