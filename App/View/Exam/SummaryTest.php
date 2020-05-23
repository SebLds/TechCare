<?php $this->title='Summary Test'; ?>

<link rel="stylesheet" href="/Web/css/form.css">
<link rel="stylesheet" href="/Web/css/summaryTest.css">

<div id="body">

  <div class="form-summary box">

        <h1>Résumé du test</h1>
        <p class="top-text">Voici les informations relatives au test effectué.</p>

          <h1>Informations du patient</h1>

          <div class="personnal-info">

            <div class="left">

              <label>Prénom</label>
              <p class="infos"><?php echo $data['firstName']; ?></p>

              <label>Date de naissance</label>
              <p class="infos"><?php echo $data['birthdate']; ?></p>

            </div>

            <div class="right">

              <label>Nom</label>
              <p class="infos"><?php echo $data['lastName']; ?></p>

              <label>Numéro de sécu</label>
              <p class="infos"><?php echo $data['healthNumber']; ?></p>

            </div>

          </div>

          <h1>Informations du test</h1>

          <div class="summary-test">

            <div class="left">

              <label>Type de test</label>
              <p class="infos"></p>

            </div>

            <div class="right">

              <label>Score</label>
              <p class="infos"></p>

            </div>

          </div>

          <form method="post" action="/test-summary">

            <div class="message">

              <label>Commentaire</label>
              <textarea name="comment" rows="3" placeholder="Ecrivez votre commentaire ici"></textarea>
              <p class="error-msg"><?php if(isset($error_comment)) { echo $error_comment; }?></p>

            </div>

            <input type="submit" name="submit-4" value="Validez">

          </form>

      </div>


</div>
