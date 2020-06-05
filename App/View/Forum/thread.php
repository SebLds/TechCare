<?php $this->title = "Forum" ?>
<?php ob_start(); ?>
<link href="/Web/css/forum.css" rel="stylesheet">
<link href="/Web/css/form.css" rel="stylesheet">
<?php $this->head_tags = ob_get_clean();?>
<?php if (isset($data)):?>

<div id="body">

  <div class="tag-title">
    <h1><?php echo $data['tag_infos']->Tag_Title; ?> > <?php echo $data['thread_infos']->Thread_Title; ?></h1>
  </div>

  <form action="/forum/add-reply" method="post">
      <input type="hidden" name="idThread" value="<?php echo $data['thread_infos']->ID_Thread; ?>">
      <input type="hidden" name="idTag" value="<?php echo $data['tag_infos']->ID_Tag; ?>">

      <?php for ($i=count($data['replies'])-1;$i>=0;$i--):?>
  <div class="answer-box">
    <div class="profil">
        <h3><?php echo substr($data['replies'][$i]->Creation_Date, 0, 10) ; ?></h3>
      <h3><?php echo $data['profil'][$i]['firstName']; ?></h3>
      <h3><?php echo $data['profil'][$i]['lastName']; ?></h3>
      <?php if ($data['profil'][$i]['status']==1): ?>
        <h3>Patient</h3>
      <?php endif; ?>
      <?php if ($data['profil'][$i]['status']==2): ?>
        <h3>Gestionnaire</h3>
      <?php endif; ?>
      <?php if ($data['profil'][$i]['status']==3): ?>
        <h3>Administrateur</h3>
      <?php endif; ?>
    </div>
    <div class="answer">
      <?php echo $data['replies'][$i]->Content; ?>
    </div>
  </div>
  <?php endfor; ?>


    <div class="reply">
      <label><i class="fal fa-info-circle"></i>Répondre</label>
      <textarea name="reply" rows="4" cols="75" placeholder="Ecrivez votre réponse ici."></textarea>
      <input type="submit" name="answer" value="Répondre">
    </div>
  </form>

</div>

<?php endif; ?>
