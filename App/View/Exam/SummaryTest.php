<?php $this->title='Summary Test'; ?>

<link rel="stylesheet" href="/Web/css/form.css">
<link rel="stylesheet" href="/Web/css/summaryTest.css">

<div id="body">

  <div class="form-summary box">

        <h1>Résumé du test</h1>
        <p class="top-text">Voici les informations relatives au test effectué.</p>

          <div class="personnal-info">

            <div class="left">

              <label>Type de test</label>
              <p class="infos"><?php echo $data[0]['type']; ?></p>

              <label>Score</label>
              <p class="infos"><?php echo $data[0]['score']; ?></p>

            </div>

            <div class="center">

              <label>Prénom</label>
              <p class="infos"><?php echo $data[1]['firstName']; ?></p>

              <label>Nom</label>
              <p class="infos"><?php echo $data[1]['lastName']; ?></p>

            </div>

            <div class="right">

              <label>Date de naissance</label>
              <p class="infos"><?php echo $data[1]['birthdate']; ?></p>

              <label>Numéro de sécurité sociale</label>
              <p class="infos"><?php echo $data[1]['healthNumber']; ?></p>

            </div>

          </div>

          <form method="post" action="/test-summary">

            <div class="message">

              <label>Commentaire</label>
              <textarea name="comment" rows="3" placeholder="Ecrivez votre commentaire ici"></textarea>
              <p class="error-msg"><?php if(isset($data[1]['error_comment'])) { echo $data[1]['error_comment']; }?></p>

            </div>

            <input type="submit" name="submit-4" value="Soumettre">

          </form>

      </div>


</div>
