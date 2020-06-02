
<?php $this->title = "Forum" ?>
<?php ob_start(); ?>
<link href="/Web/css/forum.css" rel="stylesheet">
<link href="/Web/css/button.css" rel="stylesheet">
<?php $this->head_tags = ob_get_clean();?>
<?php if (isset($data)):?>

<div id="body">
    <form method="post" action="/forum/result-threads-tag-<?php echo $data['id']?>" class="search-bar">
        <button class="sub-none" type="submit" name="search" class="sub-none"><i class="fas fa-search fa-2x icon"></i></button>
        <input type="text" autocomplete="off" class="search-input" placeholder="Rechercher des réponses..." name="research">
    </form>

    <?php if ($_SESSION['sessionStatus']==3): ?>
    <a href="/forum-add-thread"><button type="button" class="btn add" style="margin-left: 20px"><i class="far fa-plus-square"></i>Ajouter</button></a>
    <?php endif; ?>

<?php for ($i=0;$i<count($data['listThreads']);$i++):?>
    <form action="post">
      <div class="tag">
            <div class="tag-name">
              <a href=""><h1 class="titleTag"><?php echo $data['listThreads'][$i]; ?></h1></a>
              <input type="text" name="threadName" value="<?php echo $data['listThreads'][$i]; ?>">
              <?php if ($_SESSION['sessionStatus']==3): ?>
              <button type="submit" class="btn delete" style="margin-left: 20px" name="delete-thread"><i class="far fa-trash"></i>Supprimer</button>
              <?php endif; ?>
            </div>
      </div>
    </form>
<?php endfor; ?>

</div>

<?php endif; ?>
