
<?php $this->title = "Forum" ?>
<?php ob_start(); ?>
<link href="/Web/css/forum.css" rel="stylesheet">
<link href="/Web/css/button.css" rel="stylesheet">
<?php $this->head_tags = ob_get_clean();?>
<?php if (isset($data)):?>

<div id="body">
    <form method="post" action="/forum/result-threads-tag-<?php echo $data['id']?>" class="search-bar">
        <button class="sub-none" type="submit" name="search" class="sub-none"><i class="fal fa-search fa-2x icon"></i></button>
        <input type="text" autocomplete="off" class="search-input" placeholder="Rechercher des sujets..." name="research">
    </form>

    <form method="post" action="/forum/add-thread-form">
        <input type="hidden" name="tagId" value="<?php echo $data['id']; ?>">
        <button type="submit" class="btn add" style="margin-left: 20px"><i class="fal fa-plus-square"></i>Ajouter un sujet</button>
    </form>

    <div class="tag-title">
      <h1><?php echo $data['tag_infos']->Tag_Title; ?></h1>
    </div>

<?php for ($i=0;$i<count($data['listThreads']);$i++):?>
    <form method="post" action="/forum/delete-thread">
      <div class="tag">
            <div class="tag-name">
              <a href="/forum/tag-<?php echo $data['tag_infos']->ID_Tag;?>/thread-<?php echo $data['listThreads'][$i]->ID_Thread; ?>"><h1 class="titleTag"><?php echo $data['listThreads'][$i]->Thread_Title; ?></h1></a>
              <p><?php echo $data['nbreplies'][$i]?> réponses</p>
              <?php if ($_SESSION['sessionStatus']==3): ?>
                  <input type="hidden" name="threadName" value="<?php echo $data['listThreads'][$i]->Thread_Title; ?>">
                  <button type="submit" class="btn delete" style="margin-left: 20px" name="delete-thread"><i class="fal fa-trash"></i>Supprimer</button>
              <?php endif; ?>
            </div>
      </div>
    </form>
<?php endfor; ?>

</div>

<?php endif; ?>
