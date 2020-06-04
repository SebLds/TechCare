<?php $this->title='Résumé du test'; ?>

<link rel="stylesheet" href="/Web/css/form.css">
<link rel="stylesheet" href="/Web/css/summaryTest.css">

<div id="body">

  <div class="form-summary box">

        <h1>Résumé du test</h1>
        <p class="top-text">Voici les informations relatives au test effectué.</p>

          <div class="personnal-info">

            <div class="left">

              <label><i class="far fa-ballot-check"></i>Type de test</label>
              <p class="infos"><?php echo $data[0]['type']; ?></p>

              <label><i class="far fa-notes-medical"></i>Score</label>
              <p class="infos"><?php echo $data[0]['score']; ?></p>

            </div>

            <div class="center">

              <label><i class="far fa-user"></i>Prénom</label>
              <p class="infos"><?php echo $data[1]['firstName']; ?></p>

              <label><i class="far fa-user-tag"></i>Nom</label>
              <p class="infos"><?php echo $data[1]['lastName']; ?></p>

            </div>

            <div class="right">

              <label><i class="far fa-calendar-alt"></i>Date de naissance</label>
              <p class="infos"><?php echo $data[1]['birthdate']; ?></p>

              <label><i class="far fa-file-medical-alt"></i>Numéro de sécurité sociale</label>
              <p class="infos"><?php echo $data[1]['healthNumber']; ?></p>

            </div>

          </div>

          <form method="post" action="/test-summary">

            <div class="message">

              <label><i class="far fa-comment"></i>Commentaire</label>
              <textarea name="comment" rows="3" placeholder="Ecrivez votre commentaire ici"></textarea>
              <p class="error-msg"><?php if(isset($data[1]['error_comment'])) { echo $data[1]['error_comment']; }?></p>

            </div>

            <input type="submit" name="submit-4" value="Soumettre">

          </form>

      </div>


</div>
