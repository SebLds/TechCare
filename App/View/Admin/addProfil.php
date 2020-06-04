<?php $this->title='Add profil'; ?>

<link rel="stylesheet" href="/Web/css/form.css">

<div id="body">

  <div class="form-launch-test box">

    <h1>Ajouter un profil</h1>
    <p class="top-text">Ajouter un nouveau profil pour personnaliser vos tests psychotechniques.</p>

    <form method="post">

      <label><i class="fal fa-id-badge"></i>Profil</label>
      <input type="text" name="newProfil" placeholder="Sportif">
      <p class="error-msg"><?php if(isset($error_newProfil)) { echo $error_newProfil; } ?></p>

      <input type="submit" value="Ajouter" name="submit">

    </form>

  </div>

</div>
