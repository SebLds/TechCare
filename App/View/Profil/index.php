<?php $this->title='Profil';?>

<link rel="stylesheet" href="/Web/css/profil.css">
<link rel="stylesheet" href="/Web/css/form.css">

<div id="body">

  <div class="form-profil box">

    <h1>Mon profil</h1>
    <p class="top-text">Modifier vos informations personnelles ainsi que votre mot de passe.</p>

    <form method="post" action="/login">

      <div class="fields">

        <div class="left">

          <label>Prénom</label>
          <input type="text" name="firstName" placeholder="Romuald" value="<?php if(isset($firstName)) { echo $firstName; }?>">
          <p class="error-msg"><?php if(isset($error_firstName)) { echo $error_firstName; }?></p>

          <label>Adresse email</label>
          <input type="text" name="mail" placeholder="infinite@measures.com" value="<?php if(isset($mail)) { echo $mail; }?>">
          <p class="error-msg"><?php if(isset($error_mail)) { echo $error_mail; }?></p>

          <label>Numéro de sécurité sociale</label>
          <input type="text" name="" placeholder="2 94 03 75 120 005 22">
          <p class="error-msg"><?php if(isset($error_healthNumber)) { echo $error_healthNumber; }?></p>

          <label>Nouveau mot de passe</label>
          <input id="myInput" type="password" name="password" placeholder="●●●●●●●●" value="<?php if(isset($password)) { echo $password; }?>">
          <i class="far fa-eye-slash"></i>
          <p class="error-msg"><?php if(isset($error_password)) { echo $error_password; }?></p>

        </div>

        <div class="right">

          <label>Nom</label>
          <input type="text" name="" placeholder="Monteiro">
          <p class="error-msg"><?php if(isset($error_healthNumber)) { echo $error_healthNumber; }?></p>

          <label>Date de naissance</label>
          <div class="birthdate">
            <input class="date" id="day" maxlength="2" type="text" name="day" placeholder="JJ">
            <input class="date" id="month" maxlength="2" type="text" name="month" placeholder="MM">
            <input class="date" id="year" maxlength="4" type="text" name="year" placeholder="AAAA">
          </div>
          <p class="error-msg"><?php if(isset($error_birthdate)) { echo $error_birthdate; }?></p>

          <label>Médecin référent</label>
          <input type="text" name="doctor" placeholder="Dupont" value="<?php if(isset($doctor)) { echo $doctor; }?>">
          <p class="error-msg"><?php if(isset($error_doctor)) { echo $error_doctor; }?></p>

          <label>Confirmation mot de passe</label>
          <input id="myInput" type="password" name="password" placeholder="●●●●●●●●" value="<?php if(isset($password)) { echo $password; }?>">
          <p class="error-msg"><?php if(isset($error_password)) { echo $error_password; }?></p>

        </div>

      </div>

      <div class="submit">
        <input type="submit" value="Modifier"  name="register">
      </div>

    </form>

  </div>

</div>
