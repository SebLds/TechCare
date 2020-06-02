<?php $this->title='Options Test'; ?>

<link rel="stylesheet" href="/Web/css/form.css">

<div id="body">

  <div class="form-options-test box">

    <h1>Configurer le test</h1>
    <p class="top-text">Veuillez saisir les informations nécessaires pour lancer un test.</p>


    <form action="/test-confirm" method="post">

      <label><i class="far fa-id-badge"></i>Profil du patient</label>
      <div class="selectbox">
        <select name="test-profil">
          <option value="">Choisir un profil</option>
          <option value="Sportsman">Sportif</option>
          <option value="Sedentary">Sédentaire</option>
          <option value="Active">Actif</option>
        </select>
      </div>
        <p class="error-msg"><?php if(isset($error_selectProfil)) { echo $error_selectProfil; } ?></p>

      <?php if ($data['select-category'] == 'sight'): ?>
      <label>Acuité visuelle</label>
      <meter value="sight-value" min="0" max="100"></meter>
      <?php endif;  ?>

      <?php if ($data['select-category'] == 'stress'):  ?>
      <label>Gestion du stress</label>
      <meter value="sight-value" min="0" max="100"></meter>
      <?php endif;  ?>

      <?php if ($data['select-category'] == 'sound'):  ?>
      <label>Acuité sonore</label>
      <meter value="sight-value" min="0" max="100"></meter>
      <?php endif;  ?>

      <input type="submit" value="Lancer" name="submit-2">

    </form>

  </div>

</div>
