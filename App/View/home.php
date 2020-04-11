<?php ob_start();?>
<title>Infinite Measures</title>
<?php $title=ob_get_clean();?>
<?php ob_start();?>
<link rel="stylesheet" href="/Web/css/home.css">
<?php $head_tags=ob_get_clean();?>
<?php ob_start();?>
  <div class="home section">

    <div class="title">
      <h1>Effectuez vos tests psychotechniques<span>et consultez vos résultats</span></h1>
    </div>

<!--    <div class="team">-->
<!--      <img id="img" src="/Web/images/team.png" alt="">-->
<!--    </div>-->

  </div>

  <div class="electronic section">

    <div class="title">
      <h1>Un boîtier pour réaliser les tests</h1>
    </div>

  </div>

  <div class="site section">

    <div class="title">
      <h1>Un site pour consulter ses résultats</h1>
    </div>

  </div>

  <div class="jsp section">

  </div>
<?php $content=ob_get_clean();?>
<?php require 'template.php';?>
