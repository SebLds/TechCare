<?php $this->title='Launch Test'; ?>

<link rel="stylesheet" href="/Web/css/form.css">

<div id="body">

  <div class="form-launch-test box">

    <h1>Lancer un test</h1>
    <p class="top-text">Veuillez saisir les informations nécessaires pour lancer un test.</p>


    <form action="/test-options" method="post">

      <label><i class="far fa-file-medical-alt"></i>Numéro de sécurité sociale</label>
      <input type="text" name="healthNumber" placeholder="2 94 03 75 120 005 22" value="">
      <p class="error-msg"><?php if(isset($error_healthNumber)) { echo $error_healthNumber; } ?></p>

      <label><i class="far fa-ballot-check"></i>Choix du test</label>
      <div class="selectbox">
        <select name="test-category">
          <option value="">Choisir une catégorie</option>
          <option value="stress">Gestion du stress</option>
          <option value="sight">Acuité visuelle</option>
          <option value="sound">Acuité sonore</option>
        </select>
      </div>
      <p class="error-msg"><?php if(isset($error_select)) { echo $error_select; } ?></p>


      <input type="submit" value="Lancer" name="submit">

    </form>

  </div>

</div>
