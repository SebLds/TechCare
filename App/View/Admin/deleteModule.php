<?php $this->title='Delete module'; ?>

<link rel="stylesheet" href="/Web/css/form.css">

<div id="body">

  <div class="form-delete-module box">

    <h1>Supprimer un module</h1>
    <p class="top-text"></p>

    <form action="/admin/delete-module" method="post">

      <label><i class="fal fa-tools"></i>Module</label>
      <div class="selectbox">
        <select name="select-module">
          <option value="">Choisir un module</option>
          <?php for ($i=0;$i<count($data['module']);$i++):?>
          <?php $module = $data['module'][$i]->name;?>
          <option value="<?php echo $module ?>"><?php echo $module;?></option>
          <?php endfor; ?>
        </select>
      </div>
      <p class="error-msg"><?php if(isset($error_select)) { echo $error_select; } ?></p>

      <input type="submit" value="Supprimer" name="delete-module">

    </form>

  </div>

</div>
