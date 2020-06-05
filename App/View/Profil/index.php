<?php $this->title='Profil';?>

<link rel="stylesheet" href="/Web/css/profil.css">
<link rel="stylesheet" href="/Web/css/form.css">

<div id="body">

  <div class="form-profil box">

    <h1>Mon profil</h1>
    <p class="top-text">Modifier vos informations personnelles ainsi que votre mot de passe.</p>

    <form method="post" action="/profil">

      <div class="fields">

        <div class="left">

          <label><i class="fal fa-user"></i>Prénom</label>
          <input type="text" name="newFirstName" placeholder="Romuald" value="<?php echo $data['firstName']; ?>">
          <p class="error-msg"><?php if(isset($error_firstName)) { echo $error_firstName; }?></p>

          <label><i class="fal fa-envelope"></i>Adresse email</label>
          <input type="text" name="newMail" placeholder="infinite@measures.com" value="<?php echo $data['mail']; ?>">
          <p class="error-msg"><?php if(isset($error_mail)) { echo $error_mail; }?></p>

          <?php if($_SESSION['sessionStatus']==1): ?>
          <label><i class="fal fa-file-medical-alt"></i>Numéro de sécurité sociale</label>
          <input type="text" name="newHealthNumber" placeholder="<?php echo $data['healthNumber']; ?>" value="<?php echo $data['healthNumber']; ?>">
          <p class="error-msg"><?php if(isset($error_healthNumber)) { echo $error_healthNumber; }?></p>
          <?php endif; ?>

          <label><i class="fal fa-lock"></i>Nouveau mot de passe</label>
          <input id="password" type="newPassword" name="password" placeholder="●●●●●●●●" value="">
          <span><i id="eye" class="fal fa-eye-slash"></i></span>
          <p class="error-msg"><?php if(isset($error_password)) { echo $error_password; }?></p>

        </div>

        <div class="right">

          <label><i class="fal fa-user-tag"></i>Nom</label>
          <input type="text" name="newLastName" placeholder="Monteiro" value="<?php echo $data['lastName']; ?>">
          <p class="error-msg"><?php if(isset($error_healthNumber)) { echo $error_healthNumber; }?></p>

          <label><i class="fal fa-calendar-alt"></i>Date de naissance</label>
          <div class="birthdate">
            <input class="date" id="day" maxlength="2" type="text" name="day" placeholder="JJ" value="<?php echo substr($data['birthdate'], 0, 2); ?>">
            <input class="date" id="month" maxlength="2" type="text" name="month" placeholder="MM" value="<?php echo substr($data['birthdate'], 3, 2); ?>">
            <input class="date" id="year" maxlength="4" type="text" name="year" placeholder="AAAA" value="<?php echo substr($data['birthdate'], -4); ?>">
          </div>
          <p class="error-msg"><?php if(isset($error_birthdate)) { echo $error_birthdate; }?></p>

          <?php if($_SESSION['sessionStatus']==1): ?>
          <label><i class="fal fa-user-md"></i>Médecin référent</label>
          <input type="text" name="newDoctor" placeholder="Dupont" value="<?php echo $data['doctor']; ?>">
          <p class="error-msg"><?php if(isset($error_doctor)) { echo $error_doctor; }?></p>
          <?php endif; ?>

          <label><i class="fal fa-unlock"></i>Confirmation mot de passe</label>
          <input id="myInput" type="newPasswordConfirm" name="password" placeholder="●●●●●●●●" value="">
          <p class="error-msg"><?php if(isset($error_password)) { echo $error_password; }?></p>

        </div>
      </div>

      <?php if($_SESSION['sessionStatus']==2): ?>
          <label><i class="far fa-building"></i>Institution référente</label>
          <input type="text" name="newCompany" placeholder="Hôpital Necker" value="<?php echo $data['company']; ?>">
          <p class="error-msg"><?php if(isset($error_doctor)) { echo $error_doctor; }?></p>
      <?php endif; ?>

      <label><i class="fal fa-user-check"></i>Valider les modifications avec votre mot de passe</label>
      <input type="password" name="confirmChanges" placeholder="●●●●●●●●">
      <p class="error-msg"><?php if(isset($error_confirmChanges)) { echo $derror_confirmChanges; }?></p>

      <div class="submit">
        <input type="submit" value="Modifier"  name="change">
      </div>

    </form>

  </div>
</div>

<script type="text/javascript" src="/Web/js/password.js"></script>
