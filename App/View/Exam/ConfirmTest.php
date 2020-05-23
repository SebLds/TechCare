<?php $this->title='Confirm Test'; ?>

<link rel="stylesheet" href="/Web/css/form.css">
<link rel="stylesheet" href="/Web/css/summaryTest.css">

<div id="body">

  <div class="form-confirm-test box">

    <h1>Confirmation des informations</h1>
    <p class="top-text">Veuillez vérifier les informations avant de lancer le test.</p>


    <h1>Informations du patient</h1>

    <form action="/test-summary" method="post">

      <div class="personnal-info">

        <div class="left">

          <label>Prénom</label>
          <input type="text" name="lastName" placeholder="Romuald">
          <p class="error-msg"><?php if(isset($error_passwordConfirm)) { echo $error_passwordConfirm; }?></p>

          <label>Date de naissance</label>
          <input type="text" name="firstName" placeholder="Monteiro">
          <p class="error-msg"><?php if(isset($error_passwordConfirm)) { echo $error_passwordConfirm; }?></p>

        </div>

        <div class="right">

          <label>Nom</label>
          <input type="text" name="lastName" placeholder="Romuald">
          <p class="error-msg"><?php if(isset($error_passwordConfirm)) { echo $error_passwordConfirm; }?></p>

          <label>Numéro de sécu</label>
          <input type="text" name="lastName" placeholder="Romuald">
          <p class="error-msg"><?php if(isset($error_passwordConfirm)) { echo $error_passwordConfirm; }?></p>

        </div>

      </div>

      <h1>Informations du test</h1>

      <div class="summary-test">

        <div class="left">

          <label>Type de test</label>
          <input type="text" name="lastName" placeholder="Romuald">
          <p class="error-msg"><?php if(isset($error_passwordConfirm)) { echo $error_passwordConfirm; }?></p>

        </div>

        <div class="right">

          <label>Score</label>
          <input type="text" name="lastName" placeholder="Romuald">
          <p class="error-msg"><?php if(isset($error_passwordConfirm)) { echo $error_passwordConfirm; }?></p>

        </div>

      </div>

      <a href="/test-summary"><button type="button" name="button">Suivant</button></a>


    </form>

  </div>

</div>
