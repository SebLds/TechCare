<?php $this->title='User Profil';?>

<link rel="stylesheet" href="/Web/css/form.css">
<link rel="stylesheet" href="/Web/css/profil.css">

<div id="body">

  <div class="form-profil box">

    <h1>Profil</h1>
    <p class="top-text">Modifier les informations d'un utilisateur.</p>

    <form method="post">

    <div class="top-btn">
      <button type="submit" name="delete" class="btn delete"><i class="fal fa-user-minus"></i>Supprimer</button>
      <button type="submit" name="ban" class="btn ban"><i class="fal fa-user-slash"></i>Bannir</button>
    </div>
      <div class="">

        <div class="top">
          <label><i class="fal fa-users"></i>Type d'utilisateur</label>
          <div class="selectbox">
            <select name="test-category">
              <option value="">
              <?php if ($profil['status']==1): ?>
               Patient
               <?php endif; ?>
               <?php if ($profil['status']==2): ?>
               Gestionnaire
               <?php endif; ?>
               <?php if ($profil['status']==3): ?>
               Administrateur
               <?php endif; ?>
              </option>
              <option value="stress">Patient</option>
              <option value="sight">Gestionnaire</option>
              <option value="sound">Administrateur</option>
            </select>
          </div>
          <p class="error-msg"><?php if(isset($error_select)) { echo $error_select; } ?></p>
        </div>

        <div class="fields">

          <div class="left">

            <label><i class="fal fa-user"></i>Prénom</label>
            <input type="text" name="newFirstName" placeholder="Romuald" value="<?php echo $profil['firstName']; ?>">
            <p class="error-msg"><?php if(isset($error_firstName)) { echo $error_firstName; }?></p>

            <label><i class="fal fa-envelope"></i>Adresse email</label>
            <input type="text" name="newMail" placeholder="infinite@measures.com" value="<?php echo $profil['mail']; ?>">
            <p class="error-msg"><?php if(isset($error_mail)) { echo $error_mail; }?></p>

            <?php if($profil['status']==1): ?>
            <label><i class="fal fa-file-medical-alt"></i>Numéro de sécurité sociale</label>
            <input type="text" name="newHealthNumber" placeholder="" value="<?php echo $profil['healthNumber']; ?>">
            <p class="error-msg"><?php if(isset($error_healthNumber)) { echo $error_healthNumber; }?></p>
            <?php endif; ?>

            <label><i class="fal fa-lock"></i>Nouveau mot de passe</label>
            <input id="myInput" type="newPassword" name="password" placeholder="●●●●●●●●" value="">
            <p class="error-msg"><?php if(isset($error_password)) { echo $error_password; }?></p>

          </div>

          <div class="right">

            <label><i class="fal fa-user-tag"></i>Nom</label>
            <input type="text" name="newLastName" placeholder="Monteiro" value="<?php echo $profil['lastName']; ?>">
            <p class="error-msg"><?php if(isset($error_healthNumber)) { echo $error_healthNumber; }?></p>

            <?php if($profil['status']==2): ?>
            <label><i class="fal fa-user-tag"></i>Institution référente</label>
            <input type="text" name="newCompany" placeholder="Hôpital Necker" value="<?php echo $profil['company']; ?>">
            <p class="error-msg"><?php if(isset($error_company)) { echo $error_company; }?></p>
            <?php endif; ?>

            <label><i class="fal fa-calendar-alt"></i>Date de naissance</label>
            <div class="birthdate">
              <input class="date" id="day" maxlength="2" type="text" name="day" placeholder="JJ" value="<?php echo substr($profil['birthdate'], 0, 2); ?>">
              <input class="date" id="month" maxlength="2" type="text" name="month" placeholder="MM" value="<?php echo substr($profil['birthdate'], 3, 2); ?>">
              <input class="date" id="year" maxlength="4" type="text" name="year" placeholder="AAAA" value="<?php echo substr($profil['birthdate'], -4); ?>">
            </div>
            <p class="error-msg"><?php if(isset($error_birthdate)) { echo $error_birthdate; }?></p>

            <?php if($profil['status']==1): ?>
            <label><i class="fal fa-user-md"></i>Médecin référent</label>
            <input type="text" name="newDoctor" placeholder="Dupont" value="<?php echo $profil['doctor']; ?>">
            <p class="error-msg"><?php if(isset($error_doctor)) { echo $error_doctor; }?></p>
            <?php endif; ?>

            <label><i class="fal fa-unlock"></i>Confirmation mot de passe</label>
            <input id="myInput" type="newPasswordConfirm" name="password" placeholder="●●●●●●●●" value="">
            <p class="error-msg"><?php if(isset($error_password)) { echo $error_password; }?></p>

          </div>

        </div>

        <div class="bottom-edit">
          <label><i class="fal fa-unlock"></i>Confirmation mot de passe</label>
          <input id="myInput" type="newPasswordConfirm" name="password" placeholder="●●●●●●●●" value="">
          <p class="error-msg"><?php if(isset($error_password)) { echo $error_password; }?></p>
        </div>

      </div>

      <div class="submit">
        <input type="submit" value="Modifier"  name="change">
      </div>

    </form>

  </div>

</div>
