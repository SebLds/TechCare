<?php $this->title='Launch Test';?>

<link rel="stylesheet" href="/Web/css/form.css">

<div id="body">

  <div class="form-launch-test box">

    <h1>Lancer un test</h1>

    <form action="../../index.php" method="post">

      <label>Numéro de sécurité sociale</label>
      <input type="text" name="" placeholder="2 94 03 75 120 005 22">

      <label>Choix du test</label>

      <div class="select-box">

        <div class="options-container">

          <div class="option">
            <input type="radio" class="radio" id="stress" name="category">
            <label for="stress">Gestion du stress</label>
          </div>

          <div class="option">
            <input type="radio" class="radio" id="sight" name="category">
            <label for="sight">Acuité visuelle</label>
          </div>

          <div class="option">
            <input type="radio" class="radio" id="hearing" name="category">
            <label for="hearing">Acuité auditive</label>
          </div>

        </div>

        <div class="selected">
          Choisir une catégorie
        </div>

      </div>

      <script type="text/javascript" src="/Web/js/select.js"></script>

      <input type="submit" value="Suivant" name="login">

    </div>

  </div>
