<?php $this->title='Options du test'; ?>

<link rel="stylesheet" href="/Web/css/form.css">

<div id="body">

  <div class="form-options-test box">

    <h1>Configurer les capteurs</h1>
    <p class="top-text">Paramétrer les capteurs avant de lancer le test.</p>


    <form action="/test-confirm" method="post">

      <?php for ($i=0;$i<count($data['module']);$i++):?>
      <?php $module = $data['module'][$i]->name;?>
      <label><?php echo $module ?></label>

      <?php $sportsman = $data['module'][$i]->sportsman;?>
      <?php $actif = $data['module'][$i]->actif;?>
      <?php $sedentary = $data['module'][$i]->sedentary;?>

      <?php if ($_SESSION['Select-Profil'] == 'Sportsman'): ?>
      <?php echo $sportsman ?>
      <?php endif; ?>

      <?php if ($_SESSION['Select-Profil'] == 'Sedentary'): ?>
      <?php echo $sedentary ?>
      <?php endif; ?>

      <?php if ($_SESSION['Select-Profil'] == 'Active'): ?>
      <?php echo $actif ?>
      <?php endif; ?>

      <meter value="sight-value" min="0" max="100"></meter>
      <?php endfor; ?>

      <input type="submit" value="Lancer" name="submit-2">

    </form>

  </div>

</div>
