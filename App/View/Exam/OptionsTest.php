<?php $this->title='Options du test'; ?>

<link rel="stylesheet" href="/Web/css/form.css">
<link rel="stylesheet" href="/Web/css/slider.css">
<link rel="stylesheet" href="/Web/css/button.css">

<div id="body">

  <div class="form-options-test box">

    <h1><a href="/test"><button type="button" id="back-btn"><i class="far fa-arrow-alt-circle-left"></i>Revenir en arrière</button></a></h1>

    <h1>Configuration des capteurs</h1>
    <p class="top-text">Voici les paramètres pour le test qui va se dérouler.</p>

    <h1 style="margin-bottom: 2em;"><?php echo $data['typetest'] ?></h1>

    <form action="/test-confirm" method="post">

      <?php for ($i=0;$i<count($data['module']);$i++):?>
      <?php $module = $data['module'][$i]->name; ?>
      <label><?php echo $module ?></label>

      <?php if ($_SESSION['Select-Profil'] == 'Sportsman'): ?>
      <div class="range-slider">
        <input class="range-slider__range" type="range" value="<?php $sportsman = $data['module'][$i]->sportsman; echo $sportsman?>" min="0" max="100">
        <span class="range-slider__value">0%</span>
      </div>
      <?php endif; ?>

      <?php if ($_SESSION['Select-Profil'] == 'Sedentary'): ?>
        <div class="range-slider">
          <input class="range-slider__range" type="range" value="<?php $sedentary = $data['module'][$i]->sedentary; echo $sedentary?>" min="0" max="100">
          <span class="range-slider__value">0</span>%
        </div>
      <?php endif; ?>

      <?php if ($_SESSION['Select-Profil'] == 'Active'): ?>
      <div class="range-slider">
        <input class="range-slider__range" type="range" value="<?php $active = $data['module'][$i]->active; echo $active?>" min="0" max="100">
        <span class="range-slider__value">0</span>%
      </div>
      <?php endif; ?>

      <?php endfor; ?>

      <input type="submit" value="Lancer" name="submit-2">

      <script>
      var rangeSlider = function(){
      var slider = $('.range-slider'),
        range = $('.range-slider__range'),
        value = $('.range-slider__value');

      slider.each(function(){
      value.each(function(){

      var value = $(this).prev().attr('value');
      $(this).html(value);
      });

     range.on('input', function(){
      $(this).next(value).html(this.value);
    });
    });
    };
    rangeSlider();

      </script>

    </form>

  </div>

</div>
