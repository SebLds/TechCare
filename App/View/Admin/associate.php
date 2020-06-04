<?php $this->title='Add module'; ?>

<link rel="stylesheet" href="/Web/css/form.css">

<div id="body">

  <div class="form-add-module box">

    <h1>Associer</h1>
    <p class="top-text">Associer un module à un test pour créer de nouveaux tests !</p>

    <form action="/admin/associate" method="post">

      <label><i class="fal fa-ballot-check"></i>Test</label>
      <div class="selectbox">
        <select name="select-test">
          <option value="">Choisir un test</option>
          <?php for ($i=0;$i<count($data['typetest']);$i++):?>
          <?php $typetest = $data['typetest'][$i]->name;?>
          <option value="<?php echo $typetest ?>"><?php echo $typetest;?></option>
          <?php endfor; ?>
        </select>
      </div>
      <p class="error-msg"><?php if(isset($error_selecttest)) { echo $error_selecttest; } ?></p>

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
      <p class="error-msg"><?php if(isset($error_selectmodule)) { echo $error_selectmodule; } ?></p>

      <input type="submit" value="Associer" name="associate">

    </form>

  </div>

</div>
