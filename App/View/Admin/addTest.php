<?php $this->title='Add test'; ?>

<link rel="stylesheet" href="/Web/css/form.css">

<div id="body">

  <div class="form-add-test box">

    <h1>Ajouter un test</h1>
    <p class="top-text">Ajouter un nouveau test en indiquant ses paramètres.</p>


    <form method="post">

      <label><i class="far fa-id-badge"></i>Test</label>
      <input type="text" name="newProfil" placeholder="Sportif">
      <p class="error-msg"><?php if(isset($error_newProfil)) { echo $error_newProfil; } ?></p>

      <label><i class="far fa-ballot-check"></i>Module associé</label>
      <div class="selectbox">
        <select name="test-category">
          <option value="">Choisir une catégorie</option>
          <option value="stress">Gestion du stress</option>
          <option value="sight">Acuité visuelle</option>
          <option value="sound">Acuité sonore</option>
        </select>
      </div>
      <p class="error-msg"><?php if(isset($error_select)) { echo $error_select; } ?></p>

      <p class="top-text">Si aucun module ne vous convient</p>
      <button type="submit" name="button">Ajouter un module</button>

      <input type="submit" value="Ajouter" name="submit">

    </form>

  </div>

</div>
