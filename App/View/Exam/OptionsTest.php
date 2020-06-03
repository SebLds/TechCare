<?php $this->title='Options Test'; ?>

<link rel="stylesheet" href="/Web/css/form.css">

<div id="body">

  <div class="form-options-test box">

    <h1>Configurer le test</h1>
    <p class="top-text">Veuillez saisir les informations nécessaires pour lancer un test.</p>


    <form action="/test-confirm" method="post">

      <?php if ($data['select-category'] == 'sight'): ?>
      <label>Acuité visuelle</label>
      <meter value="sight-value" min="0" max="100"></meter>
      <?php endif;  ?>

      <?php if ($data['select-category'] == 'stress'):  ?>
      <label>Gestion du stress</label>
      <progress value="0" max="100">0%</progress>
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
