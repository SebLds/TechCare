<?php $this->title='Lancer un test'; ?>

<link rel="stylesheet" href="/Web/css/form.css">

<div id="body">

  <div class="form-launch-test box">

    <h1>Lancer un test</h1>
    <p class="top-text">Veuillez saisir les informations nécessaires pour lancer un test.</p>


    <form action="/test-options" method="post">

      <label><i class="far fa-file-medical-alt"></i>Numéro de sécurité sociale</label>
      <input type="text" name="healthNumber" placeholder="2 94 03 75 120 005 22" maxlength="15" value="">
      <p class="error-msg"><?php if(isset($error_healthNumber)) { echo $error_healthNumber; } ?></p>

      <label><i class="far fa-ballot-check"></i>Test</label>
      <div class="selectbox">
        <select name="select-test">
          <option value="">Choisir un test</option>
          <?php for ($i=0;$i<count($data['typetest']);$i++):?>
          <?php $typetest = $data['typetest'][$i]->name;?>
          <option value="<?php echo $typetest ?>"><?php echo $typetest;?></option>
          <?php endfor; ?>
        </select>
      </div>
      <p class="error-msg"><?php if(isset($error_select)) { echo $error_select; } ?></p>

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


      <input type="submit" value="Lancer" name="submit">

    </form>

  </div>

</div>
