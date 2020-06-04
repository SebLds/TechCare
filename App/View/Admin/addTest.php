<?php $this->title='Add test'; ?>

<link rel="stylesheet" href="/Web/css/form.css">

<div id="body">

  <div class="form-add-test box">

    <h1>Ajouter un test</h1>
    <p class="top-text">Ajouter un nouveau test pour vos patients.</p>

    <form action="/admin/add-test" method="post">

      <label><i class="fal fa-ballot-check"></i>Test</label>
      <input type="text" name="newTest" placeholder="Gestion de stress">
      <p class="error-msg"><?php if(isset($data['error_test'])) { echo $data['error_test']; } ?></p>

      <input type="submit" value="Ajouter" name="add-test">

    </form>

  </div>

</div>
