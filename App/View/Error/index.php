<?php $this->title='Erreur';?>

<link href="/Web/css/error.css" rel="stylesheet">

<div id="body">

	<?php if ($_SESSION['sessionStatus'] == 0): ?>
    <div> <a href="/homepage"><img class="logo-error" src="/Web/images/logo.png"></a></div>
	<?php endif; ?>
  <?php if ($_SESSION['sessionStatus']>0): ?>
    <div> <a href="/dashboard"><img class="logo-error" src="/Web/images/logo.png"></a></div>
	<?php endif; ?>

   <div>
    	<div class="message">Erreur 404</div>
      <div>Oups, cette page n'existe pas</div>
   </div>

</div>
