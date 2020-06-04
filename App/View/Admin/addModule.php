<?php $this->title='Add module'; ?>

<link rel="stylesheet" href="/Web/css/form.css">

<div id="body">

  <div class="form-add-module box">

    <h1>Ajouter un module</h1>
    <p class="top-text">Ajouter un nouveau module en indiquant ses paramètres.</p>


    <form action="/admin/add-module" method="post">

      <label><i class="fal fa-tools"></i>Module</label>
      <input type="text" name="newModule" placeholder="Fréquence cardiaque">
      <p class="error-msg"><?php if(isset($data['error_module'])) { echo $data['error_module']; } ?></p>

      <label><i class="fal fa-cogs"></i>Paramètres</label>
      <input type="text" name="settingssportsman" placeholder="Profil sportif">
      <input type="text" name="settingssedentary" placeholder="Profil sédentaire">
      <input type="text" name="settingsactif" placeholder="Profil actif">
      <p class="error-msg"><?php if(isset($data['error_settings'])) { echo $data['error_settings']; } ?></p>

      <input type="submit" value="Ajouter" name="add-module">

    </form>

  </div>

</div>
