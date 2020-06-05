<?php $this->title = "Forum";?>
<?php ob_start(); ?>
<link href="/Web/css/forum.css" rel="stylesheet">
<link href="/Web/css/button.css" rel="stylesheet">
<?php $this->head_tags = ob_get_clean();?>
<?php if (isset($data)):?>

  <div id="body">
      <form method="post" action="/forum/result-threads" class="search-bar">
          <button class="sub-none" type="submit" name="search" class="sub-none"><i class="fal fa-search fa-2x icon"></i></button>
          <input type="text" autocomplete="off" class="search-input" placeholder="Rechercher des réponses..." name="research">
      </form>

      <?php if ($_SESSION['sessionStatus']==3): ?>
          <form method="post" action="/forum/add-tag-form">
              <button type="submit" class="btn add" style="margin-left: 20px"><i class="fal fa-plus-square"></i>Ajouter une catégorie</button>
          </form>
      <?php endif; ?>


        <div class="tag">
            <?php if(!empty($data['tags_info'])): ?>
          <?php for ($i=0;$i<count($data['tags_info']);$i++):?>
            <form action="/forum" method="post">
            <?php $idTag=$data['tags_info'][$i]->ID_Tag?>
              <div class="tag-name">
                <a href="/forum/tag-<?php echo $idTag?>" name="Tag_title"><?php echo $data['tags_info'][$i]->Tag_Title; ?></a>
                  <?php if ($_SESSION['sessionStatus']==3): ?>
                <input type="hidden" name="tagName" value="<?php echo $data['tags_info'][$i]->Tag_Title; ?>">
                  <?php endif; ?>
                  <p><?php echo $data['nbThreads'][$i]?> sujets</p>
                <p><?php echo $data['nbReplies'][$i]?> réponses</p>
                <?php if ($_SESSION['sessionStatus']==3): ?>
                <button type="submit" class="btn delete" style="margin-left: 20px" name="delete"><i class="fal fa-trash"></i>Supprimer</button>
                <?php endif; ?>
              </div>
              <div class="desc">
                  <p class="textTag"><?php echo $data['tags_info'][$i]->Tag_description; ?></p>
              </div>
            </form>
          <?php endfor; ?>
            <?php endif; ?>
        </div>

  </div>
<?php endif; ?>
