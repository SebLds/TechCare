<?php $this->title='Delete test'; ?>

<link rel="stylesheet" href="/Web/css/form.css">

<div id="body">

  <div class="form-delete-test box">

    <h1>Supprimer un test</h1>
    <p class="top-text"></p>

    <form action="/admin/delete-test" method="post">

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
      <p class="error-msg"><?php if(isset($error_select)) { echo $error_select; } ?></p>

      <input type="submit" value="Supprimer" name="delete-test">

    </form>

  </div>

</div>
