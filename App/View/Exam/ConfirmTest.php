<?php $this->title='Confirmer un test'; ?>

<link rel="stylesheet" href="/Web/css/form.css">
<link rel="stylesheet" href="/Web/css/summaryTest.css">
<link rel="stylesheet" href="/Web/css/button.css">

<div id="body">

  <div class="form-confirm-test box">

    <h1><a href="/test" id="underline"><button type="button" id="back-btn"><i class="far fa-arrow-alt-circle-left"></i>Revenir en arrière</button></a></h1>

    <h1>Confirmation des informations du patient</h1>
    <p class="top-text">Veuillez vérifier les informations avant de lancer le test.</p>

      <div class="personnal-info">

        <div class="left">

          <label><i class="far fa-user"></i>Prénom</label>
          <p class="infos"><?php echo $data['firstName']; ?></p>

          <label><i class="far fa-calendar-alt"></i>Date de naissance</label>
          <p class="infos"><?php echo $data['birthdate']; ?></p>

        </div>

        <div class="right">

          <label><i class="far fa-user-tag"></i>Nom</label>
          <p class="infos"><?php echo $data['lastName']; ?></p>

          <label><i class="far fa-envelope"></i>Adresse email</label>
          <p class="infos"><?php echo $data['mail']; ?></p>

        </div>

      </div>

      <div class="bottom">
        <label><i class="far fa-file-medical-alt"></i>Numéro de sécurité sociale</label>
        <p class="infos"><?php echo $data['healthNumber']; ?></p>
      </div>


      <input type="submit" value="Lancer" name="submit-3" onclick="location.href='/test-summary';">

  </div>

</div>
