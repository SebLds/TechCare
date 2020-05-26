<?php $this->title = "Add User"; ?>

    <link href="/Web/css/register.css" rel="stylesheet">
    <link href="/Web/css/form.css" rel="stylesheet">

<div id="body">

  <div class="form-register box">

    <h1>Ajouter un utilisateur</h1>
    <p class="top-text">Veuillez fournir les informations nécessaires à l'ajout d'un nouvel utilisateur.</p>

    <form method="post">

      <div class="">
        <label>Type d'utilisateur</label>
        <div class="selectbox">
          <select name="select-user-type">
            <option value="">Choisir un type d'utilisateur</option>
            <option value="patient">Patient</option>
            <option value="manager">Gestionnaire</option>
            <option value="admin">Administrateur</option>
          </select>
        </div>
        <p class="error-msg"><?php if(isset($data[1]['error_selectUserType'])) { echo $data[1]['error_selectUserType']; } ?></p>
      </div>

      <div class="fields">

        <div class="left">

          <label>Prénom</label>
          <input type="text" name="firstName" placeholder="Romuald" value="<?php if(isset($data[0]['firstName'])) { echo $data[0]['firstName']; }?>">
          <p class="error-msg"><?php if(isset($data[1]['error_firstName'])) { echo $data[1]['error_firstName']; }?></p>

          <label>Date de naissance</label>

          <div class="birthdate">
            <input class="date" id="day" maxlength="2" type="text" name="day" placeholder="JJ" value="<?php //if(isset($data[0]['day'])) { echo $data[0]['day']; }?>">
            <input class="date" id="month" maxlength="2" type="text" name="month" placeholder="MM" value="<?php //if(isset($data['month'])) { echo $data['month']; }?>">
            <input class="date" id="year" maxlength="4" type="text" name="year" placeholder="AAAA" value="<?php //if(isset($data['year'])) { echo $data['year']; }?>">
          </div>
          <p class="error-msg"><?php if(isset($data[1]['error_birthdate'])) { echo $data[1]['error_birthdate']; }?></p>

          <label>Numéro de sécurité sociale</label>
          <input type="text" name="healthNumber" placeholder="2 94 03 75 120 005 22" value="<?php if(isset($data[0]['healthNumber'])) { echo $data[0]['healthNumber']; }?>">
          <p class="error-msg"><?php if(isset($data[1]['error_healthNumber'])) { echo $data[1]['error_healthNumber']; }?></p>

          <label>Adresse email</label>
          <input type="text" name="mail" placeholder="infinite@measures.com" value="<?php if(isset($data[0]['mail'])) { echo $data[0]['mail']; }?>">
          <p class="error-msg"><?php if(isset($data[1]['error_mail'])) { echo $data[1]['error_mail']; }?></p>

          <label>Confirmation adresse email</label>
          <input type="text" name="mailConfirm" placeholder="infinite@measures.com">
          <p class="error-msg"><?php if(isset($data[1]['error_mailmailConfirm'])) { echo $data[1]['error_mailmailConfirm']; }?></p>

        </div>

        <div class="right">

          <label>Nom</label>
          <input type="text" name="lastName" placeholder="Monteiro" value="<?php if(isset($data[0]['lastName'])) { echo $data[0]['lastName']; }?>">
          <p class="error-msg"><?php if(isset($data[1]['error_lastName'])) { echo $data[1]['error_lastName']; }?></p>

          <label>Société/Institution</label>
          <input type="text" name="company" placeholder="Hôpital Necker" value="<?php if(isset($data[0]['campany'])) { echo $data[0]['company']; }?>">
          <p class="error-msg"><?php if(isset($data[1]['error_company'])) { echo $data[1]['error_company']; }?></p>

          <label>Médecin référent</label>
          <input type="text" name="doctor" placeholder="Dupont" value="<?php if(isset($data[0]['doctor'])) { echo $data[0]['doctor']; }?>">
          <p class="error-msg"><?php if(isset($data[1]['error_doctor'])) { echo $data[1]['error_doctor']; }?></p>

          <label>Mot de passe</label>
          <input id="myInput" type="password" name="password" placeholder="●●●●●●●●" value="">
          <!-- <i class="far fa-eye-slash"></i> -->
          <p class="error-msg"><?php if(isset($data[1]['error_password'])) { echo $data[1]['error_password']; }?></p>

          <label>Confirmation du mot de passe</label>
          <input type="password" name="passwordConfirm" placeholder="●●●●●●●●">
          <p class="error-msg"><?php if(isset($data[1]['error_passwordConfirm'])) { echo $data[1]['error_passwordConfirm']; }?></p>

        </div>

      </div>

      <div class="submit">
        <input type="submit" value="Ajouter"  name="add">
      </div>

    </form>

  </div>

</div>

  <script type="text/javascript" src="/Web/js/password.js"></script>
