<?php $this->title = "S'inscrire" ?>

    <link href="/Web/css/register.css" rel="stylesheet">
    <link href="/Web/css/form.css" rel="stylesheet">

<div id="body">

  <div class="form-register box">

    <h1 data-i18n="REGISTER-title"></h1>
    <h2><a href="/login"><span data-i18n="REGISTER-titlebis"></span></h2></a>

    <form method="post" action="/register">

      <div class="fields">

        <div class="left">

          <label><i class="far fa-user"></i><span data-i18n="REGISTER-firstname"></span></label>
          <input type="text" name="firstName" placeholder="Romuald" value="<?php if(isset($data[0]['firstName'])) { echo $data[0]['firstName']; }?>">
          <p class="error-msg"><?php if(isset($data[1]['error_firstName'])) { echo $data[1]['error_firstName']; }?></p>

          <label><i class="far fa-calendar-alt"></i><span data-i18n="REGISTER-birthdate"></span></label>
          <div class="birthdate">
            <input class="date" id="day" maxlength="2" type="text" name="day" placeholder="JJ" value="<?php //if(isset($data[0]['day'])) { echo $data[0]['day']; }?>">
            <input class="date" id="month" maxlength="2" type="text" name="month" placeholder="MM" value="<?php //if(isset($data['month'])) { echo $data['month']; }?>">
            <input class="date" id="year" maxlength="4" type="text" name="year" placeholder="AAAA" value="<?php //if(isset($data['year'])) { echo $data['year']; }?>">
          </div>
          <p class="error-msg"><?php if(isset($data[1]['error_birthdate'])) { echo $data[1]['error_birthdate']; }?></p>

          <label><i class="far fa-envelope"></i><span data-i18n="REGISTER-mail"></span></label>
          <input type="text" name="mail" placeholder="infinite@measures.com" value="<?php if(isset($data[0]['mail'])) { echo $data[0]['mail']; }?>">
          <p class="error-msg"><?php if(isset($data[1]['error_mail'])) { echo $data[1]['error_mail']; }?></p>

          <label><i class="far fa-check-square"></i><span data-i18n="REGISTER-confirmmail"></span></label>
          <input type="text" name="mailConfirm" placeholder="infinite@measures.com">
          <p class="error-msg"><?php if(isset($data[1]['error_mailmailConfirm'])) { echo $data[1]['error_mailmailConfirm']; }?></p>

        </div>

        <div class="right">

          <label><i class="far fa-user-tag"></i><span data-i18n="REGISTER-lastname"></span></label>
          <input type="text" name="lastName" placeholder="Monteiro" value="<?php if(isset($data[0]['lastName'])) { echo $data[0]['lastName']; }?>">
          <p class="error-msg"><?php if(isset($data[1]['error_lastName'])) { echo $data[1]['error_lastName']; }?></p>

          <label><i class="far fa-user-md"></i><span data-i18n="REGISTER-doctor"></span></label>
          <input type="text" name="doctor" placeholder="Dupont" value="<?php if(isset($data[0]['doctor'])) { echo $data[0]['doctor']; }?>">
          <p class="error-msg"><?php if(isset($data[1]['error_doctor'])) { echo $data[1]['error_doctor']; }?></p>

          <label><i class="far fa-lock"></i><span data-i18n="REGISTER-password"></span></label>
            <input id="password" type="password" name="password" placeholder="●●●●●●●●" value="">
            <span><i id="eye" class="far fa-eye-slash"></i></span>
          <p class="error-msg"><?php if(isset($data[1]['error_password'])) { echo $data[1]['error_password']; }?></p>

          <label><i class="far fa-unlock"></i><span data-i18n="REGISTER-confirmpassword"></span></label>
          <input type="password" name="passwordConfirm" placeholder="●●●●●●●●">
          <p class="error-msg"><?php if(isset($data[1]['error_passwordConfirm'])) { echo $data[1]['error_passwordConfirm']; }?></p>

        </div>

      </div>

      <div class="bottom">
          <label><i class="far fa-file-medical-alt"></i><span data-i18n="REGISTER-healthnumber"></span></label>
          <input type="text" name="healthNumber" placeholder="2 94 03 75 120 005 22" maxlength="15" value="<?php if(isset($data[0]['healthNumber'])) { echo $data[0]['healthNumber']; }?>">
          <p class="error-msg"><?php if(isset($data[1]['error_healthNumber'])) { echo $data[1]['error_healthNumber']; }?></p>
      </div>

      <div class="CGU">
          <input id="box1" type="checkbox" name="check"/>
          <label for="box1" id="text-CGU"><test data-i18n="REGISTER-cgu1"></test><span><a id="link-cgu" href="/cgu"><test data-i18n="REGISTER-cgu2"></test></a></span></label>
      </div>
      <p class="CGU"><?php if(isset($data[1]['error_cgu'])) { echo $data[1]['error_cgu']; }?></p>

      <div class="submit">
        <input type="submit" value="S'inscrire"  name="register">
      </div>

    </form>
  </div>
</div>

<script type="text/javascript" src="/Web/js/password.js"></script>
